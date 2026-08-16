<?php
/**
 * Septix Technologies - Microsoft Authenticator 2FA & Email OTP Verification
 */

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/auth_helper.php';
require_once __DIR__ . '/includes/totp.php';

admin_session_start();

// Ensure temporary authenticated user exists in session
if (!isset($_SESSION['temp_user_id']) || empty($_SESSION['temp_user_id'])) {
    header("Location: " . get_base_url() . "/admin-septix-login");
    exit;
}

$pdo = get_db_connection();
$userId = $_SESSION['temp_user_id'];
$stmt = $pdo->prepare("SELECT * FROM admin_users WHERE id = ? LIMIT 1");
$stmt->execute([$userId]);
$user = $stmt->fetch();

if (!$user) {
    header("Location: " . get_base_url() . "/admin-septix-login");
    exit;
}

$action = isset($_GET['action']) ? $_GET['action'] : ($user['mfa_enabled'] ? 'verify' : 'setup');
$error = '';
$info = '';

// Generate Secret for first time setup
if ($action === 'setup' && empty($_SESSION['new_mfa_secret'])) {
    $_SESSION['new_mfa_secret'] = TotpHelper::generate_secret(16);
}

$mfaSecret = ($action === 'setup') ? $_SESSION['new_mfa_secret'] : $user['mfa_secret'];
$qrUrl = TotpHelper::get_qr_url($user['username'], $mfaSecret, 'Septix Technologies Admin');

// Handle Email OTP Request Trigger
if (isset($_POST['trigger_email_otp'])) {
    $code = send_email_otp($user['id'], $user['email'], 'login');
    $info = "A 6-digit verification security code has been sent to your email ({$user['email']}).";
    $action = 'otp';
}

// Handle Form Submission
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_POST['trigger_email_otp'])) {
    $code = trim($_POST['mfa_code']);

    if ($action === 'otp') {
        if (verify_email_otp($user['id'], $code, 'login')) {
            complete_admin_login($user);
        } else {
            $error = "Invalid or expired Email OTP code. Please try again.";
        }
    } elseif ($action === 'setup') {
        if (TotpHelper::verify_code($mfaSecret, $code)) {
            // Save MFA secret to database and enable MFA
            $upd = $pdo->prepare("UPDATE admin_users SET mfa_secret = ?, mfa_enabled = 1 WHERE id = ?");
            $upd->execute([$mfaSecret, $user['id']]);
            unset($_SESSION['new_mfa_secret']);
            complete_admin_login($user);
        } else {
            $error = "Invalid TOTP code from Microsoft Authenticator. Make sure the time on your phone is synchronized.";
        }
    } else {
        if (TotpHelper::verify_code($mfaSecret, $code)) {
            complete_admin_login($user);
        } else {
            $error = "Invalid 6-digit Microsoft Authenticator code. Please check your app and try again.";
        }
    }
}

function complete_admin_login($user) {
    $pdo = get_db_connection();
    $_SESSION['admin_user_id'] = $user['id'];
    $_SESSION['admin_username'] = $user['username'];
    $_SESSION['admin_role'] = $user['role'];
    $_SESSION['mfa_verified'] = true;

    unset($_SESSION['temp_user_id']);
    unset($_SESSION['temp_username']);
    unset($_SESSION['temp_user_email']);

    $upd = $pdo->prepare("UPDATE admin_users SET last_login = ? WHERE id = ?");
    $upd->execute([date('Y-m-d H:i:s'), $user['id']]);

    header("Location: " . get_base_url() . "/admin-septix-technologies-dashboard");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>2FA Microsoft Authenticator Verification - Septix Technologies</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_base_url(); ?>/assets/css/style.css">
    <style>
        body {
            background: linear-gradient(135deg, #1b0a3f 0%, #0d0620 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
        .mfa-box {
            background: #ffffff;
            border-radius: var(--radius-xl);
            padding: 40px;
            max-width: 480px;
            width: 100%;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.4);
            position: relative;
        }
        .mfa-box::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 6px;
            background: linear-gradient(90deg, #26125b 0%, #3dc1d0 100%);
            border-top-left-radius: var(--radius-xl);
            border-top-right-radius: var(--radius-xl);
        }
        .qr-frame {
            background: #f8fafc;
            border: 2px dashed var(--clr-border);
            padding: 20px;
            border-radius: var(--radius-lg);
            text-align: center;
            margin-bottom: 24px;
        }
        .alert-danger {
            background: #fef2f2;
            border: 1px solid #fca5a5;
            color: #991b1b;
            padding: 12px 16px;
            border-radius: var(--radius-md);
            font-size: 0.875rem;
            margin-bottom: 20px;
        }
        .alert-info {
            background: #f0fdf4;
            border: 1px solid #86efac;
            color: #166534;
            padding: 12px 16px;
            border-radius: var(--radius-md);
            font-size: 0.875rem;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<div class="mfa-box">
    <div style="text-align: center; margin-bottom: 24px;">
        <span class="timeline-phase-badge" style="background: rgba(61, 193, 208, 0.15); color: var(--clr-brand-dark);">
            <i class="fa-solid fa-mobile-screen-button"></i> Microsoft Authenticator 2FA
        </span>
        <h2 style="font-size: 1.5rem; color: var(--clr-brand-dark); font-weight: 800; margin-top: 8px;">
            <?php echo ($action === 'setup') ? 'Setup 2FA Authenticator' : (($action === 'otp') ? 'Enter Email Security OTP' : 'Verify Authenticator Code'); ?>
        </h2>
        <p style="font-size: 0.875rem; color: var(--clr-text-muted);">
            Welcome back, <strong><?php echo htmlspecialchars($user['username']); ?></strong>
        </p>
    </div>

    <?php if ($error): ?>
        <div class="alert-danger"><i class="fa-solid fa-triangle-exclamation"></i> <?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <?php if ($info): ?>
        <div class="alert-info"><i class="fa-solid fa-circle-check"></i> <?php echo htmlspecialchars($info); ?></div>
    <?php endif; ?>

    <!-- First Time Setup Instructions & QR Code -->
    <?php if ($action === 'setup'): ?>
        <div class="qr-frame">
            <p style="font-size: 0.85rem; color: var(--clr-text-muted); margin-bottom: 14px;">
                Scan this QR code with <strong>Microsoft Authenticator</strong> app on your smartphone:
            </p>
            <img src="<?php echo $qrUrl; ?>" alt="Microsoft Authenticator 2FA QR Code" style="width: 180px; height: 180px; border-radius: 8px;">
            <div style="margin-top: 14px; font-size: 0.8rem; color: var(--clr-brand-dark);">
                Secret Key: <code style="background: #e2e8f0; padding: 4px 8px; border-radius: 4px; font-weight: 700;"><?php echo $mfaSecret; ?></code>
            </div>
        </div>
    <?php endif; ?>

    <!-- Verification Form -->
    <form action="" method="POST">
        <div style="margin-bottom: 20px;">
            <label style="display: block; font-size: 0.875rem; font-weight: 700; color: var(--clr-brand-dark); margin-bottom: 8px;">
                <?php echo ($action === 'otp') ? '6-Digit Email Passcode' : '6-Digit Authenticator Code'; ?>
            </label>
            <input type="text" name="mfa_code" maxlength="6" pattern="[0-9]{6}" placeholder="123456" autocomplete="off" required autofocus
                   style="width: 100%; padding: 14px; border-radius: var(--radius-md); border: 1px solid var(--clr-border); font-size: 1.5rem; text-align: center; letter-spacing: 0.4em; font-weight: 800; color: var(--clr-brand-dark);">
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 14px; border-radius: var(--radius-md); font-size: 1rem; margin-bottom: 16px;">
            Verify & Continue <i class="fa-solid fa-shield-check"></i>
        </button>
    </form>

    <!-- Alternative Email OTP Trigger -->
    <form action="" method="POST" style="border-top: 1px solid var(--clr-border); padding-top: 16px; text-align: center;">
        <input type="hidden" name="trigger_email_otp" value="1">
        <button type="submit" style="background: none; border: none; color: var(--clr-brand-light); font-weight: 700; font-size: 0.875rem; cursor: pointer; text-decoration: underline;">
            <i class="fa-solid fa-envelope"></i> Login with Email OTP Instead
        </button>
    </form>

</div>

</body>
</html>

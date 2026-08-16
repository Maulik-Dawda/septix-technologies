<?php
/**
 * Septix Technologies - Forgot Password & OTP Reset System
 */

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/auth_helper.php';

admin_session_start();

$step = 1; // 1 = Enter Email/Username, 2 = Enter OTP & New Password
$error = '';
$success = '';

if (isset($_SESSION['reset_user_id']) && !empty($_SESSION['reset_user_id'])) {
    $step = 2;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['request_otp'])) {
        $account = trim($_POST['account']);
        if (empty($account)) {
            $error = "Please enter your registered admin username or email address.";
        } else {
            $pdo = get_db_connection();
            $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ? OR email = ? LIMIT 1");
            $stmt->execute([$account, $account]);
            $user = $stmt->fetch();

            if ($user) {
                $_SESSION['reset_user_id'] = $user['id'];
                $_SESSION['reset_email'] = $user['email'];
                $otp = send_email_otp($user['id'], $user['email'], 'password_reset');
                $success = "A 6-digit verification OTP has been sent to your email ({$user['email']}).";
                $step = 2;
            } else {
                $error = "No active admin account found matching that username or email.";
            }
        }
    } elseif (isset($_POST['reset_password'])) {
        $otp_code = trim($_POST['otp_code']);
        $new_password = $_POST['new_password'];
        $confirm_password = $_POST['confirm_password'];
        $user_id = $_SESSION['reset_user_id'];

        if (empty($otp_code) || empty($new_password) || empty($confirm_password)) {
            $error = "Please fill in all required fields.";
            $step = 2;
        } elseif ($new_password !== $confirm_password) {
            $error = "New password and confirmation password do not match.";
            $step = 2;
        } elseif (strlen($new_password) < 8) {
            $error = "Password must be at least 8 characters long.";
            $step = 2;
        } elseif (!verify_email_otp($user_id, $otp_code, 'password_reset')) {
            $error = "Invalid or expired OTP verification code.";
            $step = 2;
        } else {
            // Update password in database
            $new_hash = password_hash($new_password, PASSWORD_BCRYPT);
            $pdo = get_db_connection();
            $stmt = $pdo->prepare("UPDATE admin_users SET password_hash = ? WHERE id = ?");
            $stmt->execute([$new_hash, $user_id]);

            unset($_SESSION['reset_user_id']);
            unset($_SESSION['reset_email']);

            $success = "Your admin password has been reset successfully! You can now log in.";
            $step = 3;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password Security Reset - Septix Technologies</title>
    <link rel="icon" type="image/png" href="<?php echo get_base_url(); ?>/assets/images/favicon.png">
    <link rel="apple-touch-icon" href="<?php echo get_base_url(); ?>/assets/images/favicon.png">
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
        .reset-box {
            background: #ffffff;
            border-radius: var(--radius-xl);
            padding: 44px;
            max-width: 440px;
            width: 100%;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.4);
            position: relative;
        }
        .reset-box::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 6px;
            background: linear-gradient(90deg, #26125b 0%, #3dc1d0 100%);
            border-top-left-radius: var(--radius-xl);
            border-top-right-radius: var(--radius-xl);
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
        .alert-success {
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

<div class="reset-box">
    <div style="text-align: center; margin-bottom: 28px;">
        <span class="timeline-phase-badge" style="background: rgba(61, 193, 208, 0.15); color: var(--clr-brand-dark);">
            <i class="fa-solid fa-key"></i> Password Recovery
        </span>
        <h2 style="font-size: 1.5rem; color: var(--clr-brand-dark); font-weight: 800; margin-top: 8px;">
            <?php echo ($step === 1) ? 'Reset Admin Password' : (($step === 2) ? 'Verify OTP & Set Password' : 'Password Updated'); ?>
        </h2>
    </div>

    <?php if ($error): ?>
        <div class="alert-danger"><i class="fa-solid fa-triangle-exclamation"></i> <?php echo htmlspecialchars($error); ?></div>
    <?php endif; ?>

    <?php if ($success): ?>
        <div class="alert-success"><i class="fa-solid fa-circle-check"></i> <?php echo htmlspecialchars($success); ?></div>
    <?php endif; ?>

    <?php if ($step === 1): ?>
        <form action="" method="POST">
            <div style="margin-bottom: 20px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 700; color: var(--clr-brand-dark); margin-bottom: 8px;">
                    Username or Registered Email
                </label>
                <input type="text" name="account" class="form-control" placeholder="Enter username or email" required autofocus
                       style="width: 100%; padding: 13px 16px; border-radius: var(--radius-md); border: 1px solid var(--clr-border); font-size: 0.95rem;">
            </div>

            <button type="submit" name="request_otp" class="btn btn-primary" style="width: 100%; padding: 14px; border-radius: var(--radius-md); font-size: 1rem; margin-bottom: 16px;">
                Send Reset OTP <i class="fa-solid fa-paper-plane"></i>
            </button>
        </form>

    <?php elseif ($step === 2): ?>
        <form action="" method="POST">
            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 700; color: var(--clr-brand-dark); margin-bottom: 8px;">
                    6-Digit Email OTP Code
                </label>
                <input type="text" name="otp_code" maxlength="6" pattern="[0-9]{6}" placeholder="123456" required autofocus
                       style="width: 100%; padding: 12px; border-radius: var(--radius-md); border: 1px solid var(--clr-border); font-size: 1.3rem; text-align: center; letter-spacing: 0.3em; font-weight: 800;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 700; color: var(--clr-brand-dark); margin-bottom: 8px;">
                    New Password
                </label>
                <input type="password" name="new_password" placeholder="At least 8 characters" required
                       style="width: 100%; padding: 12px; border-radius: var(--radius-md); border: 1px solid var(--clr-border); font-size: 0.95rem;">
            </div>

            <div style="margin-bottom: 24px;">
                <label style="display: block; font-size: 0.875rem; font-weight: 700; color: var(--clr-brand-dark); margin-bottom: 8px;">
                    Confirm New Password
                </label>
                <input type="password" name="confirm_password" placeholder="Re-enter new password" required
                       style="width: 100%; padding: 12px; border-radius: var(--radius-md); border: 1px solid var(--clr-border); font-size: 0.95rem;">
            </div>

            <button type="submit" name="reset_password" class="btn btn-primary" style="width: 100%; padding: 14px; border-radius: var(--radius-md); font-size: 1rem;">
                Update Password <i class="fa-solid fa-check-double"></i>
            </button>
        </form>

    <?php elseif ($step === 3): ?>
        <div style="text-align: center; margin-top: 20px;">
            <a href="<?php echo get_base_url(); ?>/admin-septix-login" class="btn btn-primary" style="width: 100%; padding: 14px;">
                Proceed to Login <i class="fa-solid fa-right-to-bracket"></i>
            </a>
        </div>
    <?php endif; ?>

    <div style="text-align: center; margin-top: 20px;">
        <a href="<?php echo get_base_url(); ?>/admin-septix-login" style="color: var(--clr-text-muted); font-size: 0.875rem; text-decoration: none; font-weight: 600;">
            <i class="fa-solid fa-arrow-left"></i> Back to Login
        </a>
    </div>

</div>

</body>
</html>

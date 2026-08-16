<?php
/**
 * Septix Technologies - Hidden Admin Login Page
 * Custom Secured Portal - No public links or buttons anywhere on the site.
 */

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/db.php';
require_once __DIR__ . '/includes/auth_helper.php';

admin_session_start();

// If already authenticated and 2FA verified, redirect directly to dashboard
if (is_admin_logged_in()) {
    header("Location: " . get_base_url() . "/admin-septix-technologies-dashboard");
    exit;
}

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Check brute force lockout
    if (check_login_lockout($username)) {
        $error = "Too many failed login attempts. Account temporarily locked for 15 minutes to prevent unauthorized access.";
    } elseif (empty($username) || empty($password)) {
        $error = "Please enter both username and password.";
    } else {
        $pdo = get_db_connection();
        $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE (username = ? OR email = ?) AND status = 'active' LIMIT 1");
        $stmt->execute([$username, $username]);
        $user = $stmt->fetch();

        if ($user && password_verify($password, $user['password_hash'])) {
            log_login_attempt($username, true);
            $_SESSION['temp_user_id'] = $user['id'];
            $_SESSION['temp_username'] = $user['username'];
            $_SESSION['temp_user_email'] = $user['email'];

            // Route to 2FA / MFA Setup or Verification
            if (empty($user['mfa_secret']) || $user['mfa_enabled'] == 0) {
                header("Location: " . get_base_url() . "/admin-septix-technologies-mfa?action=setup");
            } else {
                header("Location: " . get_base_url() . "/admin-septix-technologies-mfa?action=verify");
            }
            exit;
        } else {
            log_login_attempt($username, false);
            $error = "Invalid credentials. Please verify your username/email and password.";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enterprise Security Admin Portal - Septix Technologies</title>
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
        .admin-auth-box {
            background: #ffffff;
            border-radius: var(--radius-xl);
            padding: 44px;
            max-width: 440px;
            width: 100%;
            box-shadow: 0 25px 60px rgba(0, 0, 0, 0.4);
            position: relative;
        }
        .admin-auth-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: linear-gradient(90deg, #26125b 0%, #3dc1d0 100%);
            border-top-left-radius: var(--radius-xl);
            border-top-right-radius: var(--radius-xl);
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            display: block;
            font-size: 0.875rem;
            font-weight: 700;
            color: var(--clr-brand-dark);
            margin-bottom: 8px;
        }
        .form-control {
            width: 100%;
            padding: 13px 16px;
            border-radius: var(--radius-md);
            border: 1px solid var(--clr-border);
            font-size: 0.95rem;
            transition: var(--transition);
        }
        .form-control:focus {
            outline: none;
            border-color: var(--clr-brand-light);
            box-shadow: 0 0 0 4px rgba(61, 193, 208, 0.15);
        }
        .auth-badge {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            background: rgba(38, 18, 91, 0.08);
            color: var(--clr-brand-dark);
            padding: 4px 14px;
            border-radius: var(--radius-full);
            font-size: 0.775rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 12px;
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
    </style>
</head>
<body>

<div class="admin-auth-box">
    <div style="text-align: center; margin-bottom: 28px;">
        <span class="auth-badge"><i class="fa-solid fa-lock"></i> Restricted Security Portal</span>
        <h2 style="font-size: 1.6rem; color: var(--clr-brand-dark); font-weight: 800; margin-bottom: 6px;">Septix Admin</h2>
        <p style="font-size: 0.875rem; color: var(--clr-text-muted);">Enterprise Authentication & Management Suite</p>
    </div>

    <?php if ($error): ?>
        <div class="alert-danger">
            <i class="fa-solid fa-triangle-exclamation"></i> <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>

    <form action="" method="POST">
        <div class="form-group">
            <label class="form-label">Username or Admin Email</label>
            <div style="position: relative;">
                <input type="text" name="username" class="form-control" placeholder="Enter your username" required autofocus style="padding-left: 42px;">
                <i class="fa-solid fa-user" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: var(--clr-text-dim);"></i>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">Admin Password</label>
            <div style="position: relative;">
                <input type="password" name="password" class="form-control" placeholder="••••••••••••" required style="padding-left: 42px;">
                <i class="fa-solid fa-key" style="position: absolute; left: 15px; top: 50%; transform: translateY(-50%); color: var(--clr-text-dim);"></i>
            </div>
        </div>

        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; font-size: 0.85rem;">
            <span><i class="fa-solid fa-shield"></i> 2FA Enforced</span>
            <a href="<?php echo get_base_url(); ?>/admin-septix-technologies-forgot-password" style="color: var(--clr-brand-light); font-weight: 700; text-decoration: none;">Forgot Password?</a>
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%; padding: 14px; border-radius: var(--radius-md); font-size: 1rem;">
            Authenticate Access <i class="fa-solid fa-arrow-right"></i>
        </button>
    </form>

    <div style="margin-top: 24px; text-align: center; border-top: 1px solid var(--clr-border); padding-top: 16px; font-size: 0.775rem; color: var(--clr-text-dim);">
        <i class="fa-solid fa-shield-halved"></i> Protected by Septix Zero-Trust Rate Limiting & 256-bit Encryption.
    </div>
</div>

</body>
</html>

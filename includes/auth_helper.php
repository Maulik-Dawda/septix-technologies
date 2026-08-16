<?php
/**
 * Septix Technologies - Authentication & Security Helper
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/totp.php';

function admin_session_start() {
    if (session_status() === PHP_SESSION_NONE) {
        ini_set('session.cookie_httponly', 1);
        ini_set('session.use_only_cookies', 1);
        session_start();
    }
}

function is_admin_logged_in() {
    admin_session_start();
    return isset($_SESSION['admin_user_id']) && !empty($_SESSION['admin_user_id']) && isset($_SESSION['mfa_verified']) && $_SESSION['mfa_verified'] === true;
}

function require_admin_login() {
    if (!is_admin_logged_in()) {
        $login_url = get_base_url() . '/admin-septix-login';
        header("Location: " . $login_url);
        exit;
    }
}

function get_client_ip() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
    } else {
        return isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '127.0.0.1';
    }
}

/**
 * Rate limiting check for IP brute-force protection
 */
function check_login_lockout($username = '') {
    $pdo = get_db_connection();
    $ip = get_client_ip();
    $fifteenMinsAgo = date('Y-m-d H:i:s', time() - 900);

    $stmt = $pdo->prepare("SELECT COUNT(*) FROM login_attempts WHERE ip_address = ? AND success = 0 AND attempted_at > ?");
    $stmt->execute([$ip, $fifteenMinsAgo]);
    $failedCount = $stmt->fetchColumn();

    return $failedCount >= 5; // Lockout after 5 failed attempts
}

/**
 * Log login attempt
 */
function log_login_attempt($username, $success = false) {
    $pdo = get_db_connection();
    $ip = get_client_ip();
    $stmt = $pdo->prepare("INSERT INTO login_attempts (ip_address, username, success, attempted_at) VALUES (?, ?, ?, ?)");
    $stmt->execute([$ip, $username, $success ? 1 : 0, date('Y-m-d H:i:s')]);
}

/**
 * Generate 6-digit OTP and send via Email
 */
function send_email_otp($user_id, $email, $type = 'login') {
    admin_session_start();
    $pdo = get_db_connection();
    $otp_code = (string)random_int(100000, 999999);
    $expires_at = date('Y-m-d H:i:s', time() + 600); // 10 mins expiry

    // Delete old OTPs for this user & type
    $del = $pdo->prepare("DELETE FROM otp_tokens WHERE user_id = ? AND type = ?");
    $del->execute([$user_id, $type]);

    // Insert new OTP
    $stmt = $pdo->prepare("INSERT INTO otp_tokens (user_id, otp_code, type, expires_at) VALUES (?, ?, ?, ?)");
    $stmt->execute([$user_id, $otp_code, $type, $expires_at]);

    // Store in session for quick fallback validation
    $_SESSION['pending_otp'] = [
        'user_id' => $user_id,
        'email' => $email,
        'code' => $otp_code,
        'type' => $type,
        'expires' => time() + 600
    ];

    // Build Email Message
    $subject = "Septix Technologies Admin Security Passcode [{$otp_code}]";
    $message = "Hello,\n\nYour 6-digit Security Verification Passcode for Septix Technologies Admin System is:\n\n" .
               "====== [ {$otp_code} ] ======\n\n" .
               "This code is valid for 10 minutes. If you did not request this code, please secure your account immediately.\n\n" .
               "Regards,\nSeptix Technologies Security Team";

    $headers = "From: " . (defined('SMTP_FROM_NAME') ? SMTP_FROM_NAME : 'Septix Security') . " <" . (defined('SMTP_FROM') ? SMTP_FROM : 'info@septixtechnologies.com') . ">\r\n" .
               "Reply-To: " . (defined('CONTACT_EMAIL') ? CONTACT_EMAIL : 'info@septixtechnologies.com') . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    @mail($email, $subject, $message, $headers);

    return $otp_code;
}

/**
 * Verify Email OTP
 */
function verify_email_otp($user_id, $otp_code, $type = 'login') {
    admin_session_start();

    // Check Session Fallback
    if (isset($_SESSION['pending_otp'])) {
        $sessOtp = $_SESSION['pending_otp'];
        if ($sessOtp['user_id'] == $user_id && $sessOtp['code'] === trim($otp_code) && $sessOtp['expires'] >= time() && $sessOtp['type'] === $type) {
            unset($_SESSION['pending_otp']);
            return true;
        }
    }

    // Check Database Token
    $pdo = get_db_connection();
    $stmt = $pdo->prepare("SELECT * FROM otp_tokens WHERE user_id = ? AND type = ? AND otp_code = ? AND expires_at >= ? ORDER BY id DESC LIMIT 1");
    $stmt->execute([$user_id, $type, trim($otp_code), date('Y-m-d H:i:s')]);
    $token = $stmt->fetch();

    if ($token) {
        $del = $pdo->prepare("DELETE FROM otp_tokens WHERE id = ?");
        $del->execute([$token['id']]);
        return true;
    }

    return false;
}
?>

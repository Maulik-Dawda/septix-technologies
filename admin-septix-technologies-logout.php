<?php
/**
 * Septix Technologies - Admin Logout Handler
 */

require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/auth_helper.php';

admin_session_start();
$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

session_destroy();

header("Location: " . get_base_url() . "/admin-septix-login");
exit;
?>

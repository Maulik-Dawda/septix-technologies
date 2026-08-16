<?php
/**
 * Septix Technologies - User Management Suite
 */

$adminPageKey = 'users';
$adminTitle = 'User Management - Septix Technologies Admin';
$adminPageHeader = 'Manage System Administrators & Editors';

require_once __DIR__ . '/includes/admin_header.php';

$pdo = get_db_connection();
$msg = '';
$error = '';

// Handle Add User
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_user'])) {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $role = $_POST['role'];

    if (empty($username) || empty($email) || empty($password)) {
        $error = "Please fill in all fields.";
    } elseif (strlen($password) < 8) {
        $error = "Password must be at least 8 characters long.";
    } else {
        // Check uniqueness
        $chk = $pdo->prepare("SELECT COUNT(*) FROM admin_users WHERE username = ? OR email = ?");
        $chk->execute([$username, $email]);
        if ($chk->fetchColumn() > 0) {
            $error = "Username or Email address is already registered.";
        } else {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $stmt = $pdo->prepare("INSERT INTO admin_users (username, email, password_hash, role, status) VALUES (?, ?, ?, ?, 'active')");
            $stmt->execute([$username, $email, $hash, $role]);
            $msg = "New administrator user '{$username}' added successfully!";
        }
    }
}

// Handle Reset 2FA
if (isset($_GET['reset_2fa']) && (int)$_GET['reset_2fa'] > 0) {
    $rId = (int)$_GET['reset_2fa'];
    $stmt = $pdo->prepare("UPDATE admin_users SET mfa_secret = NULL, mfa_enabled = 0 WHERE id = ?");
    $stmt->execute([$rId]);
    $msg = "2FA Authenticator reset successfully for selected user.";
}

// Handle Status Toggle
if (isset($_GET['toggle_user']) && (int)$_GET['toggle_user'] > 0) {
    $uId = (int)$_GET['toggle_user'];
    $stmt = $pdo->prepare("SELECT status FROM admin_users WHERE id = ?");
    $stmt->execute([$uId]);
    $currStatus = $stmt->fetchColumn();
    $newStatus = ($currStatus === 'active') ? 'inactive' : 'active';

    $upd = $pdo->prepare("UPDATE admin_users SET status = ? WHERE id = ?");
    $upd->execute([$newStatus, $uId]);
    $msg = "User status updated to '{$newStatus}'.";
}

// Handle Delete User (prevent deleting self)
if (isset($_GET['delete_user']) && (int)$_GET['delete_user'] > 0) {
    $dId = (int)$_GET['delete_user'];
    if ($dId == $_SESSION['admin_user_id']) {
        $error = "You cannot delete your own logged-in admin account.";
    } else {
        $stmt = $pdo->prepare("DELETE FROM admin_users WHERE id = ?");
        $stmt->execute([$dId]);
        $msg = "User deleted successfully.";
    }
}

// Fetch all users
$stmt = $pdo->query("SELECT * FROM admin_users ORDER BY id ASC");
$users = $stmt->fetchAll();
?>

<?php if ($msg): ?>
    <div style="background: #f0fdf4; border: 1px solid #86efac; color: #166534; padding: 14px 20px; border-radius: var(--radius-lg); font-weight: 600; margin-bottom: 24px;">
        <i class="fa-solid fa-circle-check"></i> <?php echo htmlspecialchars($msg); ?>
    </div>
<?php endif; ?>

<?php if ($error): ?>
    <div style="background: #fef2f2; border: 1px solid #fca5a5; color: #991b1b; padding: 14px 20px; border-radius: var(--radius-lg); font-weight: 600; margin-bottom: 24px;">
        <i class="fa-solid fa-triangle-exclamation"></i> <?php echo htmlspecialchars($error); ?>
    </div>
<?php endif; ?>

<div style="display: grid; grid-template-columns: 2fr 1fr; gap: 32px;" class="user-grid">
    
    <!-- User List -->
    <div class="table-responsive">
        <div style="padding: 20px 24px; border-bottom: 1px solid #e2e8f0;">
            <h4 style="font-size: 1.1rem; font-weight: 800; color: #0f172a; margin: 0;">Registered Administrator Accounts</h4>
        </div>
        <table class="admin-table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Role</th>
                    <th>2FA Status</th>
                    <th>Status</th>
                    <th>Last Login</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $u): ?>
                    <tr>
                        <td>
                            <strong style="display: block; color: #0f172a; font-size: 0.95rem;"><?php echo htmlspecialchars($u['username']); ?></strong>
                            <span style="font-size: 0.8rem; color: #64748b;"><?php echo htmlspecialchars($u['email']); ?></span>
                        </td>
                        <td>
                            <span class="badge-status <?php echo ($u['role'] === 'superadmin') ? 'badge-superadmin' : 'badge-admin'; ?>">
                                <?php echo htmlspecialchars($u['role']); ?>
                            </span>
                        </td>
                        <td>
                            <?php if ($u['mfa_enabled']): ?>
                                <span style="color: #166534; font-size: 0.825rem; font-weight: 700;"><i class="fa-solid fa-shield-check"></i> Enabled</span>
                            <?php else: ?>
                                <span style="color: #94a3b8; font-size: 0.825rem;"><i class="fa-solid fa-clock"></i> Pending Setup</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="<?php echo get_base_url(); ?>/admin-septix-technologies-users?toggle_user=<?php echo $u['id']; ?>" style="text-decoration: none;">
                                <span class="badge-status <?php echo ($u['status'] === 'active') ? 'badge-published' : 'badge-draft'; ?>">
                                    <?php echo htmlspecialchars($u['status']); ?>
                                </span>
                            </a>
                        </td>
                        <td><span style="color: #64748b; font-size: 0.825rem;"><?php echo $u['last_login'] ? date('M d, Y H:i', strtotime($u['last_login'])) : 'Never'; ?></span></td>
                        <td>
                            <div style="display: flex; gap: 6px;">
                                <?php if ($u['mfa_enabled']): ?>
                                    <a href="<?php echo get_base_url(); ?>/admin-septix-technologies-users?reset_2fa=<?php echo $u['id']; ?>" 
                                       onclick="return confirm('Reset 2FA key for this user?');"
                                       class="btn btn-outline btn-sm" style="padding: 4px 8px; font-size: 0.75rem;" title="Reset 2FA">
                                        <i class="fa-solid fa-key"></i> Reset 2FA
                                    </a>
                                <?php endif; ?>

                                <?php if ($u['id'] != $_SESSION['admin_user_id']): ?>
                                    <a href="<?php echo get_base_url(); ?>/admin-septix-technologies-users?delete_user=<?php echo $u['id']; ?>" 
                                       onclick="return confirm('Delete user <?php echo htmlspecialchars($u['username']); ?>?');"
                                       class="btn btn-outline btn-sm" style="padding: 4px 8px; font-size: 0.75rem; color: #ef4444; border-color: #fca5a5;" title="Delete User">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Add New User Form -->
    <div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: var(--radius-xl); padding: 28px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);">
        <h4 style="font-size: 1.1rem; font-weight: 800; color: #0f172a; margin-bottom: 20px;">
            <i class="fa-solid fa-user-plus" style="color: var(--clr-brand-light);"></i> Add Admin User
        </h4>

        <form action="" method="POST">
            <input type="hidden" name="add_user" value="1">
            
            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 0.85rem; color: #334155; margin-bottom: 6px;">Username *</label>
                <input type="text" name="username" placeholder="e.g. john_doe" required
                       style="width: 100%; padding: 10px; border-radius: var(--radius-md); border: 1px solid #cbd5e1; font-size: 0.9rem;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 0.85rem; color: #334155; margin-bottom: 6px;">Email Address *</label>
                <input type="email" name="email" placeholder="john@septixtechnologies.com" required
                       style="width: 100%; padding: 10px; border-radius: var(--radius-md); border: 1px solid #cbd5e1; font-size: 0.9rem;">
            </div>

            <div style="margin-bottom: 16px;">
                <label style="display: block; font-weight: 700; font-size: 0.85rem; color: #334155; margin-bottom: 6px;">Password *</label>
                <input type="password" name="password" placeholder="At least 8 characters" required
                       style="width: 100%; padding: 10px; border-radius: var(--radius-md); border: 1px solid #cbd5e1; font-size: 0.9rem;">
            </div>

            <div style="margin-bottom: 20px;">
                <label style="display: block; font-weight: 700; font-size: 0.85rem; color: #334155; margin-bottom: 6px;">User Role</label>
                <select name="role" style="width: 100%; padding: 10px; border-radius: var(--radius-md); border: 1px solid #cbd5e1; font-weight: 700;">
                    <option value="admin">Admin (Full Content & User Access)</option>
                    <option value="editor">Editor (Content Creation Only)</option>
                    <option value="superadmin">Superadmin</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" style="width: 100%; padding: 12px; border-radius: var(--radius-md);">
                Create User Account <i class="fa-solid fa-arrow-right"></i>
            </button>
        </form>
    </div>

</div>

<?php require_once __DIR__ . '/includes/admin_footer.php'; ?>

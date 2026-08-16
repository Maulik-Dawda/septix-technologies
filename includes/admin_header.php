<?php
/**
 * Septix Technologies - Shared Admin Header & Navigation Layout
 */

require_once __DIR__ . '/config.php';
require_once __DIR__ . '/db.php';
require_once __DIR__ . '/auth_helper.php';

require_admin_login();

$currentAdminUser = $_SESSION['admin_username'];
$currentAdminRole = isset($_SESSION['admin_role']) ? $_SESSION['admin_role'] : 'admin';
$pageKey = isset($adminPageKey) ? $adminPageKey : 'dashboard';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($adminTitle) ? $adminTitle : 'Admin Dashboard - Septix Technologies'; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_base_url(); ?>/assets/css/style.css">
    <style>
        body {
            background: #f1f5f9;
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: #1e293b;
        }
        .admin-layout {
            display: flex;
            min-height: 100vh;
        }
        .admin-sidebar {
            width: 270px;
            background: #1b0a3f;
            color: #ffffff;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            position: fixed;
            top: 0; bottom: 0; left: 0;
            z-index: 100;
            box-shadow: 4px 0 20px rgba(0, 0, 0, 0.15);
        }
        .sidebar-brand {
            padding: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .sidebar-menu {
            padding: 20px 14px;
            display: flex;
            flex-direction: column;
            gap: 6px;
            flex-grow: 1;
        }
        .menu-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            border-radius: var(--radius-md);
            color: rgba(255, 255, 255, 0.7);
            font-weight: 600;
            font-size: 0.925rem;
            text-decoration: none;
            transition: var(--transition);
        }
        .menu-link:hover, .menu-link.active {
            background: rgba(61, 193, 208, 0.18);
            color: #3dc1d0;
        }
        .menu-link i {
            width: 20px;
            font-size: 1.1rem;
        }
        .admin-main {
            margin-left: 270px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            min-width: 0;
        }
        .admin-topbar {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 16px 32px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 90;
        }
        .admin-content {
            padding: 32px;
            flex-grow: 1;
        }
        .card-stat {
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: var(--radius-xl);
            padding: 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
            display: flex;
            align-items: center;
            gap: 20px;
        }
        .card-stat-icon {
            width: 54px;
            height: 54px;
            border-radius: var(--radius-lg);
            background: rgba(38, 18, 91, 0.1);
            color: var(--clr-brand-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
        }
        .table-responsive {
            width: 100%;
            overflow-x: auto;
            background: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: var(--radius-xl);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
        }
        .admin-table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
            font-size: 0.9rem;
        }
        .admin-table th {
            background: #f8fafc;
            padding: 16px 20px;
            font-weight: 800;
            color: #334155;
            border-bottom: 1px solid #e2e8f0;
            text-transform: uppercase;
            font-size: 0.775rem;
            letter-spacing: 0.05em;
        }
        .admin-table td {
            padding: 16px 20px;
            border-bottom: 1px solid #f1f5f9;
            vertical-align: middle;
        }
        .badge-status {
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 800;
            text-transform: uppercase;
        }
        .badge-published { background: #dcfce7; color: #166534; }
        .badge-draft { background: #fef3c7; color: #92400e; }
        .badge-admin { background: #e0e7ff; color: #3730a3; }
        .badge-superadmin { background: #fae8ff; color: #86198f; }
        @media (max-width: 991px) {
            .admin-sidebar { width: 80px; }
            .sidebar-text { display: none; }
            .admin-main { margin-left: 80px; }
        }
    </style>
</head>
<body>

<div class="admin-layout">
    <!-- Sidebar -->
    <aside class="admin-sidebar">
        <div class="sidebar-brand">
            <i class="fa-solid fa-shield-halved" style="font-size: 1.8rem; color: #3dc1d0;"></i>
            <div class="sidebar-text">
                <strong style="display: block; font-size: 1.05rem; letter-spacing: -0.02em;">Septix Admin</strong>
                <span style="font-size: 0.725rem; color: rgba(255, 255, 255, 0.5); text-transform: uppercase; letter-spacing: 0.06em;">Control Suite</span>
            </div>
        </div>

        <nav class="sidebar-menu">
            <a href="<?php echo get_base_url(); ?>/admin-septix-technologies-dashboard" class="menu-link <?php echo ($pageKey === 'dashboard') ? 'active' : ''; ?>">
                <i class="fa-solid fa-chart-line"></i> <span class="sidebar-text">Dashboard</span>
            </a>
            <a href="<?php echo get_base_url(); ?>/admin-septix-technologies-blogs" class="menu-link <?php echo ($pageKey === 'blogs') ? 'active' : ''; ?>">
                <i class="fa-solid fa-newspaper"></i> <span class="sidebar-text">Blog Manager</span>
            </a>
            <a href="<?php echo get_base_url(); ?>/admin-septix-technologies-blog-edit" class="menu-link <?php echo ($pageKey === 'blog-edit') ? 'active' : ''; ?>">
                <i class="fa-solid fa-pen-to-square"></i> <span class="sidebar-text">Create New Blog</span>
            </a>
            <a href="<?php echo get_base_url(); ?>/admin-septix-technologies-users" class="menu-link <?php echo ($pageKey === 'users') ? 'active' : ''; ?>">
                <i class="fa-solid fa-users-gear"></i> <span class="sidebar-text">User Manager</span>
            </a>
            <a href="<?php echo get_base_url(); ?>/blog" target="_blank" class="menu-link">
                <i class="fa-solid fa-arrow-up-right-from-square"></i> <span class="sidebar-text">View Live Blog</span>
            </a>
        </nav>

        <div style="padding: 16px; border-top: 1px solid rgba(255, 255, 255, 0.1);">
            <a href="<?php echo get_base_url(); ?>/admin-septix-technologies-logout" class="menu-link" style="color: #f87171;">
                <i class="fa-solid fa-right-from-bracket"></i> <span class="sidebar-text">Logout</span>
            </a>
        </div>
    </aside>

    <!-- Main Workspace -->
    <div class="admin-main">
        <header class="admin-topbar">
            <div>
                <h3 style="font-size: 1.25rem; font-weight: 800; color: #0f172a; margin: 0;"><?php echo isset($adminPageHeader) ? $adminPageHeader : 'Dashboard Overview'; ?></h3>
            </div>
            <div style="display: flex; align-items: center; gap: 14px;">
                <span class="badge-status badge-superadmin"><?php echo htmlspecialchars(strtoupper($currentAdminRole)); ?></span>
                <div style="text-align: right;">
                    <strong style="display: block; font-size: 0.9rem; color: #0f172a;"><?php echo htmlspecialchars($currentAdminUser); ?></strong>
                    <span style="font-size: 0.775rem; color: #64748b;">2FA Protected</span>
                </div>
                <div style="width: 40px; height: 40px; border-radius: 50%; background: #26125b; color: #3dc1d0; display: flex; align-items: center; justify-content: center; font-weight: 800;">
                    <?php echo strtoupper(substr($currentAdminUser, 0, 1)); ?>
                </div>
            </div>
        </header>

        <main class="admin-content">

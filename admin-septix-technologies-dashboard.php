<?php
/**
 * Septix Technologies - Admin Dashboard Overview
 */

$adminPageKey = 'dashboard';
$adminTitle = 'Admin Dashboard - Septix Technologies';
$adminPageHeader = 'Dashboard & Content Metrics';

require_once __DIR__ . '/includes/admin_header.php';

$pdo = get_db_connection();

// Analytics Counters
$totalBlogs = $pdo->query("SELECT COUNT(*) FROM blogs")->fetchColumn();
$publishedBlogs = $pdo->query("SELECT COUNT(*) FROM blogs WHERE status = 'published'")->fetchColumn();
$totalViews = $pdo->query("SELECT SUM(views) FROM blogs")->fetchColumn() ?: 0;
$totalUsers = $pdo->query("SELECT COUNT(*) FROM admin_users")->fetchColumn();

// Recent Blogs List
$stmt = $pdo->query("SELECT * FROM blogs ORDER BY id DESC LIMIT 5");
$recentBlogs = $stmt->fetchAll();
?>

<!-- Analytics Metric Cards -->
<div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 24px; margin-bottom: 32px;">
    <div class="card-stat">
        <div class="card-stat-icon" style="background: rgba(38, 18, 91, 0.1); color: var(--clr-brand-dark);">
            <i class="fa-solid fa-newspaper"></i>
        </div>
        <div>
            <h3 style="font-size: 1.8rem; font-weight: 900; color: #0f172a; margin: 0;"><?php echo $totalBlogs; ?></h3>
            <span style="font-size: 0.85rem; color: #64748b; font-weight: 600;">Total Articles</span>
        </div>
    </div>

    <div class="card-stat">
        <div class="card-stat-icon" style="background: rgba(22, 101, 52, 0.1); color: #166534;">
            <i class="fa-solid fa-circle-check"></i>
        </div>
        <div>
            <h3 style="font-size: 1.8rem; font-weight: 900; color: #0f172a; margin: 0;"><?php echo $publishedBlogs; ?></h3>
            <span style="font-size: 0.85rem; color: #64748b; font-weight: 600;">Published Live</span>
        </div>
    </div>

    <div class="card-stat">
        <div class="card-stat-icon" style="background: rgba(61, 193, 208, 0.15); color: #0891b2;">
            <i class="fa-solid fa-eye"></i>
        </div>
        <div>
            <h3 style="font-size: 1.8rem; font-weight: 900; color: #0f172a; margin: 0;"><?php echo number_format($totalViews); ?></h3>
            <span style="font-size: 0.85rem; color: #64748b; font-weight: 600;">Total Blog Views</span>
        </div>
    </div>

    <div class="card-stat">
        <div class="card-stat-icon" style="background: rgba(147, 51, 234, 0.1); color: #9333ea;">
            <i class="fa-solid fa-users-gear"></i>
        </div>
        <div>
            <h3 style="font-size: 1.8rem; font-weight: 900; color: #0f172a; margin: 0;"><?php echo $totalUsers; ?></h3>
            <span style="font-size: 0.85rem; color: #64748b; font-weight: 600;">Admin Users</span>
        </div>
    </div>
</div>

<!-- Quick Actions Banner -->
<div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: var(--radius-xl); padding: 24px 32px; margin-bottom: 32px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px;">
    <div>
        <h4 style="font-size: 1.1rem; font-weight: 800; color: #0f172a; margin-bottom: 4px;">Content & Security Quick Actions</h4>
        <p style="font-size: 0.875rem; color: #64748b; margin: 0;">Create new technical articles, manage user permissions, or review analytics.</p>
    </div>
    <div style="display: flex; gap: 12px;">
        <a href="<?php echo get_base_url(); ?>/admin-septix-technologies-blog-edit" class="btn btn-primary btn-sm">
            <i class="fa-solid fa-plus"></i> Create New Blog
        </a>
        <a href="<?php echo get_base_url(); ?>/admin-septix-technologies-users" class="btn btn-outline btn-sm">
            <i class="fa-solid fa-user-plus"></i> Manage Users
        </a>
    </div>
</div>

<!-- Recent Articles Table -->
<div class="table-responsive">
    <div style="padding: 20px 24px; border-bottom: 1px solid #e2e8f0; display: flex; justify-content: space-between; align-items: center;">
        <h4 style="font-size: 1.1rem; font-weight: 800; color: #0f172a; margin: 0;">Recently Created Articles</h4>
        <a href="<?php echo get_base_url(); ?>/admin-septix-technologies-blogs" style="font-size: 0.85rem; font-weight: 700; color: var(--clr-brand-light); text-decoration: none;">
            View All Articles <i class="fa-solid fa-arrow-right"></i>
        </a>
    </div>

    <table class="admin-table">
        <thead>
            <tr>
                <th>Title & Slug</th>
                <th>Category</th>
                <th>Author</th>
                <th>Views</th>
                <th>Status</th>
                <th>Created Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($recentBlogs) > 0): ?>
                <?php foreach ($recentBlogs as $blog): ?>
                    <tr>
                        <td style="max-width: 300px;">
                            <strong style="display: block; color: #0f172a; font-size: 0.95rem; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                <?php echo htmlspecialchars($blog['title']); ?>
                            </strong>
                            <code style="font-size: 0.775rem; color: #64748b;">/blog/<?php echo htmlspecialchars($blog['slug']); ?></code>
                        </td>
                        <td><span class="deliverable-pill" style="font-size: 0.75rem; padding: 4px 10px;"><?php echo htmlspecialchars($blog['category']); ?></span></td>
                        <td><span style="font-weight: 600; color: #334155;"><?php echo htmlspecialchars($blog['author']); ?></span></td>
                        <td><strong style="color: #0f172a;"><?php echo number_format($blog['views']); ?></strong></td>
                        <td>
                            <span class="badge-status <?php echo ($blog['status'] === 'published') ? 'badge-published' : 'badge-draft'; ?>">
                                <?php echo htmlspecialchars($blog['status']); ?>
                            </span>
                        </td>
                        <td><span style="color: #64748b; font-size: 0.85rem;"><?php echo date('M d, Y', strtotime($blog['created_at'])); ?></span></td>
                        <td>
                            <div style="display: flex; gap: 8px;">
                                <a href="<?php echo get_base_url(); ?>/admin-septix-technologies-blog-edit?id=<?php echo $blog['id']; ?>" 
                                   class="btn btn-outline btn-sm" style="padding: 6px 12px; font-size: 0.8rem;" title="Edit Article">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <a href="<?php echo get_base_url(); ?>/blog/<?php echo htmlspecialchars($blog['slug']); ?>" target="_blank"
                                   class="btn btn-outline btn-sm" style="padding: 6px 12px; font-size: 0.8rem;" title="Preview Article">
                                    <i class="fa-solid fa-eye"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" style="text-align: center; padding: 40px; color: #64748b;">No blogs found. Click "+ Create New Blog" to start!</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/includes/admin_footer.php'; ?>

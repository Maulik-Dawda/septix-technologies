<?php
/**
 * Septix Technologies - Admin Blog Management Suite
 */

$adminPageKey = 'blogs';
$adminTitle = 'Blog Manager - Septix Technologies Admin';
$adminPageHeader = 'Manage Articles & Publications';

require_once __DIR__ . '/includes/admin_header.php';

$pdo = get_db_connection();
$msg = '';

// Handle Delete Request
if (isset($_GET['delete_id']) && (int)$_GET['delete_id'] > 0) {
    $deleteId = (int)$_GET['delete_id'];
    $stmt = $pdo->prepare("DELETE FROM blogs WHERE id = ?");
    $stmt->execute([$deleteId]);
    $msg = "Article successfully deleted.";
}

// Handle Status Toggle Request
if (isset($_GET['toggle_id']) && (int)$_GET['toggle_id'] > 0) {
    $toggleId = (int)$_GET['toggle_id'];
    $stmt = $pdo->prepare("SELECT status FROM blogs WHERE id = ?");
    $stmt->execute([$toggleId]);
    $currStatus = $stmt->fetchColumn();

    $newStatus = ($currStatus === 'published') ? 'draft' : 'published';
    $upd = $pdo->prepare("UPDATE blogs SET status = ? WHERE id = ?");
    $upd->execute([$newStatus, $toggleId]);
    $msg = "Article status updated to '{$newStatus}'.";
}

// Search Filter
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$sql = "SELECT * FROM blogs";
$params = [];

if (!empty($search)) {
    $sql .= " WHERE title LIKE ? OR category LIKE ? OR author LIKE ?";
    $sp = "%{$search}%";
    $params = [$sp, $sp, $sp];
}

$sql .= " ORDER BY id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$blogs = $stmt->fetchAll();
?>

<?php if ($msg): ?>
    <div style="background: #f0fdf4; border: 1px solid #86efac; color: #166534; padding: 14px 20px; border-radius: var(--radius-lg); font-weight: 600; margin-bottom: 24px;">
        <i class="fa-solid fa-circle-check"></i> <?php echo htmlspecialchars($msg); ?>
    </div>
<?php endif; ?>

<!-- Top Toolbar -->
<div style="background: #ffffff; border: 1px solid #e2e8f0; border-radius: var(--radius-xl); padding: 20px 24px; margin-bottom: 24px; display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px;">
    <form action="" method="GET" style="display: flex; gap: 10px; flex-grow: 1; max-width: 450px;">
        <div style="position: relative; width: 100%;">
            <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Search by title, author, category..." 
                   style="width: 100%; padding: 10px 16px 10px 38px; border-radius: var(--radius-md); border: 1px solid #cbd5e1; font-size: 0.9rem;">
            <i class="fa-solid fa-magnifying-glass" style="position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: #94a3b8;"></i>
        </div>
        <button type="submit" class="btn btn-primary btn-sm">Search</button>
    </form>

    <a href="<?php echo get_base_url(); ?>/admin-septix-technologies-blog-edit" class="btn btn-primary btn-sm">
        <i class="fa-solid fa-plus"></i> Create New Article
    </a>
</div>

<!-- Blogs Table -->
<div class="table-responsive">
    <table class="admin-table">
        <thead>
            <tr>
                <th>Cover</th>
                <th>Title & Slug</th>
                <th>Category</th>
                <th>Author</th>
                <th>Views</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (count($blogs) > 0): ?>
                <?php foreach ($blogs as $b): 
                    $imgUrl = (strpos($b['image'], 'http') === 0) ? $b['image'] : ($base_url . '/' . ltrim($b['image'], '/'));
                ?>
                    <tr>
                        <td>
                            <img src="<?php echo $imgUrl; ?>" alt="<?php echo htmlspecialchars($b['title']); ?>" style="width: 50px; height: 50px; border-radius: 8px; object-fit: cover;">
                        </td>
                        <td style="max-width: 320px;">
                            <strong style="display: block; color: #0f172a; font-size: 0.95rem; line-height: 1.3;">
                                <?php echo htmlspecialchars($b['title']); ?>
                            </strong>
                            <code style="font-size: 0.775rem; color: #64748b;">/blog/<?php echo htmlspecialchars($b['slug']); ?></code>
                        </td>
                        <td><span class="deliverable-pill" style="font-size: 0.75rem; padding: 4px 10px;"><?php echo htmlspecialchars($b['category']); ?></span></td>
                        <td><span style="font-weight: 600; color: #334155;"><?php echo htmlspecialchars($b['author']); ?></span></td>
                        <td><strong style="color: #0f172a;"><?php echo number_format($b['views']); ?></strong></td>
                        <td>
                            <a href="<?php echo get_base_url(); ?>/admin-septix-technologies-blogs?toggle_id=<?php echo $b['id']; ?>" 
                               title="Click to toggle status" style="text-decoration: none;">
                                <span class="badge-status <?php echo ($b['status'] === 'published') ? 'badge-published' : 'badge-draft'; ?>">
                                    <?php echo htmlspecialchars($b['status']); ?>
                                </span>
                            </a>
                        </td>
                        <td>
                            <div style="display: flex; gap: 8px;">
                                <a href="<?php echo get_base_url(); ?>/admin-septix-technologies-blog-edit?id=<?php echo $b['id']; ?>" 
                                   class="btn btn-outline btn-sm" style="padding: 6px 12px; font-size: 0.8rem;" title="Edit Article">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                                <a href="<?php echo get_base_url(); ?>/blog/<?php echo htmlspecialchars($b['slug']); ?>" target="_blank"
                                   class="btn btn-outline btn-sm" style="padding: 6px 12px; font-size: 0.8rem;" title="View Live">
                                    <i class="fa-solid fa-eye"></i> View
                                </a>
                                <a href="<?php echo get_base_url(); ?>/admin-septix-technologies-blogs?delete_id=<?php echo $b['id']; ?>" 
                                   onclick="return confirm('Are you sure you want to delete this article?');"
                                   class="btn btn-outline btn-sm" style="padding: 6px 12px; font-size: 0.8rem; color: #ef4444; border-color: #fca5a5;" title="Delete Article">
                                    <i class="fa-solid fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" style="text-align: center; padding: 40px; color: #64748b;">No articles found matching your search.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php require_once __DIR__ . '/includes/admin_footer.php'; ?>

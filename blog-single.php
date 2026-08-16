<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/db.php';

$pdo = get_db_connection();

// Resolve Blog by Slug or ID
$slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

$post = null;
if (!empty($slug)) {
    $stmt = $pdo->prepare("SELECT * FROM blogs WHERE slug = ? AND status = 'published' LIMIT 1");
    $stmt->execute([$slug]);
    $post = $stmt->fetch();
} elseif ($id > 0) {
    $stmt = $pdo->prepare("SELECT * FROM blogs WHERE id = ? AND status = 'published' LIMIT 1");
    $stmt->execute([$id]);
    $post = $stmt->fetch();
}

// Fallback if not found
if (!$post) {
    $stmt = $pdo->query("SELECT * FROM blogs WHERE status = 'published' ORDER BY id DESC LIMIT 1");
    $post = $stmt->fetch();
}

if (!$post) {
    header("Location: " . get_base_url() . "/blog");
    exit;
}

// Increment View Count
$updateViews = $pdo->prepare("UPDATE blogs SET views = views + 1 WHERE id = ?");
$updateViews->execute([$post['id']]);

// Set Page Meta
$page_title = htmlspecialchars($post['title']) . " - Septix Technologies Blog";
$page_desc = htmlspecialchars($post['summary']);
$current_page = "blog";

require_once __DIR__ . '/includes/header.php';

$formattedDate = date('F d, Y', strtotime($post['created_at']));
$imgUrl = (strpos($post['image'], 'http') === 0) ? $post['image'] : ($base_url . '/' . ltrim($post['image'], '/'));

// Fetch Previous & Next Blogs for bottom navigation
$prevStmt = $pdo->prepare("SELECT id, slug, title, image FROM blogs WHERE status = 'published' AND id < ? ORDER BY id DESC LIMIT 1");
$prevStmt->execute([$post['id']]);
$prevPost = $prevStmt->fetch();

$nextStmt = $pdo->prepare("SELECT id, slug, title, image FROM blogs WHERE status = 'published' AND id > ? ORDER BY id ASC LIMIT 1");
$nextStmt->execute([$post['id']]);
$nextPost = $nextStmt->fetch();

// Fetch Recent Blogs for Sidebar
$recentStmt = $pdo->prepare("SELECT id, slug, title, image, created_at FROM blogs WHERE status = 'published' AND id != ? ORDER BY id DESC LIMIT 4");
$recentStmt->execute([$post['id']]);
$recentBlogs = $recentStmt->fetchAll();

// Categories List for Sidebar
$catStmt = $pdo->query("SELECT category, COUNT(*) as cat_count FROM blogs WHERE status = 'published' GROUP BY category ORDER BY category ASC");
$categories = $catStmt->fetchAll();
?>

<!-- Single Blog Main Article Container -->
<section class="section-padding" style="padding-top: 130px;">
    <div class="container">
        <div style="display: grid; grid-template-columns: 2.3fr 1fr; gap: 40px;" class="blog-detail-grid">
            
            <!-- Main Content Area -->
            <article style="background: #ffffff; border: 1px solid var(--clr-border); border-radius: var(--radius-xl); padding: 40px; box-shadow: var(--shadow-card);">
                
                <!-- 1. TITLE & META INFO (First as requested) -->
                <div style="margin-bottom: 24px;">
                    <div style="display: flex; gap: 12px; align-items: center; flex-wrap: wrap; margin-bottom: 14px;">
                        <span class="timeline-phase-badge" style="background: rgba(61, 193, 208, 0.15); color: var(--clr-brand-dark);">
                            <i class="fa-solid fa-folder"></i> <?php echo htmlspecialchars($post['category']); ?>
                        </span>
                        <span style="font-size: 0.85rem; color: var(--clr-text-muted);">
                            <i class="fa-solid fa-clock"></i> <?php echo htmlspecialchars($post['read_time']); ?>
                        </span>
                        <span style="font-size: 0.85rem; color: var(--clr-text-muted);">
                            <i class="fa-solid fa-eye"></i> <?php echo number_format($post['views']); ?> Views
                        </span>
                    </div>

                    <h1 class="hero-headline" style="font-size: 2.2rem; text-align: left; margin-bottom: 16px; color: var(--clr-brand-dark); line-height: 1.3;">
                        <?php echo htmlspecialchars($post['title']); ?>
                    </h1>

                    <div style="display: flex; align-items: center; gap: 14px; padding-bottom: 20px; border-bottom: 1px solid var(--clr-border);">
                        <div style="width: 44px; height: 44px; border-radius: 50%; background: linear-gradient(135deg, #26125b 0%, #3dc1d0 100%); color: #ffffff; display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1.1rem;">
                            <?php echo substr($post['author'], 0, 1); ?>
                        </div>
                        <div>
                            <strong style="display: block; color: var(--clr-brand-dark); font-size: 0.95rem;"><?php echo htmlspecialchars($post['author']); ?></strong>
                            <span style="font-size: 0.825rem; color: var(--clr-text-muted);">Published on <?php echo $formattedDate; ?></span>
                        </div>
                    </div>
                </div>

                <!-- 2. FEATURED COVER IMAGE (Second as requested) -->
                <div style="width: 100%; height: 380px; border-radius: var(--radius-lg); overflow: hidden; margin-bottom: 32px; box-shadow: var(--shadow-card);">
                    <img src="<?php echo $imgUrl; ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                </div>

                <!-- 3. FULL ARTICLE CONTENT / DESCRIPTION (Third as requested) -->
                <div class="blog-body-content" style="color: var(--clr-text-muted); font-size: 1.05rem; line-height: 1.8; margin-bottom: 40px;">
                    <p style="font-size: 1.15rem; font-weight: 600; color: var(--clr-brand-dark); line-height: 1.7; margin-bottom: 24px; border-left: 4px solid var(--clr-brand-light); padding-left: 16px;">
                        <?php echo htmlspecialchars($post['summary']); ?>
                    </p>

                    <div>
                        <?php echo $post['content']; ?>
                    </div>
                </div>

                <!-- 4. PREVIOUS & NEXT BLOG OPTIONS WITH THUMBNAIL AND TITLE (Fourth as requested) -->
                <div style="border-top: 1px solid var(--clr-border); padding-top: 30px; margin-top: 40px;">
                    <h4 style="font-size: 1.1rem; color: var(--clr-brand-dark); margin-bottom: 20px; font-weight: 800;">Continue Reading</h4>
                    
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;" class="prev-next-grid">
                        
                        <!-- Previous Blog Link -->
                        <?php if ($prevPost): 
                            $prevUrl = $base_url . '/blog/' . htmlspecialchars($prevPost['slug']);
                            $prevImg = (strpos($prevPost['image'], 'http') === 0) ? $prevPost['image'] : ($base_url . '/' . ltrim($prevPost['image'], '/'));
                        ?>
                            <a href="<?php echo $prevUrl; ?>" style="display: flex; gap: 14px; align-items: center; background: #f8fafc; border: 1px solid var(--clr-border); border-radius: var(--radius-md); padding: 16px; text-decoration: none; transition: var(--transition);" class="prev-next-card">
                                <img src="<?php echo $prevImg; ?>" alt="<?php echo htmlspecialchars($prevPost['title']); ?>" style="width: 60px; height: 60px; border-radius: var(--radius-sm); object-fit: cover; flex-shrink: 0;">
                                <div style="overflow: hidden;">
                                    <span style="font-size: 0.75rem; font-weight: 800; color: var(--clr-brand-light); text-transform: uppercase; display: block;"><i class="fa-solid fa-arrow-left"></i> Previous Blog</span>
                                    <strong style="font-size: 0.875rem; color: var(--clr-brand-dark); display: block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 2px;">
                                        <?php echo htmlspecialchars($prevPost['title']); ?>
                                    </strong>
                                </div>
                            </a>
                        <?php else: ?>
                            <div></div>
                        <?php endif; ?>

                        <!-- Next Blog Link -->
                        <?php if ($nextPost): 
                            $nextUrl = $base_url . '/blog/' . htmlspecialchars($nextPost['slug']);
                            $nextImg = (strpos($nextPost['image'], 'http') === 0) ? $nextPost['image'] : ($base_url . '/' . ltrim($nextPost['image'], '/'));
                        ?>
                            <a href="<?php echo $nextUrl; ?>" style="display: flex; gap: 14px; align-items: center; background: #f8fafc; border: 1px solid var(--clr-border); border-radius: var(--radius-md); padding: 16px; text-decoration: none; transition: var(--transition); text-align: right; justify-content: flex-end;" class="prev-next-card">
                                <div style="overflow: hidden;">
                                    <span style="font-size: 0.75rem; font-weight: 800; color: var(--clr-brand-light); text-transform: uppercase; display: block;">Next Blog <i class="fa-solid fa-arrow-right"></i></span>
                                    <strong style="font-size: 0.875rem; color: var(--clr-brand-dark); display: block; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; margin-top: 2px;">
                                        <?php echo htmlspecialchars($nextPost['title']); ?>
                                    </strong>
                                </div>
                                <img src="<?php echo $nextImg; ?>" alt="<?php echo htmlspecialchars($nextPost['title']); ?>" style="width: 60px; height: 60px; border-radius: var(--radius-sm); object-fit: cover; flex-shrink: 0;">
                            </a>
                        <?php endif; ?>

                    </div>
                </div>

            </article>

            <!-- 5. SIDEBAR WITH SEARCH, CATEGORIES, AND RECENT BLOGS -->
            <aside style="display: flex; flex-direction: column; gap: 30px;">
                
                <!-- Search Widget -->
                <div style="background: #ffffff; border: 1px solid var(--clr-border); border-radius: var(--radius-xl); padding: 28px; box-shadow: var(--shadow-card);">
                    <h4 style="font-size: 1.1rem; color: var(--clr-brand-dark); margin-bottom: 16px; font-weight: 800;">Search Articles</h4>
                    <form action="<?php echo $base_url; ?>/blog" method="GET">
                        <div style="position: relative;">
                            <input type="text" name="search" placeholder="Type keywords..." 
                                   style="width: 100%; padding: 12px 16px 12px 40px; border-radius: var(--radius-md); border: 1px solid var(--clr-border); font-size: 0.9rem;">
                            <i class="fa-solid fa-magnifying-glass" style="position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--clr-text-dim);"></i>
                        </div>
                    </form>
                </div>

                <!-- Recent Blogs Widget -->
                <div style="background: #ffffff; border: 1px solid var(--clr-border); border-radius: var(--radius-xl); padding: 28px; box-shadow: var(--shadow-card);">
                    <h4 style="font-size: 1.1rem; color: var(--clr-brand-dark); margin-bottom: 20px; font-weight: 800;">Recent Articles</h4>
                    
                    <div style="display: flex; flex-direction: column; gap: 16px;">
                        <?php foreach ($recentBlogs as $rec): 
                            $recUrl = $base_url . '/blog/' . htmlspecialchars($rec['slug']);
                            $recImg = (strpos($rec['image'], 'http') === 0) ? $rec['image'] : ($base_url . '/' . ltrim($rec['image'], '/'));
                            $recDate = date('M d, Y', strtotime($rec['created_at']));
                        ?>
                            <a href="<?php echo $recUrl; ?>" style="display: flex; gap: 12px; text-decoration: none; group" class="recent-blog-item">
                                <img src="<?php echo $recImg; ?>" alt="<?php echo htmlspecialchars($rec['title']); ?>" style="width: 70px; height: 70px; border-radius: var(--radius-md); object-fit: cover; flex-shrink: 0;">
                                <div>
                                    <span style="font-size: 0.775rem; color: var(--clr-text-dim); display: block; margin-bottom: 4px;">
                                        <i class="fa-solid fa-calendar-days"></i> <?php echo $recDate; ?>
                                    </span>
                                    <strong style="font-size: 0.875rem; color: var(--clr-brand-dark); line-height: 1.35; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                                        <?php echo htmlspecialchars($rec['title']); ?>
                                    </strong>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

                <!-- Categories Widget -->
                <div style="background: #ffffff; border: 1px solid var(--clr-border); border-radius: var(--radius-xl); padding: 28px; box-shadow: var(--shadow-card);">
                    <h4 style="font-size: 1.1rem; color: var(--clr-brand-dark); margin-bottom: 16px; font-weight: 800;">Categories</h4>
                    
                    <div style="display: flex; flex-direction: column; gap: 10px;">
                        <?php foreach ($categories as $c): ?>
                            <a href="<?php echo $base_url; ?>/blog?category=<?php echo urlencode($c['category']); ?>" 
                               style="display: flex; justify-content: space-between; align-items: center; padding: 8px 12px; background: #f8fafc; border-radius: var(--radius-sm); text-decoration: none; color: var(--clr-brand-dark); font-size: 0.9rem; font-weight: 600;">
                                <span><?php echo htmlspecialchars($c['category']); ?></span>
                                <span style="background: rgba(38, 18, 91, 0.1); color: var(--clr-brand-dark); padding: 2px 8px; border-radius: 12px; font-size: 0.75rem;">
                                    <?php echo $c['cat_count']; ?>
                                </span>
                            </a>
                        <?php endforeach; ?>
                    </div>
                </div>

            </aside>

        </div>
    </div>
</section>

<style>
@media (max-width: 991px) {
    .blog-detail-grid {
        grid-template-columns: 1fr !important;
    }
    .prev-next-grid {
        grid-template-columns: 1fr !important;
    }
}
</style>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

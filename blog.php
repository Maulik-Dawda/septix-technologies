<?php
$page_title = "Insights & Technology Blog - Septix Technologies";
$page_desc = "Explore expert articles, technical guides, and industry insights on Custom ERPs, Mobile Architecture, AI/ML Engines, and Cybersecurity.";
$current_page = "blog";

require_once __DIR__ . '/includes/header.php';
require_once __DIR__ . '/includes/db.php';

$pdo = get_db_connection();

// Filter & Search Parameters
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$category = isset($_GET['category']) ? trim($_GET['category']) : '';
$page = isset($_GET['page']) ? max(1, (int)$_GET['page']) : 1;
$perPage = 9;
$offset = ($page - 1) * $perPage;

// Build SQL Query
$where = ["status = 'published'"];
$params = [];

if (!empty($category) && $category !== 'All') {
    $where[] = "category = ?";
    $params[] = $category;
}

if (!empty($search)) {
    $where[] = "(title LIKE ? OR summary LIKE ? OR content LIKE ?)";
    $searchParam = "%{$search}%";
    $params[] = $searchParam;
    $params[] = $searchParam;
    $params[] = $searchParam;
}

$whereClause = implode(' AND ', $where);

// Total Count for Pagination
$countStmt = $pdo->prepare("SELECT COUNT(*) FROM blogs WHERE {$whereClause}");
$countStmt->execute($params);
$totalBlogs = $countStmt->fetchColumn();
$totalPages = ceil($totalBlogs / $perPage);

// Fetch Blogs
$sql = "SELECT * FROM blogs WHERE {$whereClause} ORDER BY id DESC LIMIT {$perPage} OFFSET {$offset}";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$blogs = $stmt->fetchAll();

// Categories List
$catStmt = $pdo->query("SELECT DISTINCT category FROM blogs WHERE status = 'published' ORDER BY category ASC");
$categories = $catStmt->fetchAll(PDO::FETCH_COLUMN);
?>

<!-- Page Header Hero -->
<section class="hero-section" style="padding: 130px 0 60px;">
    <div class="container text-center" style="text-align: center;">
        <div class="section-tag"><i class="fa-solid fa-newspaper"></i> Knowledge Hub</div>
        <h1 class="hero-headline">Engineering Insights & <br><span class="text-gradient">Tech Innovations</span></h1>
        <p class="hero-description" style="max-width: 740px; margin-left: auto; margin-right: auto;">
            Deep dives into enterprise cloud architecture, custom ERP development, AI workflows, and mobile application engineering.
        </p>

        <!-- Search & Filter Bar -->
        <div style="max-width: 650px; margin: 30px auto 0; position: relative;">
            <form action="<?php echo $base_url; ?>/blog" method="GET" style="display: flex; gap: 10px;">
                <?php if (!empty($category)): ?>
                    <input type="hidden" name="category" value="<?php echo htmlspecialchars($category); ?>">
                <?php endif; ?>
                <div style="position: relative; flex-grow: 1;">
                    <input type="text" name="search" value="<?php echo htmlspecialchars($search); ?>" placeholder="Search articles by keyword, technology..." 
                           style="width: 100%; padding: 14px 20px 14px 44px; border-radius: var(--radius-full); border: 1px solid var(--clr-border); background: #ffffff; box-shadow: var(--shadow-card); font-size: 0.95rem;">
                    <i class="fa-solid fa-magnifying-glass" style="position: absolute; left: 18px; top: 50%; transform: translateY(-50%); color: var(--clr-text-dim);"></i>
                </div>
                <button type="submit" class="btn btn-primary" style="border-radius: var(--radius-full); padding: 14px 28px;">
                    Search
                </button>
            </form>
        </div>
    </div>
</section>

<!-- Category Filter Pills -->
<section style="padding: 10px 0 40px;">
    <div class="container">
        <div style="display: flex; gap: 10px; justify-content: center; flex-wrap: wrap;">
            <a href="<?php echo $base_url; ?>/blog<?php echo !empty($search) ? '?search=' . urlencode($search) : ''; ?>" 
               class="deliverable-pill <?php echo (empty($category) || $category === 'All') ? 'active-pill' : ''; ?>" style="padding: 8px 18px; font-size: 0.9rem;">
                All Categories
            </a>
            <?php foreach ($categories as $cat): ?>
                <a href="<?php echo $base_url; ?>/blog?category=<?php echo urlencode($cat); ?><?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>" 
                   class="deliverable-pill <?php echo ($category === $cat) ? 'active-pill' : ''; ?>" style="padding: 8px 18px; font-size: 0.9rem;">
                    <?php echo htmlspecialchars($cat); ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Blog Listing Grid -->
<section class="section-padding" style="padding-top: 20px;">
    <div class="container">
        <?php if (count($blogs) > 0): ?>
            <div class="portfolio-grid" style="grid-template-columns: repeat(auto-fill, minmax(320px, 1fr)); gap: 30px;">
                <?php foreach ($blogs as $post): 
                    $postUrl = $base_url . '/blog/' . htmlspecialchars($post['slug']);
                    $formattedDate = date('M d, Y', strtotime($post['created_at']));
                    $imgUrl = (strpos($post['image'], 'http') === 0) ? $post['image'] : ($base_url . '/' . ltrim($post['image'], '/'));
                ?>
                    <div class="blog-card" style="background: #ffffff; border: 1px solid var(--clr-border); border-radius: var(--radius-xl); overflow: hidden; box-shadow: var(--shadow-card); display: flex; flex-direction: column; transition: var(--transition);">
                        <div class="service-card-img" style="height: 200px; overflow: hidden; position: relative;">
                            <img src="<?php echo $imgUrl; ?>" alt="<?php echo htmlspecialchars($post['title']); ?>" style="width: 100%; height: 100%; object-fit: cover;">
                            <span style="position: absolute; top: 14px; right: 14px; background: rgba(38, 18, 91, 0.85); backdrop-filter: blur(4px); color: var(--clr-brand-light); font-size: 0.75rem; font-weight: 800; padding: 4px 12px; border-radius: var(--radius-full); text-transform: uppercase;">
                                <?php echo htmlspecialchars($post['category']); ?>
                            </span>
                        </div>
                        <div class="service-card-body" style="padding: 24px; display: flex; flex-direction: column; flex-grow: 1;">
                            <div class="blog-meta" style="font-size: 0.825rem; color: var(--clr-text-dim); margin-bottom: 10px; display: flex; gap: 10px; align-items: center;">
                                <span><i class="fa-solid fa-calendar-days"></i> <?php echo $formattedDate; ?></span>
                                <span>•</span>
                                <span><i class="fa-solid fa-clock"></i> <?php echo htmlspecialchars($post['read_time']); ?></span>
                            </div>
                            <h3 class="blog-title" style="font-size: 1.2rem; font-weight: 800; color: var(--clr-brand-dark); margin-bottom: 10px; line-height: 1.4;">
                                <a href="<?php echo $postUrl; ?>" style="color: var(--clr-brand-dark); text-decoration: none;">
                                    <?php echo htmlspecialchars($post['title']); ?>
                                </a>
                            </h3>
                            <p class="blog-summary" style="font-size: 0.925rem; color: var(--clr-text-muted); line-height: 1.6; margin-bottom: 20px; flex-grow: 1; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden;">
                                <?php echo htmlspecialchars($post['summary']); ?>
                            </p>
                            <a href="<?php echo $postUrl; ?>" class="service-link" style="font-weight: 700; color: var(--clr-brand-dark); display: inline-flex; align-items: center; gap: 6px; text-decoration: none;">
                                Read Article <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Pagination Bar (Max 9 Blogs Per Page) -->
            <?php if ($totalPages > 1): ?>
                <div style="display: flex; justify-content: center; gap: 8px; margin-top: 50px; align-items: center;">
                    <?php if ($page > 1): ?>
                        <a href="<?php echo $base_url; ?>/blog?page=<?php echo ($page - 1); ?><?php echo !empty($category) ? '&category=' . urlencode($category) : ''; ?><?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>" 
                           class="btn btn-outline btn-sm" style="padding: 8px 16px;">
                            <i class="fa-solid fa-chevron-left"></i> Previous
                        </a>
                    <?php endif; ?>

                    <?php for ($p = 1; $p <= $totalPages; $p++): ?>
                        <a href="<?php echo $base_url; ?>/blog?page=<?php echo $p; ?><?php echo !empty($category) ? '&category=' . urlencode($category) : ''; ?><?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>" 
                           style="width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: 700; text-decoration: none; transition: var(--transition); <?php echo ($p === $page) ? 'background: var(--clr-brand-dark); color: #ffffff;' : 'background: #ffffff; border: 1px solid var(--clr-border); color: var(--clr-brand-dark);'; ?>">
                            <?php echo $p; ?>
                        </a>
                    <?php endfor; ?>

                    <?php if ($page < $totalPages): ?>
                        <a href="<?php echo $base_url; ?>/blog?page=<?php echo ($page + 1); ?><?php echo !empty($category) ? '&category=' . urlencode($category) : ''; ?><?php echo !empty($search) ? '&search=' . urlencode($search) : ''; ?>" 
                           class="btn btn-outline btn-sm" style="padding: 8px 16px;">
                            Next <i class="fa-solid fa-chevron-right"></i>
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

        <?php else: ?>
            <div style="text-align: center; padding: 60px 20px; background: #ffffff; border-radius: var(--radius-xl); border: 1px solid var(--clr-border);">
                <i class="fa-solid fa-folder-open" style="font-size: 3rem; color: var(--clr-brand-light); margin-bottom: 16px;"></i>
                <h3 style="font-size: 1.4rem; color: var(--clr-brand-dark); margin-bottom: 8px;">No Articles Found</h3>
                <p style="color: var(--clr-text-muted); margin-bottom: 20px;">We couldn't find any articles matching your search criteria.</p>
                <a href="<?php echo $base_url; ?>/blog" class="btn btn-primary btn-sm">Reset Filters</a>
            </div>
        <?php endif; ?>
    </div>
</section>

<style>
.active-pill {
    background: var(--clr-brand-dark) !important;
    color: #ffffff !important;
    border-color: var(--clr-brand-dark) !important;
}
</style>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

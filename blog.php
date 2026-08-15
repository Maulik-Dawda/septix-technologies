<?php
$page_title = "Tech Insights & Industry Blog - Septix Technologies";
$page_desc = "Explore the latest tech articles, AI insights, mobile architecture, cloud ERP strategies, and cybersecurity standards from Septix Technologies.";
$current_page = "blog";
require_once __DIR__ . '/includes/header.php';
?>

<!-- Blog Hero -->
<section class="hero-section" style="padding: 140px 0 70px;">
    <div class="container" style="text-align: center;">
        <div class="section-tag"><i class="fa-solid fa-newspaper"></i> Thought Leadership</div>
        <h1 class="hero-headline">Septix Tech Insights & <br><span class="text-gradient">Industry Innovations</span></h1>
        <p class="hero-description" style="max-width: 760px; margin-left: auto; margin-right: auto;">
            Deep dives, architecture guides, and technical insights curated by our global engineering and AI experts.
        </p>
    </div>
</section>

<!-- Blog Grid Section -->
<section class="section-padding">
    <div class="container">
        <div class="blog-grid">
            <?php foreach ($blog_posts as $post): ?>
                <div class="blog-card">
                    <div style="background: rgba(6, 182, 212, 0.08); padding: 40px 24px 20px; text-align: center; border-bottom: 1px solid var(--clr-border);">
                        <i class="fa-solid fa-newspaper" style="font-size: 3rem; color: var(--clr-primary-light);"></i>
                    </div>
                    <div style="padding: 24px; display: flex; flex-direction: column; flex-grow: 1;">
                        <div class="blog-meta">
                            <span style="color: var(--clr-primary-light); font-weight: 600;"><?php echo $post['category']; ?></span>
                            <span>&bull;</span>
                            <span><?php echo $post['read_time']; ?></span>
                        </div>
                        <h2 class="blog-title" style="font-size: 1.3rem;">
                            <a href="<?php echo $base_url; ?>/blog-single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a>
                        </h2>
                        <p class="blog-summary"><?php echo $post['summary']; ?></p>
                        <div style="margin-top: auto; padding-top: 16px; border-top: 1px solid var(--clr-border); display: flex; align-items: center; justify-content: space-between;">
                            <span style="font-size: 0.8rem; color: var(--clr-text-dim);"><?php echo $post['date']; ?></span>
                            <a href="<?php echo $base_url; ?>/blog-single.php?id=<?php echo $post['id']; ?>" class="btn btn-outline btn-sm">
                                Read Article <i class="fa-solid fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

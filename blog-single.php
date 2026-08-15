<?php
require_once __DIR__ . '/includes/config.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 1;
$current_post = null;

foreach ($blog_posts as $post) {
    if ($post['id'] === $id) {
        $current_post = $post;
        break;
    }
}

if (!$current_post) {
    $current_post = $blog_posts[0];
}

$page_title = $current_post['title'];
$page_desc = $current_post['summary'];
$current_page = "blog";
require_once __DIR__ . '/includes/header.php';
?>

<!-- Article Header -->
<section class="hero-section" style="padding: 140px 0 60px;">
    <div class="container" style="max-width: 900px; text-align: center;">
        <div class="section-tag"><i class="fa-solid fa-bookmark"></i> <?php echo $current_post['category']; ?></div>
        <h1 class="hero-headline" style="font-size: 2.75rem;"><?php echo $current_post['title']; ?></h1>
        <div style="display: flex; align-items: center; justify-content: center; gap: 16px; color: var(--clr-text-muted); font-size: 0.95rem; margin-top: 20px;">
            <span><i class="fa-solid fa-user" style="color: var(--clr-brand-dark);"></i> <?php echo $current_post['author']; ?></span>
            <span>&bull;</span>
            <span><i class="fa-solid fa-calendar" style="color: var(--clr-brand-dark);"></i> <?php echo $current_post['date']; ?></span>
            <span>&bull;</span>
            <span><i class="fa-solid fa-clock" style="color: var(--clr-brand-dark);"></i> <?php echo $current_post['read_time']; ?></span>
        </div>
    </div>
</section>

<!-- Article Content -->
<section class="section-padding" style="padding-top: 20px;">
    <div class="container" style="max-width: 850px;">
        <div style="background: #ffffff; border: 1px solid var(--clr-border); box-shadow: var(--shadow-card-hover); border-radius: var(--radius-lg); padding: 48px;">
            <p style="font-size: 1.2rem; color: var(--clr-brand-dark); line-height: 1.8; margin-bottom: 28px; font-weight: 600;">
                <?php echo $current_post['summary']; ?>
            </p>
            <hr style="border: 0; border-top: 1px solid var(--clr-border); margin-bottom: 28px;">
            <div style="color: var(--clr-text-muted); font-size: 1.05rem; line-height: 1.85;">
                <p style="margin-bottom: 20px;"><?php echo $current_post['content']; ?></p>
                <p style="margin-bottom: 20px;">
                    As organizations expand across multi-region markets, traditional software monoliths introduce bottlenecks in continuous deployment and operational agility. Implementing modular event-driven microservices backed by high-availability databases ensures low latency and robust fault tolerance.
                </p>
                <h3 style="color: var(--clr-brand-dark); margin: 32px 0 16px;">Key Strategic Takeaways for Tech Leaders</h3>
                <ul style="display: flex; flex-direction: column; gap: 12px; margin-bottom: 28px;">
                    <li style="display: flex; align-items: flex-start; gap: 10px;">
                        <i class="fa-solid fa-circle-check" style="color: var(--clr-brand-light); margin-top: 4px;"></i>
                        <span>Enforce automated CI/CD pipelines to validate code safety before production deployment.</span>
                    </li>
                    <li style="display: flex; align-items: flex-start; gap: 10px;">
                        <i class="fa-solid fa-circle-check" style="color: var(--clr-brand-light); margin-top: 4px;"></i>
                        <span>Implement continuous zero-trust security monitoring across distributed hybrid networks.</span>
                    </li>
                    <li style="display: flex; align-items: flex-start; gap: 10px;">
                        <i class="fa-solid fa-circle-check" style="color: var(--clr-brand-light); margin-top: 4px;"></i>
                        <span>Leverage custom AI engines to automate data pipelines and eliminate repetitive tasks.</span>
                    </li>
                </ul>
            </div>

            <!-- Author & Share Box -->
            <div style="margin-top: 40px; padding-top: 24px; border-top: 1px solid var(--clr-border); display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 16px;">
                <a href="<?php echo $base_url; ?>/blog.php" class="btn btn-outline btn-sm">
                    <i class="fa-solid fa-arrow-left"></i> Back to All Articles
                </a>
                <a href="<?php echo $base_url; ?>/contact.php" class="btn btn-primary btn-sm">
                    Discuss This Solution <i class="fa-solid fa-paper-plane"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

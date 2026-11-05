<?php
$page_title = "Top Digital Marketing Agency in Dubai UAE";
$page_desc = "Top digital marketing agency in Dubai, UAE: local SEO, bilingual Google Ads, conversion rate optimization, and GCC brand growth.";
$current_page = "services";
require_once __DIR__ . '/../includes/config.php';
$service = $services_data['digital-marketing'];
require_once __DIR__ . '/../includes/header.php';
?>

<!-- Hero -->
<section class="hero-section" style="background: <?php echo $service['banner_gradient']; ?>;">
    <div class="container" style="text-align: center;">
        <div class="section-tag"><i class="fa-solid <?php echo $service['icon']; ?>"></i> Digital Marketing in Dubai & UAE</div>
        <h1 class="hero-headline"><?php echo $service['title']; ?></h1>
        <p class="hero-description" style="max-width: 760px; margin-left: auto; margin-right: auto; color: rgba(255,255,255,0.9);">
            <?php echo $service['short_desc']; ?>
        </p>
        <div class="hero-actions">
            <a href="<?php echo $base_url; ?>/contact?service=digital-marketing" class="btn btn-primary">
                Boost Your Dubai Reach <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Overview -->
<section class="section-padding">
    <div class="container">
        <div class="global-grid">
            <div>
                <div class="section-tag"><i class="fa-solid fa-bullseye"></i> High-ROI UAE Campaigns</div>
                <h2 class="section-title">Scale Brand Authority & <br><span class="text-gradient">Dominate Dubai Rankings</span></h2>
                <p style="color: var(--clr-text-muted); font-size: 1.05rem; margin-bottom: 20px;">
                    In the competitive GCC business market, visibility drives valuation. Septix Technologies combines analytical search precision with creative storytelling to launch bilingual English/Arabic digital campaigns that capture qualified, high-ticket leads in Dubai and across the UAE.
                </p>
                <p style="color: var(--clr-text-muted); font-size: 1rem; margin-bottom: 24px;">
                    From UAE local SEO and Google Maps optimization to high-converting PPC across Google, LinkedIn, Meta, and TikTok, we engineer digital acquisition funnels with transparent ROI reporting.
                </p>
            </div>

            <div style="background: var(--clr-bg-card); border: 1px solid var(--clr-border-glow); border-radius: var(--radius-lg); padding: 36px;">
                <h3 style="font-size: 1.5rem; margin-bottom: 20px;">Growth Deliverables</h3>
                <ul style="display: flex; flex-direction: column; gap: 14px;">
                    <?php foreach ($service['features'] as $feat): ?>
                        <li style="color: var(--clr-text-main); font-size: 0.95rem; display: flex; align-items: flex-start; gap: 12px;">
                            <i class="fa-solid fa-square-check" style="color: var(--clr-primary-light); font-size: 1.1rem; margin-top: 3px;"></i>
                            <span><?php echo $feat; ?></span>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Tech Stack -->
<section class="section-padding" style="background: rgba(13, 18, 36, 0.5);">
    <div class="container">
        <div style="text-align: center; margin-bottom: 40px;">
            <div class="section-tag"><i class="fa-solid fa-layer-group"></i> Marketing Analytics</div>
            <h2 class="section-title">Marketing Platforms & Intelligence Tools</h2>
        </div>

        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 12px;">
            <?php foreach ($service['tech_stack'] as $tech): ?>
                <div style="background: var(--clr-bg-card); border: 1px solid var(--clr-border-glow); padding: 12px 24px; border-radius: var(--radius-full); font-weight: 600; color: var(--clr-primary-light);">
                    <i class="fa-solid fa-chart-pie" style="margin-right: 8px;"></i> <?php echo $tech; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>

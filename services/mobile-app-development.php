<?php
$page_title = "Top Mobile App Development Company Dubai UAE";
$page_desc = "Top mobile app development in Dubai, UAE: native iOS, Android, and Flutter apps with Apple Pay, Arabic UI, and top-tier security.";
$current_page = "services";
require_once __DIR__ . '/../includes/config.php';
$service = $services_data['mobile-app-development'];
require_once __DIR__ . '/../includes/header.php';
?>

<!-- Hero -->
<section class="hero-section" style="background: <?php echo $service['banner_gradient']; ?>;">
    <div class="container" style="text-align: center;">
        <div class="section-tag"><i class="fa-solid <?php echo $service['icon']; ?>"></i> Mobile Apps in Dubai & UAE</div>
        <h1 class="hero-headline"><?php echo $service['title']; ?></h1>
        <p class="hero-description" style="max-width: 760px; margin-left: auto; margin-right: auto; color: rgba(255,255,255,0.9);">
            <?php echo $service['short_desc']; ?>
        </p>
        <div class="hero-actions">
            <a href="<?php echo $base_url; ?>/contact?service=mobile-app-development" class="btn btn-primary">
                Build Your Mobile App <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Overview -->
<section class="section-padding">
    <div class="container">
        <div class="global-grid">
            <div>
                <div class="section-tag"><i class="fa-solid fa-mobile"></i> Mobile Mastery</div>
                <h2 class="section-title">Engaging Mobile Experiences <br><span class="text-gradient">For Dubai & Global Users</span></h2>
                <p style="color: var(--clr-text-muted); font-size: 1.05rem; margin-bottom: 20px;">
                    In Dubai's hyper-connected market, mobile apps are the primary channel for business engagement. Septix Technologies builds high-performance, intuitive mobile apps with fluid bilingual (English & Arabic) interfaces, offline sync, and bank-grade data security.
                </p>
                <p style="color: var(--clr-text-muted); font-size: 1rem; margin-bottom: 24px;">
                    We specialize in cross-platform development (Flutter, React Native) and native iOS/Android engineering with integrated UAE payment gateways (Apple Pay, Telr, Network International) for Dubai retail, fintech, logistics, and real estate brands.
                </p>
            </div>

            <div style="background: var(--clr-bg-card); border: 1px solid var(--clr-border-glow); border-radius: var(--radius-lg); padding: 36px;">
                <h3 style="font-size: 1.5rem; margin-bottom: 20px;">Key Mobile Features</h3>
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
            <div class="section-tag"><i class="fa-solid fa-layer-group"></i> Mobile Tech Stack</div>
            <h2 class="section-title">Mobile Frameworks & Tools</h2>
        </div>

        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 12px;">
            <?php foreach ($service['tech_stack'] as $tech): ?>
                <div style="background: var(--clr-bg-card); border: 1px solid var(--clr-border-glow); padding: 12px 24px; border-radius: var(--radius-full); font-weight: 600; color: var(--clr-primary-light);">
                    <i class="fa-solid fa-mobile-screen" style="margin-right: 8px;"></i> <?php echo $tech; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>

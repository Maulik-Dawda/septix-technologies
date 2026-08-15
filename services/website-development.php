<?php
$page_title = "Website Development Services - Septix Technologies";
$page_desc = "High-performance website development, custom web applications, e-commerce platforms, and PWAs engineered for global scale.";
$current_page = "services";
require_once __DIR__ . '/../includes/config.php';
$service = $services_data['website-development'];
require_once __DIR__ . '/../includes/header.php';
?>

<!-- Service Detail Hero -->
<section class="hero-section" style="background: <?php echo $service['banner_gradient']; ?>;">
    <div class="container" style="text-align: center;">
        <div class="section-tag"><i class="fa-solid <?php echo $service['icon']; ?>"></i> Web Engineering</div>
        <h1 class="hero-headline"><?php echo $service['title']; ?></h1>
        <p class="hero-description" style="max-width: 760px; margin-left: auto; margin-right: auto; color: rgba(255,255,255,0.9);">
            <?php echo $service['short_desc']; ?>
        </p>
        <div class="hero-actions">
            <a href="<?php echo $base_url; ?>/contact.php?service=website-development" class="btn btn-primary">
                Build Your Web App <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Overview & Key Deliverables -->
<section class="section-padding">
    <div class="container">
        <div class="global-grid">
            <div>
                <div class="section-tag"><i class="fa-solid fa-code"></i> Overview</div>
                <h2 class="section-title">High-Speed, Scalable & <br><span class="text-gradient">Secure Web Solutions</span></h2>
                <p style="color: var(--clr-text-muted); font-size: 1.05rem; margin-bottom: 20px;">
                    In today's digital economy, your web platform is the flagship of your business. At Septix Technologies, we design and develop enterprise-grade web applications that deliver lightning-fast load times, responsive perfection across all screen resolutions, and robust security.
                </p>
                <p style="color: var(--clr-text-muted); font-size: 1rem; margin-bottom: 24px;">
                    Whether you require a custom enterprise portal, an API-first headless e-commerce store, or a Progressive Web Application (PWA), our team utilizes modern web engineering standards to drive user engagement and conversion.
                </p>
                <a href="<?php echo $base_url; ?>/contact.php" class="btn btn-outline">
                    Discuss Your Web Requirements <i class="fa-solid fa-comments"></i>
                </a>
            </div>

            <!-- Capabilities Card -->
            <div style="background: var(--clr-bg-card); border: 1px solid var(--clr-border-glow); border-radius: var(--radius-lg); padding: 36px;">
                <h3 style="font-size: 1.5rem; margin-bottom: 20px;">Key Capabilities & Features</h3>
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

<!-- Tech Stack & Workflow -->
<section class="section-padding" style="background: rgba(13, 18, 36, 0.5);">
    <div class="container">
        <div style="text-align: center; margin-bottom: 40px;">
            <div class="section-tag"><i class="fa-solid fa-layer-group"></i> Stack & Workflow</div>
            <h2 class="section-title">Web Technologies We Master</h2>
        </div>

        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 12px; margin-bottom: 60px;">
            <?php foreach ($service['tech_stack'] as $tech): ?>
                <div style="background: var(--clr-bg-card); border: 1px solid var(--clr-border-glow); padding: 12px 24px; border-radius: var(--radius-full); font-weight: 600; color: var(--clr-primary-light);">
                    <i class="fa-solid fa-microchip" style="margin-right: 8px;"></i> <?php echo $tech; ?>
                </div>
            <?php endforeach; ?>
        </div>

        <div style="text-align: center; margin-bottom: 30px;">
            <h3 style="font-size: 1.75rem;">Step-by-Step Delivery Process</h3>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 20px;">
            <?php foreach ($service['workflow'] as $index => $step): ?>
                <div style="background: var(--clr-bg-card); border: 1px solid var(--clr-border); padding: 24px; border-radius: var(--radius-md); text-align: center;">
                    <div style="width: 36px; height: 36px; border-radius: 50%; background: var(--grad-primary); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700; margin: 0 auto 14px;">
                        <?php echo $index + 1; ?>
                    </div>
                    <strong style="display: block; color: #fff; font-size: 1rem;"><?php echo $step; ?></strong>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Service FAQ Accordion -->
<section class="section-padding">
    <div class="container">
        <div style="text-align: center;">
            <div class="section-tag"><i class="fa-solid fa-circle-question"></i> FAQ</div>
            <h2 class="section-title">Frequently Asked Questions</h2>
        </div>

        <div class="faq-list">
            <div class="faq-item active">
                <div class="faq-question">How long does it take to develop a custom web application? <i class="fa-solid fa-chevron-down"></i></div>
                <div class="faq-answer">Development timelines range from 3 to 6 weeks for standard business applications and custom web platforms, depending on features, third-party API integrations, and testing requirements.</div>
            </div>
            <div class="faq-item">
                <div class="faq-question">Will our website be mobile-responsive and optimized for search engines (SEO)? <i class="fa-solid fa-chevron-down"></i></div>
                <div class="faq-answer">Yes, every website engineered by Septix Technologies is 100% mobile-responsive, Core Web Vitals compliant, and built with modern semantic SEO markup.</div>
            </div>
            <div class="faq-item">
                <div class="faq-question">Do you provide ongoing web hosting, maintenance, and security updates? <i class="fa-solid fa-chevron-down"></i></div>
                <div class="faq-answer">We offer comprehensive 24/7 SLA maintenance packages including server management, automated database backups, security patches, and feature updates.</div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>

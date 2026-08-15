<?php
$page_title = "Our IT Services & Technology Solutions";
$page_desc = "Explore Septix Technologies core services: Website Development, Mobile Apps, Custom ERP, Digital Marketing, AI/ML Solutions, and IT Networking.";
$current_page = "services";
require_once __DIR__ . '/includes/header.php';
?>

<!-- Services Hero Header -->
<section class="hero-section" style="padding: 140px 0 70px;">
    <div class="container" style="text-align: center;">
        <div class="section-tag"><i class="fa-solid fa-cubes"></i> Global Service Offerings</div>
        <h1 class="hero-headline">End-to-End Enterprise <br><span class="text-gradient">Technology Services</span></h1>
        <p class="hero-description" style="max-width: 760px; margin-left: auto; margin-right: auto;">
            We engineer bespoke software, intelligent automation, and cloud networks tailored to accelerate digital transformation for global enterprises.
        </p>
    </div>
</section>

<!-- Services Grid Section -->
<section class="section-padding">
    <div class="container">
        <div class="services-grid">
            <?php foreach ($services_data as $key => $service): ?>
                <div class="service-card" id="<?php echo $key; ?>">
                    <div class="service-icon-box">
                        <i class="fa-solid <?php echo $service['icon']; ?>"></i>
                    </div>
                    <h3 class="service-title"><?php echo $service['title']; ?></h3>
                    <p class="service-desc"><?php echo $service['short_desc']; ?></p>
                    
                    <div style="margin-bottom: 24px;">
                        <h4 style="font-size: 0.95rem; color: #fff; margin-bottom: 12px;">Key Capabilities:</h4>
                        <ul style="display: flex; flex-direction: column; gap: 8px;">
                            <?php foreach ($service['features'] as $feature): ?>
                                <li style="color: var(--clr-text-muted); font-size: 0.875rem; display: flex; align-items: center; gap: 8px;">
                                    <i class="fa-solid fa-circle-check" style="color: var(--clr-primary-light); font-size: 0.85rem;"></i> <?php echo $feature; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <div style="margin-bottom: 24px; padding-top: 16px; border-top: 1px solid var(--clr-border);">
                        <span style="color: var(--clr-text-dim); font-size: 0.8rem; font-weight: 600; display: block; margin-bottom: 8px;">TECH STACK:</span>
                        <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                            <?php foreach ($service['tech_stack'] as $tech): ?>
                                <span style="background: rgba(255,255,255,0.05); color: var(--clr-primary-light); padding: 4px 10px; border-radius: var(--radius-sm); font-size: 0.8rem; font-weight: 500;">
                                    <?php echo $tech; ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <a href="<?php echo $base_url; ?>/services/<?php echo $key; ?>.php" class="btn btn-primary btn-sm" style="width: 100%; justify-content: center; margin-top: auto;">
                        View Dedicated Service Page <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Development Methodology -->
<section class="section-padding" style="background: rgba(13, 18, 36, 0.5);">
    <div class="container">
        <div style="text-align: center;">
            <div class="section-tag"><i class="fa-solid fa-gears"></i> Process Excellence</div>
            <h2 class="section-title">Our Engineering Methodology</h2>
            <p class="section-subtitle">How we deliver robust, high-performance software products from initial discovery to deployment.</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); gap: 24px; margin-top: 50px;">
            <div style="background: var(--clr-bg-card); border: 1px solid var(--clr-border); padding: 28px; border-radius: var(--radius-md); text-align: center;">
                <div style="font-size: 2.5rem; font-weight: 800; color: var(--clr-primary-light); margin-bottom: 12px;">01</div>
                <h4 style="font-size: 1.1rem; margin-bottom: 8px;">Discovery & Audit</h4>
                <p style="color: var(--clr-text-muted); font-size: 0.875rem;">In-depth business requirement mapping, architecture design, and feasibility analysis.</p>
            </div>

            <div style="background: var(--clr-bg-card); border: 1px solid var(--clr-border); padding: 28px; border-radius: var(--radius-md); text-align: center;">
                <div style="font-size: 2.5rem; font-weight: 800; color: var(--clr-primary-light); margin-bottom: 12px;">02</div>
                <h4 style="font-size: 1.1rem; margin-bottom: 8px;">Agile Engineering</h4>
                <p style="color: var(--clr-text-muted); font-size: 0.875rem;">Sprint-based development cycles with continuous integration, review, and client feedback.</p>
            </div>

            <div style="background: var(--clr-bg-card); border: 1px solid var(--clr-border); padding: 28px; border-radius: var(--radius-md); text-align: center;">
                <div style="font-size: 2.5rem; font-weight: 800; color: var(--clr-primary-light); margin-bottom: 12px;">03</div>
                <h4 style="font-size: 1.1rem; margin-bottom: 8px;">QA & Security</h4>
                <p style="color: var(--clr-text-muted); font-size: 0.875rem;">Automated testing, load testing, vulnerability scanning, and OWASP security compliance.</p>
            </div>

            <div style="background: var(--clr-bg-card); border: 1px solid var(--clr-border); padding: 28px; border-radius: var(--radius-md); text-align: center;">
                <div style="font-size: 2.5rem; font-weight: 800; color: var(--clr-primary-light); margin-bottom: 12px;">04</div>
                <h4 style="font-size: 1.1rem; margin-bottom: 8px;">Global Launch & Support</h4>
                <p style="color: var(--clr-text-muted); font-size: 0.875rem;">Zero-downtime deployment, continuous monitoring, and 24/7 SLA technical assistance.</p>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

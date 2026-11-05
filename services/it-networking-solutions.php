<?php
$page_title = "Enterprise IT Networking & Cloud Dubai UAE";
$page_desc = "Enterprise IT networking in Dubai, UAE: AWS/Azure cloud migration, cybersecurity audits, SD-WAN, and 24/7 managed IT support.";
$current_page = "services";
require_once __DIR__ . '/../includes/config.php';
$service = $services_data['it-networking-solutions'];
require_once __DIR__ . '/../includes/header.php';
?>

<!-- Hero -->
<section class="hero-section" style="background: <?php echo $service['banner_gradient']; ?>;">
    <div class="container" style="text-align: center;">
        <div class="section-tag"><i class="fa-solid <?php echo $service['icon']; ?>"></i> IT Infrastructure in Dubai & UAE</div>
        <h1 class="hero-headline"><?php echo $service['title']; ?></h1>
        <p class="hero-description" style="max-width: 760px; margin-left: auto; margin-right: auto; color: rgba(255,255,255,0.9);">
            <?php echo $service['short_desc']; ?>
        </p>
        <div class="hero-actions">
            <a href="<?php echo $base_url; ?>/contact?service=it-networking-solutions" class="btn btn-primary">
                Secure Your UAE Infrastructure <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<!-- Overview -->
<section class="section-padding">
    <div class="container">
        <div class="global-grid">
            <div>
                <div class="section-tag"><i class="fa-solid fa-server"></i> Cloud & Network Infrastructure</div>
                <h2 class="section-title">Zero-Downtime Infrastructure <br><span class="text-gradient">For Dubai Enterprise Scale</span></h2>
                <p style="color: var(--clr-text-muted); font-size: 1.05rem; margin-bottom: 20px;">
                    Modern UAE operations require ultra-resilient, low-latency, and cybersecurity-hardened IT networks. Septix Technologies provides end-to-end network architecture, cloud migration to local UAE data centers (AWS UAE, Microsoft Azure UAE North), and 24/7 proactive monitoring.
                </p>
                <p style="color: var(--clr-text-muted); font-size: 1rem; margin-bottom: 24px;">
                    We audit existing corporate infrastructure, eliminate bottlenecks, configure SD-WAN connections for multi-branch Dubai offices, and enforce Zero-Trust access to ensure UAE data sovereignty.
                </p>
            </div>

            <div>
                <div style="border-radius: var(--radius-lg); overflow: hidden; margin-bottom: 24px; box-shadow: var(--shadow-card); height: 250px;">
                    <img src="<?php echo $base_url . '/' . $service['image']; ?>" alt="Enterprise IT Networking & Cloud Solutions Dubai UAE" width="600" height="250" style="width: 100%; height: 100%; object-fit: cover;" loading="eager">
                </div>
                <div style="background: var(--clr-bg-card); border: 1px solid var(--clr-border-glow); border-radius: var(--radius-lg); padding: 36px;">
                    <h3 style="font-size: 1.5rem; margin-bottom: 20px;">Networking Capabilities</h3>
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
    </div>
</section>

<!-- Tech Stack -->
<section class="section-padding" style="background: rgba(13, 18, 36, 0.5);">
    <div class="container">
        <div style="text-align: center; margin-bottom: 40px;">
            <div class="section-tag"><i class="fa-solid fa-layer-group"></i> Cloud & Security Tools</div>
            <h2 class="section-title">Cloud & Network Platforms</h2>
        </div>

        <div style="display: flex; flex-wrap: wrap; justify-content: center; gap: 12px;">
            <?php foreach ($service['tech_stack'] as $tech): ?>
                <div style="background: var(--clr-bg-card); border: 1px solid var(--clr-border-glow); padding: 12px 24px; border-radius: var(--radius-full); font-weight: 600; color: var(--clr-primary-light);">
                    <i class="fa-solid fa-network-wired" style="margin-right: 8px;"></i> <?php echo $tech; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>

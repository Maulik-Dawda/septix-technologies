<?php
$page_title = "Septix Technologies - Innovating Digital Solutions Globally";
$page_desc = "Septix Technologies is an international IT engineering firm delivering Website Development, Mobile Apps, Enterprise ERP, Digital Marketing, AI/ML, and IT Networking.";
$current_page = "home";
require_once __DIR__ . '/includes/header.php';
?>

<!-- Dynamic Animated Background Floating Ambient Orbs & Micro Icons -->
<div class="bg-floating-orb orb-1"></div>
<div class="bg-floating-orb orb-2"></div>
<div class="bg-floating-orb orb-3"></div>

<div class="floating-tech-icon tech-icon-1"><i class="fa-solid fa-code"></i></div>
<div class="floating-tech-icon tech-icon-2"><i class="fa-solid fa-microchip"></i></div>
<div class="floating-tech-icon tech-icon-3"><i class="fa-solid fa-network-wired"></i></div>

<!-- Choicy Theme Hero Section (Split Layout) -->
<section class="hero-section">
    <div class="container">
        <div class="hero-grid">
            <div>
                <div class="section-tag">
                    <i class="fa-solid fa-earth-americas"></i> Proudly Serving Clients Globally
                </div>
                <h1 class="hero-headline">
                    Architecting Next-Gen <br>
                    <span class="text-gradient">Digital Solutions</span> & Enterprise Tech
                </h1>
                <p class="hero-description">
                    Septix Technologies empowers forward-thinking companies worldwide with high-performance Web Applications, Native Mobile Platforms, Custom ERP Systems, AI/ML Engines, and Secure IT Infrastructure.
                </p>
                <div class="hero-actions">
                    <a href="<?php echo $base_url; ?>/contact.php" class="btn btn-primary">
                        Start a Project <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <a href="<?php echo $base_url; ?>/services.php" class="btn btn-outline">
                        Explore Services <i class="fa-solid fa-cubes"></i>
                    </a>
                </div>
            </div>

            <!-- Choicy Hero Image Visual Container -->
            <div class="hero-image-box">
                <img src="<?php echo $base_url; ?>/assets/images/hero-banner.jpg" alt="Septix Technologies Global IT Engineering Team">
                <div class="floating-badge">
                    <div class="floating-badge-icon">
                        <i class="fa-solid fa-award"></i>
                    </div>
                    <div>
                        <strong style="display: block; color: var(--clr-brand-dark); font-size: 1rem;">250+ Enterprise Projects</strong>
                        <span style="color: var(--clr-text-muted); font-size: 0.85rem;">Delivered Worldwide with 99.8% SLA</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Animated Stats Counter Banner -->
        <div class="stats-banner">
            <div class="stat-item">
                <div class="stat-number" data-target="250" data-suffix="+">0+</div>
                <div class="stat-label">Projects Completed</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="50" data-suffix="+">0+</div>
                <div class="stat-label">Global Clients</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="99" data-suffix="%">0%</div>
                <div class="stat-label">Client Retention Rate</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="24" data-suffix="/7">0/7</div>
                <div class="stat-label">Global Support SLA</div>
            </div>
        </div>
    </div>
</section>

<!-- Core Services Section (Choicy Image Cards Grid) -->
<section class="section-padding">
    <div class="container text-center">
        <div style="text-align: center;">
            <div class="section-tag"><i class="fa-solid fa-layer-group"></i> What We Do</div>
            <h2 class="section-title">Comprehensive Enterprise <br><span class="text-gradient">IT & Software Services</span></h2>
            <p class="section-subtitle">Delivering end-to-end digital transformation tailored to scale your global operations.</p>
        </div>

        <div class="services-grid">
            <?php foreach ($services_data as $key => $service): ?>
                <div class="service-card">
                    <div class="service-card-img">
                        <img src="<?php echo $base_url . '/' . $service['image']; ?>" alt="<?php echo $service['title']; ?>">
                        <div class="service-icon-floating">
                            <i class="fa-solid <?php echo $service['icon']; ?>"></i>
                        </div>
                    </div>
                    <div class="service-card-body">
                        <h3 class="service-title"><?php echo $service['title']; ?></h3>
                        <p class="service-desc"><?php echo $service['short_desc']; ?></p>
                        <a href="<?php echo $base_url; ?>/services/<?php echo $key; ?>.php" class="service-link">
                            Learn More <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Global Reach & Regional Hubs Section -->
<section class="section-padding global-section">
    <div class="container">
        <div class="global-grid">
            <div>
                <div class="section-tag"><i class="fa-solid fa-globe"></i> Global Footprint</div>
                <h2 class="section-title">Serving Clients <br><span class="text-gradient">Across the Globe</span></h2>
                <p style="color: var(--clr-text-muted); font-size: 1.05rem; margin-bottom: 24px;">
                    Septix Technologies operates across major tech hubs worldwide. We provide seamless 24/7 delivery, multi-currency integration, and localized compliance support.
                </p>
                <div style="display: flex; gap: 16px; flex-wrap: wrap;">
                    <a href="<?php echo $base_url; ?>/contact.php" class="btn btn-primary btn-sm">Connect With Us</a>
                    <a href="<?php echo $base_url; ?>/about.php" class="btn btn-outline btn-sm">About Our Company</a>
                </div>
            </div>

            <div class="hubs-grid">
                <div class="hub-card">
                    <div class="hub-flag">🇺🇸</div>
                    <div>
                        <div class="hub-name">United States</div>
                        <div class="hub-city">New York & Tech Hubs</div>
                    </div>
                </div>
                <div class="hub-card">
                    <div class="hub-flag">🇬🇧</div>
                    <div>
                        <div class="hub-name">United Kingdom</div>
                        <div class="hub-city">London Operations</div>
                    </div>
                </div>
                <div class="hub-card">
                    <div class="hub-flag">🇦🇪</div>
                    <div>
                        <div class="hub-name">UAE / Middle East</div>
                        <div class="hub-city">Dubai Regional Office</div>
                    </div>
                </div>
                <div class="hub-card">
                    <div class="hub-flag">🇮🇳</div>
                    <div>
                        <div class="hub-name">India</div>
                        <div class="hub-city">R&D Development Center</div>
                    </div>
                </div>
                <div class="hub-card">
                    <div class="hub-flag">🇦🇺</div>
                    <div>
                        <div class="hub-name">Australia</div>
                        <div class="hub-city">Sydney Representative</div>
                    </div>
                </div>
                <div class="hub-card">
                    <div class="hub-flag">🇸🇬</div>
                    <div>
                        <div class="hub-name">Singapore</div>
                        <div class="hub-city">APAC Innovation Hub</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Interactive Project Cost Estimator -->
<section class="section-padding">
    <div class="container">
        <div style="text-align: center;">
            <div class="section-tag"><i class="fa-solid fa-calculator"></i> Quick Estimation</div>
            <h2 class="section-title">Interactive Project <br><span class="text-gradient">Budget Estimator</span></h2>
            <p class="section-subtitle">Select your technology requirements to get an instant estimated project scope budget.</p>
        </div>

        <div class="estimator-box" id="projectEstimator">
            <div class="estimator-step">
                <span class="estimator-label">1. Choose Primary Service Required:</span>
                <div class="options-pill-grid">
                    <div class="option-pill selected" data-cost="3500">Website Development</div>
                    <div class="option-pill" data-cost="5500">Mobile App Development</div>
                    <div class="option-pill" data-cost="9000">Custom ERP Software</div>
                    <div class="option-pill" data-cost="2500">Digital Marketing Campaign</div>
                    <div class="option-pill" data-cost="7500">AI / ML Solution</div>
                    <div class="option-pill" data-cost="4000">IT Networking Setup</div>
                </div>
            </div>

            <div class="estimator-step">
                <span class="estimator-label">2. Select Project Scale & Complexity:</span>
                <div class="options-pill-grid">
                    <div class="option-pill selected" data-mult="1.0">Startup / MVP</div>
                    <div class="option-pill" data-mult="1.5">Growing Business</div>
                    <div class="option-pill" data-mult="2.2">Enterprise Grade</div>
                </div>
            </div>

            <div class="estimate-result-bar">
                <div>
                    <span style="font-size: 0.875rem; color: var(--clr-text-muted); font-weight: 700; display: block; text-transform: uppercase;">Estimated Investment Range:</span>
                    <div class="estimate-price" id="estimatedPrice">$3,500 - $4,725</div>
                </div>
                <a href="<?php echo $base_url; ?>/contact.php" class="btn btn-primary">
                    Request Formal Proposal <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Client Testimonials & Social Proof -->
<section class="section-padding" style="background: rgba(255, 255, 255, 0.6); border-top: 1px solid var(--clr-border);">
    <div class="container">
        <div style="text-align: center;">
            <div class="section-tag"><i class="fa-solid fa-quote-left"></i> Client Reviews</div>
            <h2 class="section-title">Trusted By Visionary <br><span class="text-gradient">Global Leaders</span></h2>
            <p class="section-subtitle">See how Septix Technologies delivers impactful software engineering for clients worldwide.</p>
        </div>

        <div class="portfolio-grid" style="margin-top: 40px;">
            <?php foreach ($testimonials as $t): ?>
                <div style="background: #ffffff; border: 1px solid var(--clr-border); border-radius: var(--radius-xl); padding: 32px; box-shadow: var(--shadow-card);">
                    <div style="color: #f59e0b; margin-bottom: 16px; font-size: 1rem;">
                        <i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i>
                    </div>
                    <p style="color: var(--clr-text-muted); font-style: italic; margin-bottom: 24px; font-size: 0.975rem; line-height: 1.7;">
                        "<?php echo $t['quote']; ?>"
                    </p>
                    <div style="display: flex; align-items: center; gap: 14px;">
                        <div style="width: 44px; height: 44px; border-radius: 50%; background: var(--clr-brand-dark); color: var(--clr-brand-light); display: flex; align-items: center; justify-content: center; font-weight: 800; font-size: 1.1rem;">
                            <?php echo substr($t['name'], 0, 1); ?>
                        </div>
                        <div>
                            <strong style="display: block; color: var(--clr-brand-dark); font-size: 0.95rem;"><?php echo $t['name']; ?></strong>
                            <span style="font-size: 0.825rem; color: var(--clr-text-dim);"><?php echo $t['role']; ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Latest Insights & Tech Blog Preview -->
<section class="section-padding">
    <div class="container">
        <div style="text-align: center;">
            <div class="section-tag"><i class="fa-solid fa-newspaper"></i> Latest Insights</div>
            <h2 class="section-title">Knowledge & Tech <br><span class="text-gradient">Innovations Blog</span></h2>
            <p class="section-subtitle">Stay ahead with expert articles on AI, Cloud Infrastructure, Custom ERPs, and Mobile Architecture.</p>
        </div>

        <div class="blog-grid">
            <?php foreach ($blog_posts as $post): ?>
                <div class="blog-card">
                    <div class="service-card-img" style="height: 190px;">
                        <img src="<?php echo $base_url . '/' . $post['image']; ?>" alt="<?php echo $post['title']; ?>">
                    </div>
                    <div class="service-card-body">
                        <div class="blog-meta">
                            <span><i class="fa-solid fa-calendar-days"></i> <?php echo $post['date']; ?></span>
                            <span>•</span>
                            <span><i class="fa-solid fa-user"></i> <?php echo $post['author']; ?></span>
                        </div>
                        <h3 class="blog-title"><?php echo $post['title']; ?></h3>
                        <p class="blog-summary"><?php echo $post['summary']; ?></p>
                        <a href="<?php echo $base_url; ?>/blog-single.php?id=<?php echo $post['id']; ?>" class="service-link">
                            Read Full Article <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

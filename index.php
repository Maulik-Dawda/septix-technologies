<?php
$page_title = "Home - Innovating Digital Solutions Globally";
$page_desc = "Septix Technologies delivers world-class Web Development, Mobile Apps, Custom ERP Software, Digital Marketing, AI/ML Solutions, and IT Networking globally.";
$current_page = "home";
require_once __DIR__ . '/includes/header.php';
?>

<!-- Hero Section -->
<section class="hero-section">
    <div class="container">
        <div class="hero-content">
            <div class="section-tag">
                <i class="fa-solid fa-earth-americas"></i> Proudly Serving Clients Globally
            </div>
            <h1 class="hero-headline">
                Architecting Next-Gen <br>
                <span class="text-gradient">Digital Solutions & Enterprise Tech</span>
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

        <!-- Global Stats Banner -->
        <div class="stats-banner">
            <div class="stat-item">
                <div class="stat-number" data-target="50" data-suffix="+">50+</div>
                <div class="stat-label">Countries Served</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="250" data-suffix="+">250+</div>
                <div class="stat-label">Enterprise Projects</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="99.8" data-suffix="%">99.8%</div>
                <div class="stat-label">Client Retention Rate</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="24" data-suffix="/7">24/7</div>
                <div class="stat-label">Global IT Support</div>
            </div>
        </div>
    </div>
</section>

<!-- Core Services Showcase -->
<section class="section-padding">
    <div class="container">
        <div style="text-align: center;">
            <div class="section-tag"><i class="fa-solid fa-layer-group"></i> Core Competencies</div>
            <h2 class="section-title">Comprehensive Tech Services <br><span class="text-gradient">Engineered for Global Scale</span></h2>
            <p class="section-subtitle">
                From initial concept to deployment and cloud maintenance, Septix Technologies provides end-to-end technology services tailored to your industry goals.
            </p>
        </div>

        <div class="services-grid">
            <?php foreach ($services_data as $key => $service): ?>
                <div class="service-card">
                    <div class="service-icon-box">
                        <i class="fa-solid <?php echo $service['icon']; ?>"></i>
                    </div>
                    <h3 class="service-title"><?php echo $service['title']; ?></h3>
                    <p class="service-desc"><?php echo $service['short_desc']; ?></p>
                    
                    <div style="margin-bottom: 20px;">
                        <ul style="display: flex; flex-direction: column; gap: 8px;">
                            <?php foreach (array_slice($service['features'], 0, 3) as $feat): ?>
                                <li style="color: var(--clr-text-muted); font-size: 0.875rem; display: flex; align-items: center; gap: 8px;">
                                    <i class="fa-solid fa-check" style="color: var(--clr-brand-light); font-size: 0.85rem;"></i> <?php echo $feat; ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                    <a href="<?php echo $base_url; ?>/services/<?php echo $key; ?>.php" class="service-link">
                        Dedicated Service Page <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Global Reach & Hubs Section -->
<section class="section-padding global-section">
    <div class="container">
        <div class="global-grid">
            <div>
                <div class="section-tag"><i class="fa-solid fa-globe"></i> Global Footprint</div>
                <h2 class="section-title">Delivering Excellence <br><span class="text-gradient">Across Every Continent</span></h2>
                <p style="color: var(--clr-text-muted); margin-bottom: 24px; font-size: 1.05rem;">
                    With distributed engineering hubs and continuous multi-time-zone support, Septix Technologies seamlessly collaborates with startups, mid-market enterprises, and Fortune 500 brands around the globe.
                </p>
                <div style="display: flex; flex-direction: column; gap: 16px; margin-bottom: 30px;">
                    <div style="display: flex; align-items: center; gap: 14px;">
                        <div class="info-icon" style="width:36px; height:36px; font-size:1rem;"><i class="fa-solid fa-shield-halved"></i></div>
                        <div>
                            <strong style="display: block; color: var(--clr-brand-dark);">Global Security & Compliance</strong>
                            <span style="color: var(--clr-text-muted); font-size: 0.9rem;">ISO 27001, GDPR, and HIPAA compliant data protection standards.</span>
                        </div>
                    </div>
                    <div style="display: flex; align-items: center; gap: 14px;">
                        <div class="info-icon" style="width:36px; height:36px; font-size:1rem;"><i class="fa-solid fa-bolt"></i></div>
                        <div>
                            <strong style="display: block; color: var(--clr-brand-dark);">Rapid Deployment Velocity</strong>
                            <span style="color: var(--clr-text-muted); font-size: 0.9rem;">Agile sprint cycles ensuring faster time-to-market.</span>
                        </div>
                    </div>
                </div>
                <a href="<?php echo $base_url; ?>/about.php" class="btn btn-primary">
                    Learn About Our Global Reach <i class="fa-solid fa-arrow-right"></i>
                </a>
            </div>

            <!-- Hub Cards -->
            <div class="hubs-grid">
                <div class="hub-card">
                    <div class="hub-flag">🇺🇸</div>
                    <div>
                        <div class="hub-name">North America</div>
                        <div class="hub-city">Tech Hub & Client Services</div>
                    </div>
                </div>
                <div class="hub-card">
                    <div class="hub-flag">🇬🇧</div>
                    <div>
                        <div class="hub-name">Europe</div>
                        <div class="hub-city">Enterprise R&D Center</div>
                    </div>
                </div>
                <div class="hub-card">
                    <div class="hub-flag">🇦🇪</div>
                    <div>
                        <div class="hub-name">Middle East</div>
                        <div class="hub-city">Digital Transformation Hub</div>
                    </div>
                </div>
                <div class="hub-card">
                    <div class="hub-flag">🇮🇳</div>
                    <div>
                        <div class="hub-name">Asia Pacific</div>
                        <div class="hub-city">Global Delivery Center</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Interactive Project Estimator Section -->
<section class="section-padding" style="background: rgba(255, 255, 255, 0.4);">
    <div class="container">
        <div style="text-align: center;">
            <div class="section-tag"><i class="fa-solid fa-calculator"></i> Quick Project Estimator</div>
            <h2 class="section-title">Estimate Your Project Scope <br><span class="text-gradient">In Seconds</span></h2>
            <p class="section-subtitle">Select your target service and project scale to view an estimated investment range.</p>
        </div>

        <div class="estimator-box" id="projectEstimator">
            <div class="estimator-step">
                <label class="estimator-label">1. Select Target Service:</label>
                <div class="options-pill-grid">
                    <div class="option-pill selected" data-cost="3500">Website Development</div>
                    <div class="option-pill" data-cost="5000">Mobile App Development</div>
                    <div class="option-pill" data-cost="8500">Custom ERP Software</div>
                    <div class="option-pill" data-cost="2500">Digital Marketing</div>
                    <div class="option-pill" data-cost="7500">AI / ML Solutions</div>
                    <div class="option-pill" data-cost="4000">IT Networking</div>
                </div>
            </div>

            <div class="estimator-step">
                <label class="estimator-label">2. Select Project Scale:</label>
                <div class="options-pill-grid">
                    <div class="option-pill selected" data-mult="1.0">MVP / Startup Scope</div>
                    <div class="option-pill" data-mult="1.75">Mid-Market Business</div>
                    <div class="option-pill" data-mult="3.0">Global Enterprise Infrastructure</div>
                </div>
            </div>

            <div class="estimate-result-bar">
                <div>
                    <span style="color: var(--clr-text-muted); font-size: 0.9rem; display: block;">Estimated Investment Range:</span>
                    <div class="estimate-price" id="estimatedPrice">$3,500 - $4,725</div>
                </div>
                <a href="<?php echo $base_url; ?>/contact.php" class="btn btn-primary">
                    Get Custom Proposal <i class="fa-solid fa-paper-plane"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Latest Insights / Blog Preview -->
<section class="section-padding">
    <div class="container">
        <div style="display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 20px;">
            <div>
                <div class="section-tag"><i class="fa-solid fa-newspaper"></i> Industry Insights</div>
                <h2 class="section-title">Latest Articles & Tech Trends</h2>
            </div>
            <a href="<?php echo $base_url; ?>/blog.php" class="btn btn-outline btn-sm">
                View All Articles <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

        <div class="blog-grid">
            <?php foreach (array_slice($blog_posts, 0, 3) as $post): ?>
                <div class="blog-card">
                    <div class="blog-meta" style="padding: 24px 24px 0;">
                        <span style="color: var(--clr-brand-dark); font-weight: 700;"><?php echo $post['category']; ?></span>
                        <span>&bull;</span>
                        <span><?php echo $post['read_time']; ?></span>
                    </div>
                    <div style="padding: 0 24px 24px;">
                        <h3 class="blog-title">
                            <a href="<?php echo $base_url; ?>/blog-single.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a>
                        </h3>
                        <p class="blog-summary"><?php echo $post['summary']; ?></p>
                        <a href="<?php echo $base_url; ?>/blog-single.php?id=<?php echo $post['id']; ?>" style="color: var(--clr-brand-dark); font-weight: 700; font-size: 0.9rem;">
                            Read Full Article <i class="fa-solid fa-angle-right" style="color: var(--clr-brand-light);"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section-padding" style="background: var(--grad-primary); text-align: center;">
    <div class="container">
        <h2 style="font-size: 2.75rem; color: #ffffff; margin-bottom: 16px;">Ready to Scale Your Digital Infrastructure Globally?</h2>
        <p style="color: rgba(255,255,255,0.9); font-size: 1.2rem; max-width: 700px; margin: 0 auto 32px;">
            Schedule a consultation with Septix Technologies tech architects and transform your business today.
        </p>
        <a href="<?php echo $base_url; ?>/contact.php" class="btn" style="background: #ffffff; color: var(--clr-brand-dark); font-size: 1.1rem; padding: 16px 36px;">
            Book Free Tech Consultation <i class="fa-solid fa-calendar-check" style="color: var(--clr-brand-light);"></i>
        </a>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

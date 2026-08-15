<?php
$page_title = "Home - Innovating Digital Solutions Globally";
$page_desc = "Septix Technologies delivers world-class Web Development, Mobile Apps, Custom ERP Software, Digital Marketing, AI/ML Solutions, and IT Networking globally.";
$current_page = "home";
require_once __DIR__ . '/includes/header.php';
?>

<!-- Hero Section (Choicy Theme Split Layout) -->
<section class="hero-section">
    <div class="container">
        <div class="hero-grid">
            <!-- Left Hero Content -->
            <div>
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

            <!-- Right Hero Image Visual (Choicy Theme Style) -->
            <div class="hero-image-box">
                <img src="<?php echo $base_url; ?>/assets/images/hero-banner.jpg" alt="Septix Technologies Global IT Agency Team">
                <div class="floating-badge">
                    <div class="floating-badge-icon">
                        <i class="fa-solid fa-trophy"></i>
                    </div>
                    <div>
                        <strong style="display: block; color: var(--clr-brand-dark); font-size: 1rem;">250+ Enterprise Projects</strong>
                        <span style="color: var(--clr-text-muted); font-size: 0.85rem;">Delivered Worldwide with 99.8% SLA</span>
                    </div>
                </div>
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

<!-- Core Services Showcase (Choicy Image Cards) -->
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
            <!-- 1. Web Dev -->
            <div class="service-card">
                <div class="service-card-img">
                    <img src="<?php echo $base_url; ?>/assets/images/services/web-dev.jpg" alt="Website Development">
                    <div class="service-icon-floating">
                        <i class="fa-solid fa-laptop-code"></i>
                    </div>
                </div>
                <div class="service-card-body">
                    <h3 class="service-title">Website Development</h3>
                    <p class="service-desc"><?php echo $services_data['website-development']['short_desc']; ?></p>
                    
                    <ul style="display: flex; flex-direction: column; gap: 8px; margin-bottom: 24px;">
                        <?php foreach (array_slice($services_data['website-development']['features'], 0, 3) as $feat): ?>
                            <li style="color: var(--clr-text-muted); font-size: 0.875rem; display: flex; align-items: center; gap: 8px;">
                                <i class="fa-solid fa-circle-check" style="color: var(--clr-brand-light); font-size: 0.85rem;"></i> <?php echo $feat; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <a href="<?php echo $base_url; ?>/services/website-development.php" class="service-link">
                        Dedicated Service Page <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- 2. Mobile App -->
            <div class="service-card">
                <div class="service-card-img">
                    <img src="<?php echo $base_url; ?>/assets/images/services/mobile-app.jpg" alt="Mobile Application Development">
                    <div class="service-icon-floating">
                        <i class="fa-solid fa-mobile-screen-button"></i>
                    </div>
                </div>
                <div class="service-card-body">
                    <h3 class="service-title">Mobile Application Development</h3>
                    <p class="service-desc"><?php echo $services_data['mobile-app-development']['short_desc']; ?></p>
                    
                    <ul style="display: flex; flex-direction: column; gap: 8px; margin-bottom: 24px;">
                        <?php foreach (array_slice($services_data['mobile-app-development']['features'], 0, 3) as $feat): ?>
                            <li style="color: var(--clr-text-muted); font-size: 0.875rem; display: flex; align-items: center; gap: 8px;">
                                <i class="fa-solid fa-circle-check" style="color: var(--clr-brand-light); font-size: 0.85rem;"></i> <?php echo $feat; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <a href="<?php echo $base_url; ?>/services/mobile-app-development.php" class="service-link">
                        Dedicated Service Page <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- 3. Custom ERP -->
            <div class="service-card">
                <div class="service-card-img">
                    <img src="<?php echo $base_url; ?>/assets/images/services/erp-software.jpg" alt="Custom ERP Software">
                    <div class="service-icon-floating">
                        <i class="fa-solid fa-cubes"></i>
                    </div>
                </div>
                <div class="service-card-body">
                    <h3 class="service-title">Custom ERP Software</h3>
                    <p class="service-desc"><?php echo $services_data['custom-erp-software']['short_desc']; ?></p>
                    
                    <ul style="display: flex; flex-direction: column; gap: 8px; margin-bottom: 24px;">
                        <?php foreach (array_slice($services_data['custom-erp-software']['features'], 0, 3) as $feat): ?>
                            <li style="color: var(--clr-text-muted); font-size: 0.875rem; display: flex; align-items: center; gap: 8px;">
                                <i class="fa-solid fa-circle-check" style="color: var(--clr-brand-light); font-size: 0.85rem;"></i> <?php echo $feat; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <a href="<?php echo $base_url; ?>/services/custom-erp-software.php" class="service-link">
                        Dedicated Service Page <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- 4. Digital Marketing -->
            <div class="service-card">
                <div class="service-card-img">
                    <img src="<?php echo $base_url; ?>/assets/images/hero-banner.jpg" alt="Digital Marketing">
                    <div class="service-icon-floating">
                        <i class="fa-solid fa-chart-line"></i>
                    </div>
                </div>
                <div class="service-card-body">
                    <h3 class="service-title">Digital Marketing</h3>
                    <p class="service-desc"><?php echo $services_data['digital-marketing']['short_desc']; ?></p>
                    
                    <ul style="display: flex; flex-direction: column; gap: 8px; margin-bottom: 24px;">
                        <?php foreach (array_slice($services_data['digital-marketing']['features'], 0, 3) as $feat): ?>
                            <li style="color: var(--clr-text-muted); font-size: 0.875rem; display: flex; align-items: center; gap: 8px;">
                                <i class="fa-solid fa-circle-check" style="color: var(--clr-brand-light); font-size: 0.85rem;"></i> <?php echo $feat; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <a href="<?php echo $base_url; ?>/services/digital-marketing.php" class="service-link">
                        Dedicated Service Page <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- 5. AI/ML Solutions -->
            <div class="service-card">
                <div class="service-card-img">
                    <img src="<?php echo $base_url; ?>/assets/images/services/ai-ml.jpg" alt="AI ML Solutions">
                    <div class="service-icon-floating">
                        <i class="fa-solid fa-brain"></i>
                    </div>
                </div>
                <div class="service-card-body">
                    <h3 class="service-title">AI/ML Solutions</h3>
                    <p class="service-desc"><?php echo $services_data['ai-ml-solutions']['short_desc']; ?></p>
                    
                    <ul style="display: flex; flex-direction: column; gap: 8px; margin-bottom: 24px;">
                        <?php foreach (array_slice($services_data['ai-ml-solutions']['features'], 0, 3) as $feat): ?>
                            <li style="color: var(--clr-text-muted); font-size: 0.875rem; display: flex; align-items: center; gap: 8px;">
                                <i class="fa-solid fa-circle-check" style="color: var(--clr-brand-light); font-size: 0.85rem;"></i> <?php echo $feat; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <a href="<?php echo $base_url; ?>/services/ai-ml-solutions.php" class="service-link">
                        Dedicated Service Page <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>

            <!-- 6. IT Networking -->
            <div class="service-card">
                <div class="service-card-img">
                    <img src="<?php echo $base_url; ?>/assets/images/services/erp-software.jpg" alt="IT Networking Solutions">
                    <div class="service-icon-floating">
                        <i class="fa-solid fa-network-wired"></i>
                    </div>
                </div>
                <div class="service-card-body">
                    <h3 class="service-title">IT Networking Solutions</h3>
                    <p class="service-desc"><?php echo $services_data['it-networking-solutions']['short_desc']; ?></p>
                    
                    <ul style="display: flex; flex-direction: column; gap: 8px; margin-bottom: 24px;">
                        <?php foreach (array_slice($services_data['it-networking-solutions']['features'], 0, 3) as $feat): ?>
                            <li style="color: var(--clr-text-muted); font-size: 0.875rem; display: flex; align-items: center; gap: 8px;">
                                <i class="fa-solid fa-circle-check" style="color: var(--clr-brand-light); font-size: 0.85rem;"></i> <?php echo $feat; ?>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <a href="<?php echo $base_url; ?>/services/it-networking-solutions.php" class="service-link">
                        Dedicated Service Page <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
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
                        <div class="info-icon" style="width:38px; height:38px; font-size:1rem;"><i class="fa-solid fa-shield-halved"></i></div>
                        <div>
                            <strong style="display: block; color: var(--clr-brand-dark);">Global Security & Compliance</strong>
                            <span style="color: var(--clr-text-muted); font-size: 0.9rem;">ISO 27001, GDPR, and HIPAA compliant data protection standards.</span>
                        </div>
                    </div>
                    <div style="display: flex; align-items: center; gap: 14px;">
                        <div class="info-icon" style="width:38px; height:38px; font-size:1rem;"><i class="fa-solid fa-bolt"></i></div>
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

<!-- Client Testimonials Section -->
<section class="section-padding">
    <div class="container">
        <div style="text-align: center;">
            <div class="section-tag"><i class="fa-solid fa-star"></i> Client Satisfaction</div>
            <h2 class="section-title">Trusted By Global Leaders</h2>
            <p class="section-subtitle">Read what executives around the world say about working with Septix Technologies.</p>
        </div>

        <div class="services-grid" style="margin-top: 40px;">
            <?php foreach ($testimonials_data as $t): ?>
                <div style="background: #ffffff; border: 1px solid var(--clr-border); box-shadow: var(--shadow-card); padding: 32px; border-radius: var(--radius-xl); display: flex; flex-direction: column;">
                    <div style="color: #f59e0b; margin-bottom: 16px; font-size: 1rem;">
                        <?php for ($i=0; $i<$t['rating']; $i++): ?>
                            <i class="fa-solid fa-star"></i>
                        <?php endfor; ?>
                    </div>
                    <p style="color: var(--clr-text-muted); font-size: 0.95rem; line-height: 1.7; font-style: italic; margin-bottom: 24px; flex-grow: 1;">
                        "<?php echo $t['quote']; ?>"
                    </p>
                    <div style="display: flex; align-items: center; gap: 14px; padding-top: 16px; border-top: 1px solid var(--clr-border);">
                        <div style="width: 44px; height: 44px; border-radius: 50%; background: var(--clr-brand-dark); color: #fff; display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 0.9rem;">
                            <?php echo $t['avatar']; ?>
                        </div>
                        <div>
                            <strong style="display: block; color: var(--clr-brand-dark); font-size: 0.95rem;"><?php echo $t['name']; ?></strong>
                            <span style="color: var(--clr-text-dim); font-size: 0.85rem;"><?php echo $t['role']; ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Latest Insights / Blog Preview -->
<section class="section-padding" style="background: rgba(255, 255, 255, 0.5); border-top: 1px solid var(--clr-border);">
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

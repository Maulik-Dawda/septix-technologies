<?php
$page_title = "Septix Technologies - Innovating Digital Solutions Globally";
$page_desc = "Septix Technologies is an international IT engineering firm delivering Website Development, Mobile Apps, Enterprise ERP, Digital Marketing, AI/ML, and IT Networking.";
$current_page = "home";
require_once __DIR__ . '/includes/header.php';
?>

<!-- Dynamic Ambient Floating Orbs -->
<div class="bg-floating-orb orb-1"></div>
<div class="bg-floating-orb orb-2"></div>
<div class="bg-floating-orb orb-3"></div>

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
                    <a href="<?php echo $base_url; ?>/contact" class="btn btn-primary">
                        Start a Project <i class="fa-solid fa-arrow-right"></i>
                    </a>
                    <a href="<?php echo $base_url; ?>/services" class="btn btn-outline">
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
                <div class="stat-number" data-target="250" data-suffix="+">250+</div>
                <div class="stat-label">Projects Completed</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="50" data-suffix="+">50+</div>
                <div class="stat-label">Global Clients</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="99" data-suffix="%">99%</div>
                <div class="stat-label">Client Retention Rate</div>
            </div>
            <div class="stat-item">
                <div class="stat-number" data-target="24" data-suffix="/7">24/7</div>
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
                    </div>
                    <div class="service-card-body">
                        <div class="service-card-icon">
                            <i class="fa-solid <?php echo $service['icon']; ?>"></i>
                        </div>
                        <h3 class="service-title"><?php echo $service['title']; ?></h3>
                        <p class="service-desc"><?php echo $service['short_desc']; ?></p>
                        <a href="<?php echo $base_url; ?>/services/<?php echo $key; ?>" class="service-link">
                            Learn More <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Global Reach Section -->
<section class="section-padding global-section">
    <div class="container">
        <div class="global-grid">
            <div>
                <div class="section-tag"><i class="fa-solid fa-globe"></i> Global Reach</div>
                <h2 class="section-title">Serving Clients <br><span class="text-gradient">Globally</span></h2>
                <p style="color: var(--clr-text-muted); font-size: 1.05rem; margin-bottom: 24px;">
                    Septix Technologies delivers high-performance software engineering, custom enterprise platforms, and digital transformation for organizations and scaling businesses worldwide.
                </p>
                <div style="display: flex; gap: 16px; flex-wrap: wrap;">
                    <a href="<?php echo $base_url; ?>/contact" class="btn btn-primary btn-sm">Connect With Us</a>
                    <a href="<?php echo $base_url; ?>/about" class="btn btn-outline btn-sm">About Our Company</a>
                </div>
            </div>

            <div class="hubs-grid" style="grid-template-columns: 1fr 1fr; gap: 16px;">
                <div class="hub-card" style="padding: 20px;">
                    <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(61, 193, 208, 0.15); color: var(--clr-brand-dark); display: flex; align-items: center; justify-content: center; font-size: 1.2rem; flex-shrink: 0;">
                        <i class="fa-solid fa-clock"></i>
                    </div>
                    <div>
                        <div class="hub-name" style="font-size: 1.05rem;">24/7 Global SLA</div>
                        <div class="hub-city">Round-the-clock technical support</div>
                    </div>
                </div>

                <div class="hub-card" style="padding: 20px;">
                    <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(38, 18, 91, 0.12); color: var(--clr-brand-dark); display: flex; align-items: center; justify-content: center; font-size: 1.2rem; flex-shrink: 0;">
                        <i class="fa-solid fa-shield-halved"></i>
                    </div>
                    <div>
                        <div class="hub-name" style="font-size: 1.05rem;">Enterprise Security</div>
                        <div class="hub-city">OWASP & data privacy standards</div>
                    </div>
                </div>

                <div class="hub-card" style="padding: 20px;">
                    <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(38, 18, 91, 0.12); color: var(--clr-brand-dark); display: flex; align-items: center; justify-content: center; font-size: 1.2rem; flex-shrink: 0;">
                        <i class="fa-solid fa-server"></i>
                    </div>
                    <div>
                        <div class="hub-name" style="font-size: 1.05rem;">Multi-Region Cloud</div>
                        <div class="hub-city">Low-latency scalable infrastructure</div>
                    </div>
                </div>

                <div class="hub-card" style="padding: 20px;">
                    <div style="width: 44px; height: 44px; border-radius: 10px; background: rgba(61, 193, 208, 0.15); color: var(--clr-brand-dark); display: flex; align-items: center; justify-content: center; font-size: 1.2rem; flex-shrink: 0;">
                        <i class="fa-solid fa-users-gear"></i>
                    </div>
                    <div>
                        <div class="hub-name" style="font-size: 1.05rem;">Expert Engineers</div>
                        <div class="hub-city">Dedicated product development</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Interactive Project Development Timeline Section -->
<section class="section-padding timeline-section">
    <div class="container">
        <div style="text-align: center;">
            <div class="section-tag"><i class="fa-solid fa-timeline"></i> How We Build</div>
            <h2 class="section-title">Our Proven Project <br><span class="text-gradient">Development Timeline</span></h2>
            <p class="section-subtitle">From initial architecture discovery to global deployment, explore how Septix Technologies turns complex requirements into enterprise digital products.</p>
        </div>

        <div class="timeline-wrapper">
            <!-- Central Animated Vertical Line -->
            <div class="timeline-line">
                <div class="timeline-line-progress"></div>
            </div>

            <!-- Phase 01 -->
            <div class="timeline-item">
                <div class="timeline-node">
                    <i class="fa-solid fa-compass-drafting"></i>
                </div>
                <div class="timeline-content">
                    <div class="timeline-header">
                        <span class="timeline-phase-badge">Phase 01 &bull; Discovery</span>
                        <span class="timeline-timeframe"><i class="fa-solid fa-clock"></i> Week 1</span>
                    </div>
                    <h3 class="timeline-title">Strategic Discovery & System Blueprint</h3>
                    <p class="timeline-desc">
                        We audit business objectives, map user journeys, define data schemas, and draft technical SRS specifications to guarantee zero ambiguity before writing code.
                    </p>
                    <div class="timeline-deliverables-title">Key Deliverables:</div>
                    <div class="timeline-deliverables">
                        <span class="deliverable-pill"><i class="fa-solid fa-circle-check"></i> Architecture SRS</span>
                        <span class="deliverable-pill"><i class="fa-solid fa-circle-check"></i> User Flow Maps</span>
                        <span class="deliverable-pill"><i class="fa-solid fa-circle-check"></i> DB Schema Specs</span>
                        <span class="deliverable-pill"><i class="fa-solid fa-circle-check"></i> Tech Stack Selection</span>
                    </div>
                </div>
            </div>

            <!-- Phase 02 -->
            <div class="timeline-item">
                <div class="timeline-node">
                    <i class="fa-solid fa-pen-ruler"></i>
                </div>
                <div class="timeline-content">
                    <div class="timeline-header">
                        <span class="timeline-phase-badge">Phase 02 &bull; Design</span>
                        <span class="timeline-timeframe"><i class="fa-solid fa-clock"></i> Weeks 2 - 3</span>
                    </div>
                    <h3 class="timeline-title">Human-Centered UI/UX Design System</h3>
                    <p class="timeline-desc">
                        Our designers create interactive Figma prototypes, accessible UI components, and custom design tokens engineered for high conversion and intuitive user experience.
                    </p>
                    <div class="timeline-deliverables-title">Key Deliverables:</div>
                    <div class="timeline-deliverables">
                        <span class="deliverable-pill"><i class="fa-solid fa-circle-check"></i> Figma Interactive Prototype</span>
                        <span class="deliverable-pill"><i class="fa-solid fa-circle-check"></i> Design System Tokens</span>
                        <span class="deliverable-pill"><i class="fa-solid fa-circle-check"></i> Responsive Layout Systems</span>
                    </div>
                </div>
            </div>

            <!-- Phase 03 -->
            <div class="timeline-item">
                <div class="timeline-node">
                    <i class="fa-solid fa-code-branch"></i>
                </div>
                <div class="timeline-content">
                    <div class="timeline-header">
                        <span class="timeline-phase-badge">Phase 03 &bull; Development</span>
                        <span class="timeline-timeframe"><i class="fa-solid fa-clock"></i> Weeks 4 - 8</span>
                    </div>
                    <h3 class="timeline-title">Agile Software & API Engineering</h3>
                    <p class="timeline-desc">
                        Engineers build clean, modular frontend & backend microservices across 2-week sprints with automated CI/CD unit testing and real-time client demo reviews.
                    </p>
                    <div class="timeline-deliverables-title">Key Deliverables:</div>
                    <div class="timeline-deliverables">
                        <span class="deliverable-pill"><i class="fa-solid fa-circle-check"></i> Modular REST/GraphQL APIs</span>
                        <span class="deliverable-pill"><i class="fa-solid fa-circle-check"></i> Bi-Weekly Sprint Demos</span>
                        <span class="deliverable-pill"><i class="fa-solid fa-circle-check"></i> Git Repository Access</span>
                    </div>
                </div>
            </div>

            <!-- Phase 04 -->
            <div class="timeline-item">
                <div class="timeline-node">
                    <i class="fa-solid fa-shield-cat"></i>
                </div>
                <div class="timeline-content">
                    <div class="timeline-header">
                        <span class="timeline-phase-badge">Phase 04 &bull; QA & Security</span>
                        <span class="timeline-timeframe"><i class="fa-solid fa-clock"></i> Week 9</span>
                    </div>
                    <h3 class="timeline-title">Rigorous QA & OWASP Security Audit</h3>
                    <p class="timeline-desc">
                        We execute automated unit testing, cross-browser compatibility checks, high-load stress testing, and vulnerability penetration testing enforcing OWASP standards.
                    </p>
                    <div class="timeline-deliverables-title">Key Deliverables:</div>
                    <div class="timeline-deliverables">
                        <span class="deliverable-pill"><i class="fa-solid fa-circle-check"></i> Vulnerability Audit Report</span>
                        <span class="deliverable-pill"><i class="fa-solid fa-circle-check"></i> Load Test Benchmarks</span>
                        <span class="deliverable-pill"><i class="fa-solid fa-circle-check"></i> 100% QA Sign-Off</span>
                    </div>
                </div>
            </div>

            <!-- Phase 05 -->
            <div class="timeline-item">
                <div class="timeline-node">
                    <i class="fa-solid fa-rocket"></i>
                </div>
                <div class="timeline-content">
                    <div class="timeline-header">
                        <span class="timeline-phase-badge">Phase 05 &bull; Launch & Scale</span>
                        <span class="timeline-timeframe"><i class="fa-solid fa-clock"></i> Week 10+</span>
                    </div>
                    <h3 class="timeline-title">Zero-Downtime Launch & 24/7 Care</h3>
                    <p class="timeline-desc">
                        We deploy containerized infrastructure across multi-region cloud servers (AWS/GCP), enable automated backups, and provide 24/7 SLA maintenance and monitoring.
                    </p>
                    <div class="timeline-deliverables-title">Key Deliverables:</div>
                    <div class="timeline-deliverables">
                        <span class="deliverable-pill"><i class="fa-solid fa-circle-check"></i> Multi-Region Cloud Deployment</span>
                        <span class="deliverable-pill"><i class="fa-solid fa-circle-check"></i> Real-Time Analytics</span>
                        <span class="deliverable-pill"><i class="fa-solid fa-circle-check"></i> 24/7 SLA Technical Support</span>
                    </div>
                </div>
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
                        <a href="<?php echo $base_url; ?>/blog-single?id=<?php echo $post['id']; ?>" class="service-link">
                            Read Full Article <i class="fa-solid fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- High-Impact Pre-Footer CTA Box -->
        <div class="pre-footer-cta-box">
            <h3 class="cta-heading">
                Ready to Accelerate Your <span class="text-gradient">Digital Transformation?</span>
            </h3>
            <p class="cta-subtitle">
                Partner with Septix Technologies to architect robust web platforms, custom ERPs, mobile applications, and AI engines built for global scale.
            </p>
            <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
                <a href="<?php echo $base_url; ?>/contact" class="btn btn-primary">
                    Schedule Free Technical Consultation <i class="fa-solid fa-calendar-check"></i>
                </a>
                <a href="<?php echo $base_url; ?>/portfolio" class="btn btn-white">
                    View Enterprise Case Studies <i class="fa-solid fa-briefcase"></i>
                </a>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

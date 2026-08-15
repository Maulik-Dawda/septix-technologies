<?php
$page_title = "About Us - Global IT Leadership & Innovation";
$page_desc = "Learn about Septix Technologies, our vision, mission, global presence, and enterprise software engineering values.";
$current_page = "about";
require_once __DIR__ . '/includes/header.php';
?>

<!-- Page Header Hero -->
<section class="hero-section" style="padding: 140px 0 70px;">
    <div class="container text-center" style="text-align: center;">
        <div class="section-tag"><i class="fa-solid fa-building"></i> Corporate Profile</div>
        <h1 class="hero-headline">Empowering Businesses Through <br><span class="text-gradient">World-Class Technology</span></h1>
        <p class="hero-description" style="max-width: 760px; margin-left: auto; margin-right: auto;">
            Septix Technologies is an international IT development firm specializing in custom software solutions, digital transformation, cloud architecture, and intelligent automated systems.
        </p>
    </div>
</section>

<!-- Company Story Section -->
<section class="section-padding">
    <div class="container">
        <div class="global-grid">
            <div>
                <div class="section-tag"><i class="fa-solid fa-rocket"></i> Our Story</div>
                <h2 class="section-title">Built on Innovation, <br><span class="text-gradient">Driven by Results</span></h2>
                <p style="color: var(--clr-text-muted); font-size: 1.05rem; margin-bottom: 20px;">
                    Founded with a passion for technological excellence, Septix Technologies has grown from a specialized web and mobile software studio into a full-service global IT technology provider.
                </p>
                <p style="color: var(--clr-text-muted); font-size: 1rem; margin-bottom: 24px;">
                    We collaborate closely with visionary tech founders, enterprise leaders, and mid-sized enterprises to build mission-critical digital products that operate seamlessly across worldwide markets.
                </p>
                <div style="display: flex; gap: 24px; flex-wrap: wrap;">
                    <div>
                        <h3 style="font-size: 2.25rem; color: var(--clr-primary-light); font-weight: 800;">100%</h3>
                        <span style="color: var(--clr-text-muted); font-size: 0.9rem;">Client Transparency</span>
                    </div>
                    <div>
                        <h3 style="font-size: 2.25rem; color: var(--clr-primary-light); font-weight: 800;">50+</h3>
                        <span style="color: var(--clr-text-muted); font-size: 0.9rem;">Global Markets</span>
                    </div>
                    <div>
                        <h3 style="font-size: 2.25rem; color: var(--clr-primary-light); font-weight: 800;">24/7</h3>
                        <span style="color: var(--clr-text-muted); font-size: 0.9rem;">SLA Support</span>
                    </div>
                </div>
            </div>

            <!-- Vision / Mission Cards -->
            <div style="display: flex; flex-direction: column; gap: 24px;">
                <div style="background: var(--clr-bg-card); border: 1px solid var(--clr-border); border-radius: var(--radius-lg); padding: 32px;">
                    <div style="width: 48px; height: 48px; border-radius: var(--radius-md); background: rgba(6, 182, 212, 0.15); color: var(--clr-primary-light); display: flex; align-items: center; justify-content: center; font-size: 1.25rem; margin-bottom: 16px;">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <h3 style="font-size: 1.35rem; margin-bottom: 10px;">Our Vision</h3>
                    <p style="color: var(--clr-text-muted); font-size: 0.95rem;">
                        To be the premier global IT partner recognized for creating scalable, secure, and intelligent digital infrastructure that shapes the future of global enterprise.
                    </p>
                </div>

                <div style="background: var(--clr-bg-card); border: 1px solid var(--clr-border); border-radius: var(--radius-lg); padding: 32px;">
                    <div style="width: 48px; height: 48px; border-radius: var(--radius-md); background: rgba(99, 102, 241, 0.15); color: var(--clr-secondary-light); display: flex; align-items: center; justify-content: center; font-size: 1.25rem; margin-bottom: 16px;">
                        <i class="fa-solid fa-bullseye"></i>
                    </div>
                    <h3 style="font-size: 1.35rem; margin-bottom: 10px;">Our Mission</h3>
                    <p style="color: var(--clr-text-muted); font-size: 0.95rem;">
                        To architect cutting-edge web applications, enterprise ERP systems, mobile software, and AI solutions that drive operational efficiency and sustainable business growth.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Core Values Section -->
<section class="section-padding" style="background: rgba(13, 18, 36, 0.5);">
    <div class="container">
        <div style="text-align: center;">
            <div class="section-tag"><i class="fa-solid fa-gem"></i> Principles</div>
            <h2 class="section-title">Our Guiding Values</h2>
            <p class="section-subtitle">Every line of code we write and every solution we deliver is guided by our core values.</p>
        </div>

        <div class="services-grid" style="margin-top: 40px;">
            <div class="service-card">
                <div class="service-icon-box"><i class="fa-solid fa-lightbulb"></i></div>
                <h3 class="service-title">Relentless Innovation</h3>
                <p class="service-desc">We continuously adopt emerging technologies, framework improvements, and modern AI algorithms to give our clients a competitive edge.</p>
            </div>

            <div class="service-card">
                <div class="service-icon-box"><i class="fa-solid fa-shield-halved"></i></div>
                <h3 class="service-title">Security & Reliability</h3>
                <p class="service-desc">Security is embedded into every layer of our dev cycle, enforcing strict data compliance, encryption, and zero-trust safeguards.</p>
            </div>

            <div class="service-card">
                <div class="service-icon-box"><i class="fa-solid fa-globe"></i></div>
                <h3 class="service-title">Global Perspective</h3>
                <p class="service-desc">We design multi-region, multi-currency, and localization-ready digital products that perform flawlessly across global markets.</p>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

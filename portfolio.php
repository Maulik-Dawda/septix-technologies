<?php
$page_title = "Case Studies & Global Portfolio - Septix Technologies";
$page_desc = "Explore Septix Technologies featured global projects, custom ERP implementations, AI solutions, and mobile app developments.";
$current_page = "portfolio";
require_once __DIR__ . '/includes/header.php';

$case_studies = [
    [
        'title' => 'Global Logistics ERP & Fleet Intelligence Platform',
        'category' => 'Custom ERP & AI',
        'client' => 'TransGlobal Logistics (USA & EU)',
        'summary' => 'Architected a multi-region cloud ERP managing 15,000+ freight assets with real-time GPS tracking, automated customs invoicing, and route optimization.',
        'impact' => '32% Reduction in Fuel & Transit Costs',
        'tech' => ['PHP Enterprise', 'Python AI', 'PostgreSQL', 'Flutter', 'AWS']
    ],
    [
        'title' => 'FinTech Cross-Border Payment & Mobile Wallet',
        'category' => 'Mobile App Development',
        'client' => 'NexusPay International (UAE)',
        'summary' => 'Built a high-security cross-border remittance app supporting multi-currency conversion, biometric login, and instant settlement APIs.',
        'impact' => 'Over $120M Processed Annually',
        'tech' => ['Flutter', 'Node.js', 'Redis', 'Zero-Trust Security']
    ],
    [
        'title' => 'AI-Powered E-Commerce Recommendation Engine',
        'category' => 'AI/ML & Web Development',
        'client' => 'Aura Retail Group (Singapore)',
        'summary' => 'Integrated personalized recommendation models and high-speed web application infrastructure for a global luxury retail brand.',
        'impact' => '45% Boost in Conversion Rate',
        'tech' => ['React.js', 'Next.js', 'PyTorch', 'FastAPI']
    ],
    [
        'title' => 'Multi-Campus Enterprise Network & Cloud SD-WAN',
        'category' => 'IT Networking Solutions',
        'client' => 'Apex Healthcare Network (Australia)',
        'summary' => 'Designed zero-downtime hybrid cloud infrastructure connecting 12 regional hospitals with HIPAA-compliant encryption.',
        'impact' => '99.999% Network Uptime Guarantee',
        'tech' => ['AWS Cloud', 'Cisco SD-WAN', 'Terraform', 'Grafana']
    ]
];
?>

<!-- Portfolio Hero -->
<section class="hero-section" style="padding: 140px 0 70px;">
    <div class="container" style="text-align: center;">
        <div class="section-tag"><i class="fa-solid fa-briefcase"></i> Case Studies</div>
        <h1 class="hero-headline">Proven Global Success & <br><span class="text-gradient">Engineering Portfolio</span></h1>
        <p class="hero-description" style="max-width: 760px; margin-left: auto; margin-right: auto;">
            Discover how Septix Technologies delivers transformative digital engineering for industry leaders worldwide.
        </p>
    </div>
</section>

<!-- Portfolio Grid -->
<section class="section-padding">
    <div class="container">
        <div class="portfolio-grid">
            <?php foreach ($case_studies as $project): ?>
                <div class="portfolio-card">
                    <div style="background: rgba(38, 18, 91, 0.05); padding: 36px 24px; text-align: center; border-bottom: 1px solid var(--clr-border); position: relative;">
                        <span class="portfolio-tag"><?php echo $project['category']; ?></span>
                        <i class="fa-solid fa-diagram-project" style="font-size: 3.5rem; color: var(--clr-brand-dark); margin-top: 16px;"></i>
                    </div>
                    <div class="portfolio-content">
                        <span style="font-size: 0.85rem; color: var(--clr-text-dim); font-weight: 700; text-transform: uppercase; letter-spacing: 0.05em; display: block; margin-bottom: 6px;">
                            <?php echo $project['client']; ?>
                        </span>
                        <h3 style="font-size: 1.35rem; margin-bottom: 12px; color: var(--clr-brand-dark);"><?php echo $project['title']; ?></h3>
                        <p style="color: var(--clr-text-muted); font-size: 0.95rem; margin-bottom: 20px;"><?php echo $project['summary']; ?></p>
                        
                        <div style="background: rgba(34, 197, 94, 0.1); border: 1px solid rgba(34, 197, 94, 0.25); padding: 10px 14px; border-radius: var(--radius-sm); color: #15803d; font-weight: 700; font-size: 0.9rem; margin-bottom: 20px;">
                            <i class="fa-solid fa-chart-line" style="margin-right: 6px;"></i> Key Result: <?php echo $project['impact']; ?>
                        </div>

                        <div style="display: flex; flex-wrap: wrap; gap: 6px;">
                            <?php foreach ($project['tech'] as $t): ?>
                                <span style="background: rgba(38, 18, 91, 0.06); color: var(--clr-brand-dark); padding: 4px 10px; border-radius: var(--radius-sm); font-size: 0.775rem; font-weight: 600;">
                                    <?php echo $t; ?>
                                </span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>

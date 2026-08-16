<?php
/**
 * Septix Technologies - Global Configuration & Helper Utilities
 */

if (!defined('SITE_NAME')) {
    define('SITE_NAME', 'Septix Technologies');
    define('SITE_TAGLINE', 'Innovating Digital Solutions Globally');
    define('SITE_DOMAIN', 'septixtechnologies.com');
    define('CONTACT_EMAIL', 'info@septixtechnologies.com');
    define('CONTACT_PHONE', '+1 (800) 592-7378');
    define('HQ_ADDRESS', 'Septix Global Tech Park, Innovation Way, Tech Hub');

    // Load local .env environment file if present (ignored by Git)
    $envFile = __DIR__ . '/../.env';
    if (file_exists($envFile)) {
        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $line = trim($line);
            if ($line === '' || strpos($line, '#') === 0) continue;
            if (strpos($line, '=') !== false) {
                list($name, $value) = explode('=', $line, 2);
                $name = trim($name);
                $value = trim($value, " \t\n\r\0\x0B\"'");
                if (!empty($name) && getenv($name) === false) {
                    putenv("{$name}={$value}");
                    $_ENV[$name] = $value;
                    $_SERVER[$name] = $value;
                }
            }
        }
    }

    // Load local config overrides if present (ignored by Git)
    $localConfigFile = __DIR__ . '/config.local.php';
    if (file_exists($localConfigFile)) {
        require_once $localConfigFile;
    }

    // Database Configuration (MySQL / phpMyAdmin)
    if (!defined('DB_HOST')) define('DB_HOST', getenv('DB_HOST') !== false ? getenv('DB_HOST') : '127.0.0.1');
    if (!defined('DB_PORT')) define('DB_PORT', getenv('DB_PORT') !== false ? getenv('DB_PORT') : '3306');
    if (!defined('DB_NAME')) define('DB_NAME', getenv('DB_NAME') !== false ? getenv('DB_NAME') : 'septix_db');
    if (!defined('DB_USER')) define('DB_USER', getenv('DB_USER') !== false ? getenv('DB_USER') : 'root');
    if (!defined('DB_PASS')) define('DB_PASS', getenv('DB_PASS') !== false ? getenv('DB_PASS') : '');

    // SMTP Email Configuration for OTP & Notifications
    if (!defined('SMTP_HOST')) define('SMTP_HOST', getenv('SMTP_HOST') !== false ? getenv('SMTP_HOST') : 'smtp.gmail.com');
    if (!defined('SMTP_PORT')) define('SMTP_PORT', getenv('SMTP_PORT') !== false ? getenv('SMTP_PORT') : 587);
    if (!defined('SMTP_USER')) define('SMTP_USER', getenv('SMTP_USER') !== false ? getenv('SMTP_USER') : 'noreply@septixtechnologies.com');
    if (!defined('SMTP_PASS')) define('SMTP_PASS', getenv('SMTP_PASS') !== false ? getenv('SMTP_PASS') : '');
    if (!defined('SMTP_FROM')) define('SMTP_FROM', getenv('SMTP_FROM') !== false ? getenv('SMTP_FROM') : 'info@septixtechnologies.com');
    if (!defined('SMTP_FROM_NAME')) define('SMTP_FROM_NAME', getenv('SMTP_FROM_NAME') !== false ? getenv('SMTP_FROM_NAME') : 'Septix Technologies Security');
}

/**
 * Base URL helper function
 */
function get_base_url() {
    $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
    $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost:8000';
    return $protocol . '://' . $host;
}

$base_url = get_base_url();

// Services List Data (with verified image paths)
$services_data = [
    'website-development' => [
        'id' => 'website-development',
        'title' => 'Website Development',
        'short_desc' => 'High-performance, scalable web applications, custom enterprise platforms, and progressive web apps engineered for speed, SEO, and global conversion.',
        'icon' => 'fa-laptop-code',
        'image' => 'assets/images/services/web-dev.jpg',
        'banner_gradient' => 'linear-gradient(135deg, #26125b 0%, #3dc1d0 100%)',
        'features' => [
            'Enterprise Web Applications & Single Page Apps (SPA)',
            'Custom Headless E-Commerce & B2B/B2C Portals',
            'Progressive Web Apps (PWA) with Offline Capabilities',
            'API-First Microservices & Jamstack Architecture',
            'Core Web Vitals Accelerated Performance & SEO',
            'OWASP Standard Web Security & Data Encryption'
        ],
        'tech_stack' => ['PHP / Laravel', 'Node.js', 'React.js', 'Vue.js', 'Next.js', 'MySQL / PostgreSQL', 'REST / GraphQL APIs', 'Tailwind / Sass'],
        'workflow' => [
            'Discovery & Wireframing',
            'UI/UX Design & Prototyping',
            'Agile Frontend & Backend Engineering',
            'Quality Assurance & Security Audits',
            'Deployment & Continuous Support'
        ]
    ],
    'mobile-app-development' => [
        'id' => 'mobile-app-development',
        'title' => 'Mobile Application Development',
        'short_desc' => 'Native iOS & Android mobile applications and cross-platform Flutter/React Native solutions built for intuitive user experience and hardware access.',
        'icon' => 'fa-mobile-screen-button',
        'image' => 'assets/images/services/mobile-app.jpg',
        'banner_gradient' => 'linear-gradient(135deg, #1d0c47 0%, #3dc1d0 100%)',
        'features' => [
            'Native iOS (Swift) & Android (Kotlin) App Engineering',
            'Cross-Platform Development (Flutter & React Native)',
            'Intuitive Human Interface (HI) UI/UX Design System',
            'Real-Time Offline Data Sync & Cloud Backends',
            'Biometric Auth, Push Notifications & Payment Gateways',
            'Apple App Store & Google Play Store Publishing'
        ],
        'tech_stack' => ['Flutter', 'React Native', 'Swift', 'Kotlin', 'Firebase', 'AWS Amplify', 'SQLite / Realm', 'GraphQL'],
        'workflow' => [
            'Concept & User Journey Mapping',
            'UX Architecture & Visual Design',
            'Cross-Platform App Development',
            'Automated & Device Lab Testing',
            'App Store Optimization & Launch'
        ]
    ],
    'custom-erp-software' => [
        'id' => 'custom-erp-software',
        'title' => 'Custom ERP Software',
        'short_desc' => 'Tailor-made Enterprise Resource Planning systems to automate complex business workflows, supply chain, financial analytics, and HR operations.',
        'icon' => 'fa-cubes',
        'image' => 'assets/images/services/erp-software.jpg',
        'banner_gradient' => 'linear-gradient(135deg, #26125b 0%, #298d9e 100%)',
        'features' => [
            'End-to-End Enterprise Workflow Automation',
            'Financial Accounting, Invoicing & Tax Compliance',
            'Supply Chain, Multi-Warehouse & Inventory Control',
            'Human Capital Management (HCM) & Automated Payroll',
            'Real-Time Business Intelligence & Executive Analytics',
            'Multi-Branch, Multi-Currency & Role-Based Security'
        ],
        'tech_stack' => ['PHP Enterprise Frameworks', 'Python / Django', 'PostgreSQL / SQL Server', 'Docker / Kubernetes', 'Redis', 'Chart.js / D3.js', 'Microservices'],
        'workflow' => [
            'Business Audit & Requirements Mapping',
            'Data Architecture & Module Specs',
            'Modular Core Engineering',
            'Legacy Data Migration & Integration',
            'Staff Training & 24/7 Support'
        ]
    ],
    'digital-marketing' => [
        'id' => 'digital-marketing',
        'title' => 'Digital Marketing',
        'short_desc' => 'Data-driven growth strategies, search engine optimization (SEO), performance marketing, and conversion rate optimization for global brand reach.',
        'icon' => 'fa-chart-line',
        'image' => 'assets/images/services/web-dev.jpg',
        'banner_gradient' => 'linear-gradient(135deg, #26125b 0%, #3dc1d0 100%)',
        'features' => [
            'International SEO & Technical Audit Optimization',
            'PPC Performance Campaigns (Google, Bing, Social)',
            'Social Media Brand Strategy & Audience Engagement',
            'Content Marketing & Thought Leadership Copywriting',
            'Conversion Rate Optimization (CRO) & Funnel Design',
            'Real-Time ROI Analytics & Attribution Dashboards'
        ],
        'tech_stack' => ['Google Analytics 4', 'SEMrush / Ahrefs', 'Meta Ads Manager', 'Google Tag Manager', 'HubSpot / Mailchimp', 'Looker Studio'],
        'workflow' => [
            'Market Audit & Competitor Intelligence',
            'Multi-Channel Strategy Formulation',
            'Campaign Execution & Creative Assets',
            'A/B Testing & Funnel Tuning',
            'Monthly ROI & Growth Reporting'
        ]
    ],
    'ai-ml-solutions' => [
        'id' => 'ai-ml-solutions',
        'title' => 'AI/ML Solutions',
        'short_desc' => 'Cutting-edge Artificial Intelligence, Machine Learning models, predictive analytics, NLP, and intelligent business automation solutions.',
        'icon' => 'fa-brain',
        'image' => 'assets/images/services/ai-ml.jpg',
        'banner_gradient' => 'linear-gradient(135deg, #1d0c47 0%, #3dc1d0 100%)',
        'features' => [
            'Generative AI & LLM Custom Enterprise Integrations',
            'Predictive Analytics & Financial Forecasting Models',
            'Natural Language Processing (NLP) & Contextual Chatbots',
            'Computer Vision & Automated Image Processing',
            'Business Process Intelligence & Robotic Automation',
            'Model Fine-Tuning, Training & MLOps Pipelines'
        ],
        'tech_stack' => ['Python', 'PyTorch / TensorFlow', 'OpenAI / Gemini APIs', 'Scikit-Learn', 'LangChain', 'FastAPI', 'Pinecone / Vector DBs'],
        'workflow' => [
            'Data Assessment & Feasibility Study',
            'Algorithm Selection & Model Architecture',
            'Data Cleaning & Model Training',
            'API Integration & MLOps Pipeline',
            'Continuous Model Monitoring'
        ]
    ],
    'it-networking-solutions' => [
        'id' => 'it-networking-solutions',
        'title' => 'IT Networking Solutions',
        'short_desc' => 'Secure enterprise networking, cloud migration, cybersecurity audits, VPN infrastructure, and 24/7 managed IT services for global connectivity.',
        'icon' => 'fa-network-wired',
        'image' => 'assets/images/services/erp-software.jpg',
        'banner_gradient' => 'linear-gradient(135deg, #26125b 0%, #3dc1d0 100%)',
        'features' => [
            'Enterprise Infrastructure & WAN/LAN Network Architecture',
            'Multi-Cloud Migration & Hybrid Cloud (AWS/GCP/Azure)',
            'Cybersecurity Audits & Vulnerability Penetration Testing',
            'Managed SD-WAN & Secure Remote Access VPNs',
            'Disaster Recovery & Automated Backup Protocols',
            '24/7 Managed IT Support & SLA Guarantee'
        ],
        'tech_stack' => ['AWS', 'Google Cloud', 'Cisco / Fortinet', 'Kubernetes / Docker', 'Terraform', 'Wireshark', 'Grafana / Prometheus'],
        'workflow' => [
            'Infrastructure Audit & Threat Assessment',
            'Network & Cloud Topology Architecture',
            'Zero-Downtime Implementation',
            'Security Hardening & Penetration Test',
            '24/7 Proactive Monitoring & Support'
        ]
    ]
];

// Testimonials Data
$testimonials = [
    [
        'name' => 'Jonathan Sterling',
        'role' => 'CTO, Global Logistics Corp (USA)',
        'quote' => 'Septix Technologies delivered a custom ERP that revolutionized our supply chain tracking across 14 countries. Their engineering quality and 24/7 responsiveness are exceptional.',
        'rating' => 5,
        'avatar' => 'JS'
    ],
    [
        'name' => 'Sophia Martinez',
        'role' => 'VP of Digital, Nexus Financial (UK)',
        'quote' => 'Our cross-platform mobile wallet built by Septix handles millions of dollars in daily transactions with zero downtime. They are our trusted long-term IT engineering partner.',
        'rating' => 5,
        'avatar' => 'SM'
    ],
    [
        'name' => 'Tariq Al-Mansoor',
        'role' => 'Managing Director, Horizon Retail (UAE)',
        'quote' => 'The AI recommendation engine and web portal designed by Septix boosted our customer conversion rate by 45% within three months of deployment.',
        'rating' => 5,
        'avatar' => 'TA'
    ]
];

// Blog Posts Data (with verified image paths)
$blog_posts = [
    [
        'id' => 1,
        'slug' => 'ai-trends-shaping-enterprise-software-2026',
        'title' => 'Top AI & Machine Learning Trends Reshaping Enterprise Software in 2026',
        'category' => 'AI & Innovation',
        'date' => 'August 12, 2026',
        'author' => 'Alex Turner, Chief AI Officer',
        'read_time' => '6 min read',
        'image' => 'assets/images/services/ai-ml.jpg',
        'summary' => 'Explore how generative AI models, vector search, and autonomous agent workflows are driving unprecedented efficiency across enterprise systems globally.',
        'content' => 'Artificial Intelligence has transcended simple predictive models into autonomous agentic workflows. Modern enterprise software now incorporates contextual AI assistants capable of parsing complex unstructured business data, automating supply chain logistics, and delivering real-time decision intelligence.'
    ],
    [
        'id' => 2,
        'slug' => 'building-scalable-cloud-native-erp',
        'title' => 'Architecting Cloud-Native ERP Systems for Global Enterprise Operations',
        'category' => 'Enterprise Solutions',
        'date' => 'July 28, 2026',
        'author' => 'Elena Rostova, Principal Software Architect',
        'read_time' => '8 min read',
        'image' => 'assets/images/services/erp-software.jpg',
        'summary' => 'A comprehensive guide on transitioning legacy monolith ERP systems to microservices, containerized databases, and multi-region cloud networks.',
        'content' => 'Global enterprises demand 99.99% uptime and low-latency database transactions across multiple continents. Switching from rigid legacy ERP software to modular cloud-native architectures ensures seamless scalability, automated multi-currency compliance, and real-time inventory synchronization.'
    ],
    [
        'id' => 3,
        'slug' => 'cross-platform-mobile-dev-flutter-vs-react-native',
        'title' => 'Flutter vs React Native: Choosing the Right Mobile Stack for Modern Brands',
        'category' => 'Mobile Development',
        'date' => 'July 15, 2026',
        'author' => 'David Chen, Head of Mobile Engineering',
        'read_time' => '5 min read',
        'image' => 'assets/images/services/mobile-app.jpg',
        'summary' => 'Compare performance benchmarks, UI fidelity, ecosystem maturity, and developer velocity for Flutter and React Native in 2026.',
        'content' => 'Building cross-platform mobile apps enables businesses to target both iOS and Android simultaneously while reducing engineering overhead. In this article, we analyze hardware access speed, rendering engine performance, and state management strategies.'
    ],
    [
        'id' => 4,
        'slug' => 'cybersecurity-best-practices-remote-global-workforce',
        'title' => 'Zero-Trust Cybersecurity Architecture for Distributed Global Workforces',
        'category' => 'IT & Networking',
        'date' => 'June 30, 2026',
        'author' => 'Marcus Vance, Cybersecurity Director',
        'read_time' => '7 min read',
        'image' => 'assets/images/blog/cybersecurity.jpg',
        'summary' => 'Essential network hardening, MFA enforcement, and SD-WAN strategies to safeguard corporate data across global hybrid environments.',
        'content' => 'With teams working across multiple continents, traditional perimeter security is no longer adequate. Zero-Trust access model guarantees that every device, user token, and network packet is continuously authenticated before accessing sensitive corporate servers.'
    ]
];

// Helper Function: Check Active Nav Item
function is_active($page_name, $current_page) {
    return ($page_name === $current_page) ? 'active' : '';
}

// Helper Function: Get Base URL
if (!function_exists('get_base_url')) {
    function get_base_url() {
        $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
        $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'localhost:8000';
        return $protocol . '://' . $host;
    }
}
?>

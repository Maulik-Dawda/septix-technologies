<?php
/**
 * Septix Technologies - Global Configuration & Helper Utilities
 */

// Site Info
define('SITE_NAME', 'Septix Technologies');
define('SITE_TAGLINE', 'Innovating Digital Solutions Globally');
define('SITE_URL', 'http://localhost:8000');
define('CONTACT_EMAIL', 'info@septixtechnologies.com');
define('CONTACT_PHONE', '+1 (800) 592-7378');
define('HQ_ADDRESS', 'Septix Global Tech Park, Innovation Way, Tech Hub');

// Services List Data
$services_data = [
    'website-development' => [
        'id' => 'website-development',
        'title' => 'Website Development',
        'short_desc' => 'High-performance, scalable web applications, custom enterprise platforms, and progressive web apps engineered for speed and conversion.',
        'icon' => 'fa-laptop-code',
        'banner_gradient' => 'linear-gradient(135deg, #0ea5e9 0%, #1e1b4b 100%)',
        'features' => [
            'Enterprise Web Applications & Single Page Apps (SPA)',
            'Custom CMS & Headless E-Commerce Solutions',
            'Progressive Web Apps (PWA) with Offline Capabilities',
            'API-First Microservices Architecture',
            'SEO-Optimized & Speed-Accelerated Performance',
            'Robust Web Application Security (OWASP Standard)'
        ],
        'tech_stack' => ['PHP / Laravel', 'Node.js', 'React.js', 'Vue.js', 'Next.js', 'MySQL / PostgreSQL', 'REST / GraphQL APIs'],
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
        'short_desc' => 'Native iOS & Android mobile applications and cross-platform Flutter/React Native solutions built for seamless user experience.',
        'icon' => 'fa-mobile-screen-button',
        'banner_gradient' => 'linear-gradient(135deg, #06b6d4 0%, #3b82f6 100%)',
        'features' => [
            'Native iOS (Swift) & Android (Kotlin) Development',
            'Cross-Platform Mobile Apps (Flutter & React Native)',
            'Intuitive Human Interface UI/UX Design',
            'Real-Time Offline Data Synchronization',
            'Push Notifications & In-App Payment Gateways',
            'App Store (iOS) & Google Play Publishing Support'
        ],
        'tech_stack' => ['Flutter', 'React Native', 'Swift', 'Kotlin', 'Firebase', 'AWS Amplify', 'SQLite / Realm'],
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
        'short_desc' => 'Tailor-made Enterprise Resource Planning systems to automate business workflows, supply chain, financial analytics, and HR operations.',
        'icon' => 'fa-cubes',
        'banner_gradient' => 'linear-gradient(135deg, #38bdf8 0%, #1e293b 100%)',
        'features' => [
            'End-to-End Enterprise Workflow Automation',
            'Financial Accounting & Invoicing Systems',
            'Supply Chain, Warehouse & Inventory Control',
            'Human Capital Management (HCM) & Payroll',
            'Custom BI Dashboards & Executive Analytics',
            'Role-Based Access Control & Multi-Branch Support'
        ],
        'tech_stack' => ['PHP Enterprise Frameworks', 'Python / Django', 'PostgreSQL / SQL Server', 'Docker / Kubernetes', 'Redis', 'Chart.js / D3.js'],
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
        'banner_gradient' => 'linear-gradient(135deg, #0284c7 0%, #6366f1 100%)',
        'features' => [
            'Technical & On-Page SEO Optimization',
            'PPC Campaign Management (Google, Bing, Social)',
            'Social Media Brand Strategy & Management',
            'Content Marketing & Thought Leadership Copywriting',
            'Conversion Rate Optimization (CRO) & Funnel Design',
            'Real-Time ROI Analytics & Performance Reporting'
        ],
        'tech_stack' => ['Google Analytics 4', 'SEMrush / Ahrefs', 'Meta Ads Manager', 'Google Tag Manager', 'HubSpot / Mailchimp'],
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
        'banner_gradient' => 'linear-gradient(135deg, #06b6d4 0%, #4f46e5 100%)',
        'features' => [
            'Generative AI & LLM Custom Integrations',
            'Predictive Analytics & Forecasting Models',
            'Natural Language Processing (NLP) & AI Chatbots',
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
        'banner_gradient' => 'linear-gradient(135deg, #0284c7 0%, #0f172a 100%)',
        'features' => [
            'Enterprise Infrastructure & WAN/LAN Design',
            'Cloud Migration (AWS, Google Cloud, Azure)',
            'Cybersecurity Audits & Vulnerability Testing',
            'Managed SD-WAN & Secure Remote Access VPNs',
            'Disaster Recovery & Automated Backup Systems',
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

// Blog Posts Data
$blog_posts = [
    [
        'id' => 1,
        'slug' => 'ai-trends-shaping-enterprise-software-2026',
        'title' => 'Top AI & Machine Learning Trends Reshaping Enterprise Software in 2026',
        'category' => 'AI & Innovation',
        'date' => 'August 12, 2026',
        'author' => 'Alex Turner, Chief AI Officer',
        'read_time' => '6 min read',
        'image' => 'assets/images/blog/ai-trends.jpg',
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
        'image' => 'assets/images/blog/erp-architecture.jpg',
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
        'image' => 'assets/images/blog/mobile-dev.jpg',
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
function get_base_url() {
    // Detect subfolder or root path
    $script_dir = dirname($_SERVER['SCRIPT_NAME'] ?? '');
    $script_dir = str_replace('\\', '/', $script_dir);
    if ($script_dir === '/' || $script_dir === '.') {
        return '';
    }
    return rtrim($script_dir, '/');
}
?>

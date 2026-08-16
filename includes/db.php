<?php
/**
 * Septix Technologies - Database Handler (MySQL / phpMyAdmin + Automatic Table Initialization)
 */

require_once __DIR__ . '/config.php';

function get_db_connection() {
    static $pdo = null;

    if ($pdo !== null) {
        return $pdo;
    }

    $dbHost = defined('DB_HOST') ? DB_HOST : '127.0.0.1';
    $dbPort = defined('DB_PORT') ? DB_PORT : '3306';
    $dbName = defined('DB_NAME') ? DB_NAME : 'septix_db';
    $dbUser = defined('DB_USER') ? DB_USER : 'root';
    $dbPass = defined('DB_PASS') ? DB_PASS : '';

    try {
        // First try connecting directly to the target MySQL database (Hostinger & cPanel compatible)
        $dsn = "mysql:host={$dbHost};port={$dbPort};dbname={$dbName};charset=utf8mb4";
        $pdo = new PDO($dsn, $dbUser, $dbPass, [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]);
        $isSqlite = false;
    } catch (Exception $e) {
        try {
            // Fallback for local dev server: create database if missing
            $dsnNoDb = "mysql:host={$dbHost};port={$dbPort};charset=utf8mb4";
            $tmpPdo = new PDO($dsnNoDb, $dbUser, $dbPass, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
            @$tmpPdo->exec("CREATE DATABASE IF NOT EXISTS `{$dbName}` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;");
            $tmpPdo->exec("USE `{$dbName}`;");
            $pdo = $tmpPdo;
            $isSqlite = false;
        } catch (Exception $ex) {
            // Fallback to zero-config SQLite if local MySQL server is not running
            $sqliteDir = __DIR__ . '/../database';
            if (!is_dir($sqliteDir)) {
                @mkdir($sqliteDir, 0777, true);
            }
            $sqliteFile = $sqliteDir . '/septix_db.sqlite';
            $pdo = new PDO("sqlite:" . $sqliteFile, null, null, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
            $isSqlite = true;
        }
    }

    // Initialize tables if they don't exist
    init_db_schema($pdo, $isSqlite);

    return $pdo;
}

function init_db_schema($pdo, $isSqlite = false) {
    $autoInc = $isSqlite ? "INTEGER PRIMARY KEY AUTOINCREMENT" : "INT AUTO_INCREMENT PRIMARY KEY";
    $textType = $isSqlite ? "TEXT" : "LONGTEXT";

    // 1. Admin Users Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS admin_users (
        id {$autoInc},
        username VARCHAR(80) NOT NULL UNIQUE,
        email VARCHAR(150) NOT NULL UNIQUE,
        password_hash VARCHAR(255) NOT NULL,
        role VARCHAR(30) DEFAULT 'admin',
        mfa_secret VARCHAR(100) DEFAULT NULL,
        mfa_enabled TINYINT(1) DEFAULT 0,
        status VARCHAR(20) DEFAULT 'active',
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        last_login DATETIME DEFAULT NULL
    );");

    // 2. Blogs Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS blogs (
        id {$autoInc},
        slug VARCHAR(200) NOT NULL UNIQUE,
        title VARCHAR(255) NOT NULL,
        category VARCHAR(100) NOT NULL,
        author VARCHAR(100) DEFAULT 'Septix Editorial Team',
        image VARCHAR(255) NOT NULL,
        summary TEXT NOT NULL,
        content {$textType} NOT NULL,
        read_time VARCHAR(50) DEFAULT '5 min read',
        views INT DEFAULT 0,
        status VARCHAR(20) DEFAULT 'published',
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );");

    // 3. OTP Tokens Table
    $pdo->exec("CREATE TABLE IF NOT EXISTS otp_tokens (
        id {$autoInc},
        user_id INT NOT NULL,
        otp_code VARCHAR(10) NOT NULL,
        type VARCHAR(30) NOT NULL,
        expires_at DATETIME NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    );");

    // 4. Login Attempts (Rate Limiting & Lockout)
    $pdo->exec("CREATE TABLE IF NOT EXISTS login_attempts (
        id {$autoInc},
        ip_address VARCHAR(45) NOT NULL,
        username VARCHAR(100) DEFAULT NULL,
        attempted_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        success TINYINT(1) DEFAULT 0
    );");

    // Seed default Superadmin if no users exist
    $checkUser = $pdo->query("SELECT COUNT(*) FROM admin_users")->fetchColumn();
    if ($checkUser == 0) {
        $defaultPassword = password_hash('SeptixAdmin@2026', PASSWORD_BCRYPT);
        $stmt = $pdo->prepare("INSERT INTO admin_users (username, email, password_hash, role, status) VALUES (?, ?, ?, 'superadmin', 'active')");
        $stmt->execute(['admin', 'admin@septixtechnologies.com', $defaultPassword]);
    }

    // Seed default blogs if no blogs exist
    $checkBlogs = $pdo->query("SELECT COUNT(*) FROM blogs")->fetchColumn();
    if ($checkBlogs == 0) {
        seed_default_blogs($pdo);
    }
}

function seed_default_blogs($pdo) {
    $blogs = [
        [
            'slug' => 'architecting-cloud-native-erp-systems',
            'title' => 'Architecting Cloud-Native ERP Systems for Global Operations',
            'category' => 'ERP Software',
            'author' => 'Alexander Vance',
            'image' => 'assets/images/service-erp.jpg',
            'summary' => 'Discover how modular cloud-native ERP architectures streamline multi-entity financial reporting, inventory tracking, and global supply chain automation.',
            'content' => '<p>Modern global enterprises demand 99.99% uptime and low-latency database transactions across multiple continents. Switching from rigid legacy ERP software to modular cloud-native architectures ensures seamless scalability, automated multi-currency compliance, and real-time inventory synchronization.</p><h3>Key Benefits of Cloud-Native ERP</h3><ul><li><strong>Microservice Architecture:</strong> Decouple inventory, payroll, and finance into independently deployable microservices.</li><li><strong>Automated Data Pipelines:</strong> Real-time streaming ETL processes for executive dashboards.</li><li><strong>Multi-Region Resilience:</strong> High availability database clusters across AWS and Google Cloud.</li></ul><p>By leveraging containerized microservices and automated API integration layers, enterprise organizations can eliminate data silos and accelerate business decision-making.</p>',
            'read_time' => '6 min read'
        ],
        [
            'slug' => 'ai-agent-workflows-in-enterprise-software',
            'title' => 'Building Autonomous AI Agent Workflows in Enterprise Systems',
            'category' => 'AI / ML',
            'author' => 'Dr. Elena Rostova',
            'image' => 'assets/images/service-ai.jpg',
            'summary' => 'Explore how generative AI models, vector search, and autonomous agent workflows are driving unprecedented efficiency across enterprise operations.',
            'content' => '<p>Generative AI is evolving from simple chatbot interactions into autonomous agentic workflows capable of executing complex business processes. From automated code audits to predictive supply chain routing, AI agents are transforming enterprise productivity.</p><h3>Implementing Agentic Workflows</h3><p>Enterprise AI systems combine Large Language Models (LLMs) with RAG (Retrieval-Augmented Generation) and vector databases to process company knowledge securely without data leaks.</p>',
            'read_time' => '5 min read'
        ],
        [
            'slug' => 'cybersecurity-best-practices-remote-global-workforce',
            'title' => 'Zero-Trust Cybersecurity Architecture for Remote Workforces',
            'category' => 'Cybersecurity',
            'author' => 'Marcus Thorne',
            'image' => 'assets/images/blog/cybersecurity.jpg',
            'summary' => 'Essential network hardening, MFA enforcement, and SD-WAN strategies to safeguard corporate data across hybrid remote work environments.',
            'content' => '<p>As distributed workforces expand globally, traditional perimeter security models are no longer sufficient. Adopting Zero-Trust Network Architecture (ZTNA) ensures every user, device, and network connection is strictly authenticated and encrypted continuously.</p>',
            'read_time' => '7 min read'
        ],
        [
            'slug' => 'high-performance-mobile-apps-flutter-swift',
            'title' => 'Engineering High-Performance Mobile Apps with Flutter & Swift',
            'category' => 'Mobile Apps',
            'author' => 'David Chen',
            'image' => 'assets/images/service-mobile.jpg',
            'summary' => 'How to optimize native rendering pipelines, offline database sync, and cross-platform Flutter codebases for maximum mobile user engagement.',
            'content' => '<p>Mobile user expectations demand sub-second load times and fluid 60fps animations. By leveraging native C++ bridges, SQLite local caching, and optimized state management, developers can achieve desktop-grade performance on mobile devices.</p>',
            'read_time' => '4 min read'
        ],
        [
            'slug' => 'modern-web-performance-seo-best-practices',
            'title' => 'Optimizing Web Performance & Core Web Vitals for Max Conversion',
            'category' => 'Web Development',
            'author' => 'Sarah Jenkins',
            'image' => 'assets/images/service-web.jpg',
            'summary' => 'Practical techniques for optimizing Largest Contentful Paint (LCP), Interaction to Next Paint (INP), and SEO rankings on high-traffic platforms.',
            'content' => '<p>Fast page speeds directly translate to higher conversion rates and superior search engine positioning. Implementing progressive image loading, server-side caching, and critical CSS inline styles drives dramatic performance improvements.</p>',
            'read_time' => '5 min read'
        ],
        [
            'slug' => 'data-driven-digital-marketing-strategies',
            'title' => 'Data-Driven Digital Marketing Strategies for B2B Growth',
            'category' => 'Digital Marketing',
            'author' => 'Rachel Adams',
            'image' => 'assets/images/service-marketing.jpg',
            'summary' => 'Leveraging programmatic advertising, multi-channel attribution models, and conversion rate optimization to scale B2B customer acquisition.',
            'content' => '<p>Effective B2B marketing relies on precise customer segmentation and data analytics. Combining content strategy with automated email funnels drives predictable sales pipeline growth.</p>',
            'read_time' => '6 min read'
        ]
    ];

    $stmt = $pdo->prepare("INSERT INTO blogs (slug, title, category, author, image, summary, content, read_time, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'published')");
    foreach ($blogs as $b) {
        $stmt->execute([
            $b['slug'],
            $b['title'],
            $b['category'],
            $b['author'],
            $b['image'],
            $b['summary'],
            $b['content'],
            $b['read_time']
        ]);
    }
}

/**
 * Generate a clean URL slug from title
 */
function create_slug($text) {
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    $text = preg_replace('~[^-\w]+~', '', $text);
    $text = trim($text, '-');
    $text = preg_replace('~-+~', '-', $text);
    $text = strtolower($text);
    return empty($text) ? 'blog-' . time() : $text;
}
?>

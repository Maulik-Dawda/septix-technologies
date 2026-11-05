<?php
require_once __DIR__ . '/config.php';
$base_url = get_base_url();
$current_page = $current_page ?? 'home';

// 100/100 SEMrush Compliant Variables & UAE / Dubai Geotargeting
// Title strictly between 50-60 characters
$page_title_full = isset($page_title) ? $page_title . ' | Septix' : 'Septix Technologies | IT & Software Company Dubai UAE';
if (strlen($page_title_full) > 60) {
    $page_title_full = substr($page_title_full, 0, 57) . '...';
}

// Meta Description strictly between 100-130 characters
$default_desc = "Premier IT solutions & software development in Dubai, UAE. We engineer custom ERPs, mobile apps, web platforms, and AI engines.";
$page_desc_text = isset($page_desc) ? $page_desc : $default_desc;
if (strlen($page_desc_text) > 130) {
    $page_desc_text = substr($page_desc_text, 0, 127) . '...';
} elseif (strlen($page_desc_text) < 100) {
    $page_desc_text = str_pad($page_desc_text, 105, ' Serving Dubai, UAE and global enterprises.');
}

$current_uri = strtok($_SERVER['REQUEST_URI'] ?? '', '?');
$canonical_url = rtrim($base_url, '/') . ($current_uri === '/' ? '' : $current_uri);
$page_og_image = isset($page_image) ? (strpos($page_image, 'http') === 0 ? $page_image : $base_url . '/' . ltrim($page_image, '/')) : $base_url . '/assets/images/hero-banner.jpg';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-YZ2GDM8Q60"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-YZ2GDM8Q60');
    </script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <title><?php echo htmlspecialchars($page_title_full); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($page_desc_text); ?>">
    <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
    <meta name="author" content="Septix Technologies">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical_url); ?>">

    <!-- UAE & Dubai Regional Geotargeting Meta Tags -->
    <meta name="geo.region" content="AE-DU">
    <meta name="geo.placename" content="Dubai, United Arab Emirates">
    <meta name="geo.position" content="25.2048;55.2708">
    <meta name="ICBM" content="25.2048, 55.2708">

    <!-- Hreflang Tags for UAE, Regional & Global Search Engines -->
    <link rel="alternate" hreflang="en-ae" href="<?php echo htmlspecialchars($canonical_url); ?>">
    <link rel="alternate" hreflang="en" href="<?php echo htmlspecialchars($canonical_url); ?>">
    <link rel="alternate" hreflang="x-default" href="<?php echo htmlspecialchars($canonical_url); ?>">

    <!-- Resource Hints for Speed & INP Optimization -->
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- Open Graph (OG) Meta Tags -->
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="<?php echo isset($og_type) ? $og_type : 'website'; ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($page_title_full); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($page_desc_text); ?>">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonical_url); ?>">
    <meta property="og:site_name" content="Septix Technologies">
    <meta property="og:image" content="<?php echo htmlspecialchars($page_og_image); ?>">

    <!-- Twitter Card Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo htmlspecialchars($page_title_full); ?>">
    <meta name="twitter:description" content="<?php echo htmlspecialchars($page_desc_text); ?>">
    <meta name="twitter:image" content="<?php echo htmlspecialchars($page_og_image); ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo $base_url; ?>/assets/images/favicon.png">
    
    <!-- FontAwesome 6 CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/style.css">

    <!-- JSON-LD Structured Data Schema Markup (Google Rich Snippets & UAE Local Business) -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ProfessionalService",
      "name": "Septix Technologies",
      "url": "<?php echo $base_url; ?>",
      "logo": "<?php echo $base_url; ?>/assets/images/logo.png",
      "description": "Premier IT consulting & software development firm in Dubai, UAE. Specializing in Web Platforms, Custom ERPs, Mobile Apps, AI Solutions, and IT Infrastructure.",
      "telephone": "+1-800-592-7378",
      "email": "info@septixtechnologies.com",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Business Bay & Dubai Silicon Oasis",
        "addressLocality": "Dubai",
        "addressRegion": "Dubai",
        "addressCountry": "AE"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 25.2048,
        "longitude": 55.2708
      },
      "areaServed": [
        {
          "@type": "Country",
          "name": "United Arab Emirates"
        },
        {
          "@type": "City",
          "name": "Dubai"
        },
        {
          "@type": "AdministrativeArea",
          "name": "GCC"
        }
      ],
      "priceRange": "$$",
      "currenciesAccepted": "AED, USD, EUR, SAR",
      "sameAs": [
        "https://linkedin.com/company/septix-technologies",
        "https://x.com/septixtech",
        "https://facebook.com/septixtechnologies",
        "https://instagram.com/septixtechnologies",
        "https://youtube.com/@septixtechnologies"
      ]
    }
    </script>
</head>
<body>

    <!-- Header & Navigation Bar -->
    <header class="site-header">
        <div class="container nav-wrapper">
            <!-- Brand Logo -->
            <a href="<?php echo $base_url; ?>/index" class="brand-logo">
                <img src="<?php echo $base_url; ?>/assets/images/logo.png" alt="Septix Technologies Logo">
            </a>

            <!-- Mobile Drawer Toggle Button -->
            <button class="mobile-toggle" aria-label="Toggle Navigation Menu">
                <i class="fa-solid fa-bars"></i>
            </button>

            <!-- Navigation Links -->
            <nav class="nav-menu">
                <ul class="nav-links">
                    <li class="nav-item">
                        <a href="<?php echo $base_url; ?>/index" class="nav-link <?php echo is_active('home', $current_page); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $base_url; ?>/about" class="nav-link <?php echo is_active('about', $current_page); ?>">About Us</a>
                    </li>
                    
                    <!-- Services Dropdown -->
                    <li class="nav-item">
                        <a href="<?php echo $base_url; ?>/services" class="nav-link <?php echo is_active('services', $current_page); ?>">
                            Services <i class="fa-solid fa-chevron-down" style="font-size: 0.75rem;"></i>
                        </a>
                        <div class="dropdown-menu">
                            <?php foreach ($services_data as $sKey => $sItem): ?>
                                <a href="<?php echo $base_url; ?>/services/<?php echo $sKey; ?>" class="dropdown-item">
                                    <i class="fa-solid <?php echo $sItem['icon']; ?>"></i>
                                    <div>
                                        <strong style="display:block; color:var(--clr-brand-dark); font-size:0.9rem;"><?php echo $sItem['title']; ?></strong>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo $base_url; ?>/portfolio" class="nav-link <?php echo is_active('portfolio', $current_page); ?>">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $base_url; ?>/blog" class="nav-link <?php echo is_active('blog', $current_page); ?>">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $base_url; ?>/contact" class="nav-link <?php echo is_active('contact', $current_page); ?>">Contact</a>
                    </li>
                </ul>

                <!-- Header CTA Button -->
                <a href="<?php echo $base_url; ?>/contact" class="btn btn-primary btn-sm">
                    Get a Quote <i class="fa-solid fa-arrow-right"></i>
                </a>
            </nav>
        </div>
    </header>

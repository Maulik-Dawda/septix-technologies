<?php
require_once __DIR__ . '/config.php';
$base_url = get_base_url();
$current_page = $current_page ?? 'home';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo isset($page_title) ? $page_title . ' | ' . SITE_NAME : SITE_NAME . ' - ' . SITE_TAGLINE; ?></title>
    <meta name="description" content="<?php echo isset($page_desc) ? $page_desc : 'Septix Technologies is a global IT solutions provider specializing in Website Development, Mobile Apps, Custom ERP, Digital Marketing, AI/ML Solutions, and IT Networking.'; ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?php echo $base_url; ?>/assets/images/favicon.png">
    
    <!-- FontAwesome 6 CDN (Direct Link for 100% Icon Reliability) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="<?php echo $base_url; ?>/assets/css/style.css">
</head>
<body>

    <!-- Header & Navigation Bar -->
    <header class="site-header">
        <div class="container nav-wrapper">
            <!-- Brand Logo -->
            <a href="<?php echo $base_url; ?>/index.php" class="brand-logo">
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
                        <a href="<?php echo $base_url; ?>/index.php" class="nav-link <?php echo is_active('home', $current_page); ?>">Home</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $base_url; ?>/about.php" class="nav-link <?php echo is_active('about', $current_page); ?>">About Us</a>
                    </li>
                    
                    <!-- Services Dropdown -->
                    <li class="nav-item">
                        <a href="<?php echo $base_url; ?>/services.php" class="nav-link <?php echo is_active('services', $current_page); ?>">
                            Services <i class="fa-solid fa-chevron-down" style="font-size: 0.75rem;"></i>
                        </a>
                        <div class="dropdown-menu">
                            <?php foreach ($services_data as $key => $service): ?>
                                <a href="<?php echo $base_url; ?>/services/<?php echo $key; ?>.php" class="dropdown-item">
                                    <i class="fa-solid <?php echo $service['icon']; ?>"></i>
                                    <div>
                                        <strong style="display:block; color:var(--clr-brand-dark); font-size:0.9rem;"><?php echo $service['title']; ?></strong>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo $base_url; ?>/portfolio.php" class="nav-link <?php echo is_active('portfolio', $current_page); ?>">Portfolio</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $base_url; ?>/blog.php" class="nav-link <?php echo is_active('blog', $current_page); ?>">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo $base_url; ?>/contact.php" class="nav-link <?php echo is_active('contact', $current_page); ?>">Contact</a>
                    </li>
                </ul>

                <!-- Header CTA Button -->
                <a href="<?php echo $base_url; ?>/contact.php" class="btn btn-primary btn-sm">
                    Get a Quote <i class="fa-solid fa-arrow-right"></i>
                </a>
            </nav>
        </div>
    </header>

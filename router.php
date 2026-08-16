<?php
/**
 * Septix Technologies - Built-in PHP Server Router for Clean URLs
 */
$uri = urldecode(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$filePath = __DIR__ . $uri;

// Serve static assets directly (CSS, JS, images)
if ($uri !== '/' && file_exists($filePath) && !is_dir($filePath)) {
    return false;
}

// Serve homepage
if ($uri === '/' || $uri === '' || $uri === '/index' || $uri === '/index.php') {
    require __DIR__ . '/index.php';
    exit;
}

// Check for direct .php file mapping
if (file_exists($filePath . '.php')) {
    require $filePath . '.php';
    exit;
}

// Default fallback
return false;
?>

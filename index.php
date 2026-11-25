<?php
declare(strict_types=1);

// Satu titik masuk untuk semua halaman aplikasi.
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

require_once __DIR__ . '/helpers/functions.php';
$routes = require __DIR__ . '/config/routes.php';
$page = $_GET['page'] ?? 'dashboard';

// URL tidak boleh langsung diubah menjadi path file.
if (!is_string($page) || !array_key_exists($page, $routes)) {
    http_response_code(404);
    $page = '404';
    $route = ['title' => 'Halaman Tidak Ditemukan', 'file' => __DIR__ . '/views/404.php'];
} else {
    $route = $routes[$page];
}

// Tindakan penyimpanan dilakukan SEBELUM HTML dicetak agar redirect dapat bekerja.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (in_array($page, ['user/add', 'user/edit', 'user/delete'], true)) {
        require_once __DIR__ . '/modules/user/process.php';
        processUserAction($page);
        exit;
    }
    http_response_code(405);
    header('Allow: GET');
    $route = ['title' => 'Metode Tidak Diizinkan', 'file' => __DIR__ . '/views/405.php'];
} elseif ($_SERVER['REQUEST_METHOD'] !== 'GET' || $page === 'user/delete') {
    http_response_code(405);
    header('Allow: POST');
    $route = ['title' => 'Metode Tidak Diizinkan', 'file' => __DIR__ . '/views/405.php'];
}

$pageTitle = $route['title'];
$contentFile = $route['file'];
require __DIR__ . '/views/header.php';
require $contentFile;
require __DIR__ . '/views/footer.php';

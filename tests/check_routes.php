<?php
declare(strict_types=1);
$routes = require __DIR__ . '/../config/routes.php';
$required = ['dashboard', 'about', 'profil', 'kontak', 'functions', 'user/list', 'user/add', 'user/edit', 'user/delete'];
foreach ($required as $route) {
    if (!array_key_exists($route, $routes)) {
        fwrite(STDERR, "Rute hilang: $route\n");
        exit(1);
    }
    if (!is_file($routes[$route]['file'])) {
        fwrite(STDERR, "File rute tidak ada: $route\n");
        exit(1);
    }
    echo "[LULUS] $route\n";
}
if (array_key_exists('admin/rahasia', $routes)) {
    exit(1);
}
echo "[LULUS] admin/rahasia bukan rute terdaftar\n";

<?php
declare(strict_types=1);

/**
 * Satu tempat untuk koneksi database (PDO MySQL/MariaDB).
 * Pengaturan lokal boleh ditaruh dalam database.local.php (tidak di-commit).
 */
function db(): PDO
{
    static $pdo = null;
    if ($pdo instanceof PDO) {
        return $pdo;
    }

    $options = [
        'host' => getenv('DB_HOST') ?: '127.0.0.1',
        'port' => getenv('DB_PORT') ?: '3306',
        'name' => getenv('DB_NAME') ?: 'db_lab9web',
        'user' => getenv('DB_USER') ?: 'root',
        'pass' => getenv('DB_PASS') !== false ? getenv('DB_PASS') : '',
    ];
    if (is_file(__DIR__ . '/database.local.php')) {
        $custom = require __DIR__ . '/database.local.php';
        if (is_array($custom)) {
            $options = array_replace($options, $custom);
        }
    }

    try {
        $pdo = new PDO(
            sprintf('mysql:host=%s;port=%s;dbname=%s;charset=utf8mb4',
                $options['host'], $options['port'], $options['name']),
            $options['user'],
            $options['pass'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false,
            ]
        );
        return $pdo;
    } catch (PDOException $exception) {
        error_log('Lab9Web database: ' . $exception->getMessage());
        http_response_code(500);
        exit('Koneksi database gagal. Periksa MySQL, database.sql, dan config/database.local.php.');
    }
}

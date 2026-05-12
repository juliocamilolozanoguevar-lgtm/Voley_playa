<?php
declare(strict_types=1);

$appUrl = rtrim((string) Env::get('APP_URL', 'http://localhost/voley_playa'), '/');
$basePath = rtrim((string) parse_url($appUrl, PHP_URL_PATH), '/');

return [
    'app' => [
        'name' => Env::get('APP_NAME', 'Voley Diloz'),
        'url' => $appUrl,
        'base_path' => $basePath,
        'debug' => filter_var(Env::get('APP_DEBUG', 'true'), FILTER_VALIDATE_BOOL),
    ],
    'db' => [
        'host' => Env::get('DB_HOST', 'localhost'),
        'port' => Env::get('DB_PORT', '3306'),
        'name' => Env::get('DB_NAME', 'voley_diloz'),
        'user' => Env::get('DB_USER', 'root'),
        'pass' => Env::get('DB_PASS', ''),
        'charset' => Env::get('DB_CHARSET', 'utf8mb4'),
    ],
    'session' => [
        'name' => Env::get('SESSION_NAME', 'voley_diloz_session'),
    ],
];

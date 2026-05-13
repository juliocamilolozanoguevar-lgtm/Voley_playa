<?php
declare(strict_types=1);

define('BASE_PATH', dirname(__DIR__));

require_once BASE_PATH . '/app/core/Env.php';
require_once BASE_PATH . '/app/core/Config.php';

$envFile = BASE_PATH . '/.env';
if (is_file($envFile)) {
    Env::load($envFile);
} else {
    Env::loadArray(require BASE_PATH . '/app/config/env.php');
}

Config::set(require BASE_PATH . '/app/config/config.php');

require_once BASE_PATH . '/app/core/helpers.php';

spl_autoload_register(function (string $class): void {
    $directories = [
        BASE_PATH . '/app/core/',
        BASE_PATH . '/app/controllers/',
        BASE_PATH . '/app/models/',
    ];

    foreach ($directories as $directory) {
        $file = $directory . $class . '.php';
        if (is_file($file)) {
            require_once $file;
            return;
        }
    }
});

$app = new App();
$app->run();

<?php
declare(strict_types=1);

define('BASE_PATH', __DIR__);

require_once BASE_PATH . '/app/core/Env.php';
require_once BASE_PATH . '/app/core/Config.php';

Env::loadArray(require BASE_PATH . '/app/config/env.php');
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

$sessionName = (string) Config::get('session.name', 'voley_diloz_session');
if (session_status() === PHP_SESSION_NONE) {
    session_name($sessionName);
    session_start();
}

$app = new App();
$app->run();

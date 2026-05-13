<?php
declare(strict_types=1);

class App
{
    public function run(): void
    {
        $sessionName = (string) Config::get('session.name', 'voley_diloz_session');
        if (session_status() === PHP_SESSION_NONE) {
            session_name($sessionName);
            session_start();
        }

        (new Router())->run();
    }
}

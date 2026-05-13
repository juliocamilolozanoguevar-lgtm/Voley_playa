<?php
declare(strict_types=1);

class Router
{
    private array $routes = [
        ['GET', '#^/$#', 'AuthController', 'showLogin'],
        ['GET', '#^/login$#', 'AuthController', 'showLogin'],
        ['GET', '#^/dashboard$#', 'DashboardController', 'index'],
        ['GET', '#^/clientes$#', 'ClienteController', 'index'],
        ['GET', '#^/reservas$#', 'ReservaController', 'index'],
        ['GET', '#^/video$#', 'VideoController', 'index'],
        ['GET', '#^/logout$#', 'AuthController', 'logout'],

        ['POST', '#^/api/login$#', 'AuthController', 'loginApi'],
        ['GET', '#^/api/session$#', 'AuthController', 'sessionInfo'],
        ['GET', '#^/api/dashboard/summary$#', 'DashboardController', 'summary'],

        ['GET', '#^/api/clientes$#', 'ClienteController', 'list'],
        ['POST', '#^/api/clientes$#', 'ClienteController', 'store'],
        ['GET', '#^/api/clientes/dni/([0-9]{8})$#', 'ClienteController', 'findByDni'],

        ['GET', '#^/api/canchas$#', 'ReservaController', 'canchas'],
        ['GET', '#^/api/reservas$#', 'ReservaController', 'list'],
        ['POST', '#^/api/reservas$#', 'ReservaController', 'store'],
        ['PUT', '#^/api/reservas/([0-9]+)$#', 'ReservaController', 'update'],
        ['DELETE', '#^/api/reservas/([0-9]+)$#', 'ReservaController', 'destroy'],
        ['GET', '#^/api/reservas/disponibilidad$#', 'ReservaController', 'availability'],
    ];

    public function run(): void
    {
        $method = strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');
        $path = $this->getPath();

        try {
            foreach ($this->routes as [$routeMethod, $pattern, $controller, $action]) {
                if ($method !== $routeMethod) {
                    continue;
                }

                if (!preg_match($pattern, $path, $matches)) {
                    continue;
                }

                array_shift($matches);
                $instance = new $controller();
                $instance->{$action}(...$matches);
                return;
            }
        } catch (Throwable $exception) {
            $this->handleException($path, $exception);
            return;
        }

        http_response_code(404);
        echo 'Pagina no encontrada';
    }

    private function getPath(): string
    {
        if (isset($_GET['url'])) {
            $url = trim((string) $_GET['url'], '/');
            return $url === '' ? '/' : '/' . $url;
        }

        $uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH) ?: '/';
        $basePath = (string) Config::get('app.base_path', '');

        if ($basePath !== '' && str_starts_with($uri, $basePath)) {
            $uri = substr($uri, strlen($basePath)) ?: '/';
        }

        if ($uri === '/index.php' || $uri === '/app/index.php') {
            return '/';
        }

        $normalized = rtrim($uri, '/');
        return $normalized === '' ? '/' : $normalized;
    }

    private function handleException(string $path, Throwable $exception): void
    {
        $message = Config::get('app.debug', true)
            ? $exception->getMessage()
            : 'Ocurrio un error inesperado en la aplicacion.';

        http_response_code(500);

        if (str_starts_with($path, '/api/')) {
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode(['message' => $message], JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            return;
        }

        echo '<!DOCTYPE html><html lang="es"><head><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>Error</title><link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"></head><body class="bg-light"><main class="container py-5"><div class="alert alert-danger shadow-sm"><h1 class="h4 mb-2">La aplicacion no pudo completarse</h1><p class="mb-0">'
            . e($message)
            . '</p></div></main></body></html>';
    }
}

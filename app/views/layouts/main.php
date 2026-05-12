<?php
declare(strict_types=1);

$user = current_user();
$activePage = $activePage ?? '';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($title) ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= e(asset('css/style.php')) ?>">
</head>
<body class="page-body">
    <nav class="navbar navbar-expand-lg app-navbar sticky-top">
        <div class="container">
            <a class="navbar-brand" href="<?= e(app_url('dashboard')) ?>">Voley Diloz</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Alternar navegacion">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="mainNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?= $activePage === 'dashboard' ? 'active' : '' ?>" href="<?= e(app_url('dashboard')) ?>">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $activePage === 'clientes' ? 'active' : '' ?>" href="<?= e(app_url('clientes')) ?>">Clientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $activePage === 'reservas' ? 'active' : '' ?>" href="<?= e(app_url('reservas')) ?>">Reservas</a>
                    </li>
                </ul>
                <div class="d-flex align-items-center gap-3">
                    <span class="navbar-text text-white"><?= e($user['nombre'] ?? 'Administrador') ?></span>
                    <a href="<?= e(app_url('logout')) ?>" class="btn btn-light btn-sm px-3">Salir</a>
                </div>
            </div>
        </div>
    </nav>

    <main class="page-wrapper">
        <div class="container">
            <?php require $contentView; ?>
        </div>
    </main>

    <script>
        window.APP_CONFIG = {
            basePath: <?= json_encode((string) Config::get('app.base_path', '')) ?>,
            appUrl: <?= json_encode((string) Config::get('app.url', '')) ?>
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= e(asset('js/app.php')) ?>"></script>
    <?php foreach ($scripts as $script): ?>
        <script src="<?= e(asset($script)) ?>"></script>
    <?php endforeach; ?>
</body>
</html>

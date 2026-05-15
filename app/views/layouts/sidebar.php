<?php
declare(strict_types=1);

$user = current_user();
$activePage = $activePage ?? '';
?>
<nav class="navbar navbar-expand-lg app-navbar sticky-top">
    <div class="container">
        <a class="navbar-brand" href="<?= e(app_url('dashboard')) ?>">Voley Diloz</a>
        <button class="navbar-toggler" type="button" data-collapse-toggle="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Alternar navegacion">
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
                <li class="nav-item">
                    <a class="nav-link <?= $activePage === 'video' ? 'active' : '' ?>" href="<?= e(app_url('video')) ?>">Video</a>
                </li>
            </ul>
            <div class="d-flex align-items-center gap-3">
                <span class="navbar-text text-white"><?= e($user['nombre'] ?? 'Administrador') ?></span>
                <a href="<?= e(app_url('logout')) ?>" class="btn btn-light btn-sm px-3">Salir</a>
            </div>
        </div>
    </div>
</nav>

<?php
declare(strict_types=1);

function app_url(string $path = ''): string
{
    $base = rtrim((string) Config::get('app.url', ''), '/');
    $suffix = ltrim($path, '/');

    return $suffix === '' ? $base : $base . '/' . $suffix;
}

function asset(string $path): string
{
    return app_url('public/' . ltrim($path, '/'));
}

function e(mixed $value): string
{
    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}

function redirect(string $path = ''): void
{
    header('Location: ' . app_url($path));
    exit;
}

function current_user(): ?array
{
    return $_SESSION['user'] ?? null;
}

function is_logged_in(): bool
{
    return !empty($_SESSION['user']);
}

<?php
declare(strict_types=1);

header('Content-Type: text/css; charset=UTF-8');
?>
:root {
    --app-blue: #1f6feb;
    --app-blue-dark: #1349b4;
    --app-sky: #dff1ff;
    --app-sky-strong: #b7deff;
    --app-bg: #f4f8fc;
    --app-text: #16304d;
    --app-muted: #5f738c;
    --app-border: #d9e6f2;
    --app-card: #ffffff;
    --app-success: #0f9d79;
}

* {
    box-sizing: border-box;
}

body {
    font-family: "Manrope", sans-serif;
    color: var(--app-text);
    background:
        radial-gradient(circle at top left, rgba(31, 111, 235, 0.08), transparent 32%),
        linear-gradient(180deg, #f8fbff 0%, var(--app-bg) 100%);
}

.page-body {
    min-height: 100vh;
}

.app-navbar {
    background: linear-gradient(90deg, var(--app-blue-dark), var(--app-blue));
    box-shadow: 0 12px 30px rgba(19, 73, 180, 0.18);
}

.app-navbar .navbar-brand,
.app-navbar .nav-link,
.app-navbar .navbar-text {
    color: #fff;
}

.app-navbar .nav-link {
    border-radius: 999px;
    padding: 0.55rem 0.95rem;
    font-weight: 700;
    opacity: 0.9;
}

.app-navbar .nav-link.active,
.app-navbar .nav-link:hover {
    background: rgba(255, 255, 255, 0.15);
    color: #fff;
    opacity: 1;
}

.navbar-toggler {
    border-color: rgba(255, 255, 255, 0.45);
}

.navbar-toggler:focus {
    box-shadow: none;
}

.navbar-toggler-icon {
    filter: invert(1);
}

.page-wrapper {
    padding: 2rem 0 3rem;
}

.page-title {
    font-size: clamp(1.85rem, 3vw, 2.5rem);
    font-weight: 800;
    margin-bottom: 0.35rem;
}

.helper-text {
    color: var(--app-muted);
    font-size: 0.95rem;
}

.section-card,
.summary-card,
.income-card {
    border: 1px solid var(--app-border);
    border-radius: 1.25rem;
    background: var(--app-card);
    box-shadow: 0 18px 45px rgba(21, 56, 96, 0.06);
}

.section-card .card-header {
    background: transparent;
    border-bottom: 1px solid var(--app-border);
    font-weight: 800;
    color: var(--app-text);
    padding: 1.1rem 1.25rem;
}

.section-card .card-body {
    padding: 1.25rem;
}

.summary-card .card-body,
.income-card {
    padding: 1.3rem;
}

.summary-label,
.income-label {
    color: var(--app-muted);
    margin-bottom: 0.4rem;
    font-size: 0.95rem;
    font-weight: 700;
}

.summary-value,
.income-value {
    margin: 0;
    font-size: clamp(1.8rem, 3vw, 2.4rem);
    font-weight: 800;
    color: var(--app-blue-dark);
}

.income-card {
    height: 100%;
    background: linear-gradient(180deg, #ffffff 0%, #eef7ff 100%);
}

.availability-box {
    border: 1px dashed var(--app-sky-strong);
    background: linear-gradient(180deg, #fbfdff 0%, #f1f8ff 100%);
    border-radius: 1rem;
    padding: 1rem;
}

.slot-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 0.65rem;
}

.slot-badge {
    border: 0;
    border-radius: 999px;
    padding: 0.7rem 1rem;
    font-weight: 700;
    color: var(--app-blue-dark);
    background: #e7f2ff;
    transition: transform 0.18s ease, background 0.18s ease, color 0.18s ease;
}

.slot-badge:hover {
    transform: translateY(-1px);
    background: #d3e9ff;
}

.slot-badge.active {
    background: var(--app-blue);
    color: #fff;
}

.selected-slot {
    min-height: 48px;
    display: flex;
    align-items: center;
    padding: 0.85rem 1rem;
    border: 1px solid var(--app-border);
    border-radius: 1rem;
    background: #f9fcff;
    font-weight: 700;
}

.form-control,
.form-select {
    min-height: 48px;
    border-radius: 1rem;
    border-color: var(--app-border);
}

.form-control:focus,
.form-select:focus {
    border-color: #8bbdff;
    box-shadow: 0 0 0 0.25rem rgba(31, 111, 235, 0.12);
}

.btn {
    border-radius: 0.95rem;
    font-weight: 700;
}

.btn-primary {
    background: linear-gradient(90deg, var(--app-blue), #2d8cff);
    border-color: transparent;
}

.btn-primary:hover,
.btn-primary:focus {
    background: linear-gradient(90deg, var(--app-blue-dark), var(--app-blue));
    border-color: transparent;
}

.btn-outline-primary {
    border-color: var(--app-blue);
    color: var(--app-blue);
}

.btn-outline-primary:hover {
    background: var(--app-blue);
    border-color: var(--app-blue);
}

.table {
    --bs-table-bg: transparent;
    --bs-table-striped-bg: #f7fbff;
}

.table thead th {
    color: var(--app-muted);
    font-size: 0.83rem;
    text-transform: uppercase;
    letter-spacing: 0.04em;
    border-bottom-color: var(--app-border);
}

.table td,
.table th {
    vertical-align: middle;
}

.badge-soft {
    display: inline-flex;
    align-items: center;
    border-radius: 999px;
    padding: 0.35rem 0.65rem;
    font-size: 0.8rem;
    font-weight: 800;
    background: #e9f7f2;
    color: var(--app-success);
}

.badge-soft.is-warning {
    background: #fff5db;
    color: #9a6b00;
}

.badge-soft.is-danger {
    background: #ffe3e3;
    color: #be123c;
}

.modal-content {
    border-radius: 1.25rem;
}

.alert {
    border-radius: 1rem;
    border-width: 1px;
}

@media (max-width: 991.98px) {
    .page-wrapper {
        padding-top: 1.35rem;
    }

    .app-navbar .navbar-collapse {
        margin-top: 1rem;
        padding-top: 1rem;
        border-top: 1px solid rgba(255, 255, 255, 0.2);
    }
}

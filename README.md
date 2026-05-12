# Voley Diloz

Aplicacion web de reservas para canchas de voley playa, reconstruida en PHP, JavaScript, HTML, CSS y Bootstrap.

## Estructura principal

```text
app/
  config/
  controllers/
  core/
  models/
  views/
public/
  css/
  js/
  video/
index.php
.env
.env.example
.htaccess
```

## Modulos

- `Login`: valida el acceso del administrador usando la tabla `usuario`.
- `Dashboard`: muestra resumen de clientes, reservas, canchas, pagos e ingresos.
- `Clientes`: registra cliente y reserva en una sola vista, con disponibilidad por cancha.
- `Reservas`: lista, busca, edita y elimina reservas.

## Base de datos esperada

- Base: `voley_diloz`
- Host: `localhost`
- Usuario: `root`
- Contrasena: vacia

Los valores vienen configurados en `.env`.

## Puesta en marcha en XAMPP

1. Inicia `Apache` y `MySQL` desde XAMPP.
2. Importa tu base `voley_diloz`.
3. Abre `http://localhost/voley_playa/`.
4. Ingresa con tu usuario de la tabla `usuario`.

## Nota

Las carpetas `backend/` y `frontend/` quedaron como referencia del proyecto anterior, pero el punto de entrada actual es `index.php`.

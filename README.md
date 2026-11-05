# Maristas UI Kit

Sistema de diseño de los sistemas Maristas: tokens (`--maristas-*`), estilos sobre Bootstrap 5 (`.mr-*`) y componentes Blade (`<x-maristas::…>`).

## Instalación (Laravel 9 a 12)

```bash
composer require maristas/ui-kit
php artisan vendor:publish --tag=maristas-ui-assets
```

En el layout, después de Bootstrap 5 y Remix Icon:

```html
<link href="{{ asset('vendor/maristas-ui/maristas-ui.css') }}" rel="stylesheet">
<body class="mr-scope">
```

Dependencias del proyecto (no se incluyen): Bootstrap 5 (CSS y JS), Remix Icon y la fuente Poppins. No requiere Alpine.js ni Livewire.

## Documentación

En `local` y `testing` el paquete publica `/ui-kit` con todos los fundamentos, componentes y patrones. Se configura en `config/maristas-ui.php` (`vendor:publish --tag=maristas-ui-config`).

## Desarrollo

```bash
composer install
vendor/bin/phpunit
vendor/bin/testbench serve      # documentación en http://127.0.0.1:8000/ui-kit
```

## Estado

Primer corte: tokens, formularios, botones, tablas, tarjetas, alertas, navegación, barra principal y patrones de página, migrados desde el CRM. Pendiente: tablas de datos, selectores, calendarios, gráficas, compilar Bootstrap con los tokens propios y la guía `.md` para IA.

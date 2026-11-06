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

## Para asistentes de IA

El paquete genera una guía en Markdown (reglas, tokens, props de cada componente, clases `.mr-*` y todos los ejemplos) a partir de sus propias fuentes, para que Claude Code, Cursor o Copilot escriban pantallas que respeten el sistema de diseño.

```bash
php artisan maristas-ui:ia --agentes   # escribe docs/maristas-ui.md y avisa en CLAUDE.md / AGENTS.md
php artisan maristas-ui:ia --resumen   # sin ejemplos
```

También se ve en la documentación (`/ui-kit/ia`) y se descarga en `/ui-kit/ia.md` (`?resumen=1` para la versión corta). La guía no se edita a mano: se regenera al actualizar el paquete.

## Revisar las vistas (lint)

```bash
php artisan maristas-ui:lint                       # todo resources/views
php artisan maristas-ui:lint resources/views/alumnos
php artisan maristas-ui:lint --estricto            # los avisos también hacen fallar (útil en CI)
```

Si una región debe conservar colores fijos a propósito (por ejemplo la vista previa de un correo, que replica la plantilla real), enciérrala entre `{{-- mr-lint:off motivo --}}` y `{{-- mr-lint:on --}}`: el lint no la revisa. Al recorrer una carpeta se omiten las que estén en `config('maristas-ui.lint.excluir')` (por defecto `emails`).

Solo lee, nunca modifica. **Errores** (hacen fallar el comando): clases `.mr-*` que no existen, componentes `x-maristas::*` inexistentes, propiedades mal escritas, tonos inválidos, colores sueltos en `style` e íconos solos sin `aria-label`. **Avisos**: clases de color de Bootstrap (`text-danger`, `bg-primary`…) y más de un botón principal por vista. La guía para IA le indica al asistente que lo ejecute al terminar cada vista.

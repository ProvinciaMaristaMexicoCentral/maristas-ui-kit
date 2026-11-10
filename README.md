# Maristas UI Kit

Sistema de diseño de los sistemas Maristas: tokens (`--maristas-*`), estilos sobre Bootstrap 5 (`.mr-*`) y componentes Blade (`<x-maristas::…>`).

**Documentación en línea:** https://provinciamaristamexicocentral.github.io/maristas-ui-kit/ (sitio público; se publica solo en cada cambio a `main` que afecta a la documentación).

## Instalación (Laravel 9 a 13)

El repositorio es público, pero el paquete no está en Packagist: Composer necesita saber dónde vive.

```bash
# 1. Una sola vez por proyecto: registrar el repositorio (se escribe en composer.json)
composer config repositories.maristas-ui-kit vcs https://github.com/ProvinciaMaristaMexicoCentral/maristas-ui-kit.git

# 2. Instalar (actualiza composer.json y composer.lock; no se editan a mano)
composer require maristas/ui-kit

# 3. Publicar los assets del kit
php artisan vendor:publish --tag=maristas-ui-assets --force
```

**Proyecto que ya usa el kit** (por ejemplo el CRM): basta `composer install`, porque `composer.json` y `composer.lock` ya lo traen. Después, `php artisan vendor:publish --tag=maristas-ui-assets --force` y `npm run build`.

**Actualizar** a una versión nueva: `composer update maristas/ui-kit` y volver a publicar los assets.

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

Para generar la documentación como sitio estático (HTML sin PHP, por ejemplo para GitHub Pages):

```bash
vendor/bin/testbench maristas-ui:exportar-docs _site --base=/maristas-ui-kit
```

`--base` es la ruta donde se publicará (sin dominio); déjala vacía si va en la raíz. Escribe `<página>/index.html`, los assets en `_assets/` y las guías `ia.md` e `ia-resumen.md`.

## Estado

Versión actual: `v1.1.0`.

**Incluido:** tokens, formularios (secciones, etiquetas, campos obligatorios, acciones de pie, selección múltiple con buscador), botones, tablas de datos con filtros y paginación, tarjetas, alertas, avisos emergentes, navegación, barra principal con menús de usuario, institución y notificaciones, barra de título con migas, pie, pantallas de acceso, pasos, modales y avatares. Además: documentación navegable con búsqueda, el comando `maristas-ui:lint` que revisa vistas contra las reglas del kit y la guía en Markdown para asistentes de IA (`maristas-ui:ia`).

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

## Licencia

Software propietario de la Provincia Marista México Central, de uso interno. Todos los derechos reservados; consulta el archivo `LICENSE`.

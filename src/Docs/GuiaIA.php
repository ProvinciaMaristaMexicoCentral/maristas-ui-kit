<?php

namespace Maristas\UiKit\Docs;

/**
 * Genera la guía en Markdown para asistentes de IA a partir de las mismas fuentes que la
 * documentación: tokens del CSS, props de los componentes Blade y ejemplos de cada página.
 * Así la guía no se desactualiza: se regenera, no se escribe a mano.
 */
class GuiaIA
{
    /** Componentes que existen solo para armar la documentación. */
    protected const SOLO_DOCS = ['example', 'prop', 'rule'];

    public static function generar(bool $ejemplos = true): string
    {
        $partes = [
            static::encabezado(),
            static::reglas(),
            static::tokens(),
            static::componentes(),
            static::clases(),
            static::paginas($ejemplos),
        ];

        return rtrim(implode("\n\n", array_filter($partes)))."\n";
    }

    protected static function raiz(): string
    {
        return dirname(__DIR__, 2);
    }

    protected static function encabezado(): string
    {
        return <<<'MD'
# Maristas UI Kit — guía para asistentes de IA

> Archivo generado con `php artisan maristas-ui:ia`. No lo edites a mano: regenéralo al actualizar el paquete.

Eres un asistente que escribe pantallas para un sistema Maristas. Este kit (`maristas/ui-kit`) es el único sistema de diseño permitido: **reutiliza lo que existe, no inventes estilos**.

## Cómo está construido

- Laravel 9–12, Blade, **Bootstrap 5** como base (CSS y JS). Sin Alpine, Livewire ni jQuery obligatorios: el JavaScript del kit (`maristas-ui.js`) es puro.
- Íconos: Remix Icon (`ri-*`). Fuente: Poppins.
- Tokens CSS con prefijo `--maristas-*`; clases propias con prefijo `.mr-*`.
- Componentes Blade anónimos con el prefijo `x-maristas::` (por ejemplo `<x-maristas::button>`).
- Los estilos que cambian el aspecto de Bootstrap solo actúan dentro de un contenedor con la clase `mr-scope`. Envuelve la pantalla en `<div class="mr-scope">…</div>`.
- Carga `vendor/maristas-ui/maristas-ui.css` después de Bootstrap y `maristas-ui.js` al final del `<body>` (se publican con `php artisan vendor:publish --tag=maristas-ui-assets`).
MD;
    }

    protected static function reglas(): string
    {
        return <<<'MD'
## Reglas obligatorias

1. **Un componente del kit antes que HTML propio.** Si existe un componente `x-maristas::*` para lo que necesitas, úsalo. Si no existe, compón con clases `.mr-*` y Bootstrap; no crees CSS nuevo salvo que el usuario lo pida.
2. **Colores solo con tokens** (`var(--maristas-*)`). Nunca valores hexadecimales sueltos ni clases de color de Bootstrap para decorar (`bg-primary`, `text-danger`…). Los tonos de estado se expresan con `tone="success|warning|danger|info|neutral"`.
3. **Un solo botón principal por vista.** Los demás son secundarios (`variant="secondary"`). El botón deshabilitado es azul claro, nunca gris.
4. **Los estados son etiquetas** (`x-maristas::state`), con un solo mensaje y color semántico. El azul de marca nunca representa un estado.
5. **Las alertas dicen qué pasó y qué hacer**; las confirmaciones temporales van en toast.
6. **Íconos de Remix** (`ri-*`); si un ícono va solo, lleva `aria-label`.
7. **Accesibilidad:** foco visible, `label` en cada campo, contraste suficiente, controles operables con teclado, `aria-current`/`aria-label` en navegación.
8. **Textos en español**, claros y sin jerga. Datos de ejemplo ficticios; nunca datos reales de personas.
9. **No uses clases que no aparezcan en esta guía.** Si dudas de que una clase exista, revisa la sección «Clases disponibles».
10. Entre página y pie deja respiro; no pegues contenido al borde.

## Verifica tu trabajo

Al terminar una vista ejecuta `php artisan maristas-ui:lint <ruta de la vista>` y corrige todos los errores que reporte (clases inventadas, colores sueltos, componentes o propiedades inexistentes, íconos sin `aria-label`). Los avisos son para revisar con criterio.
MD;
    }

    protected static function tokens(): string
    {
        $css = file_get_contents(static::raiz().'/resources/css/maristas-ui.css');

        if (! preg_match('/:root\s*\{(.*?)\n\}/s', $css, $bloque)) {
            return '';
        }

        $lineas = ['## Tokens de diseño', ''];
        $grupo = null;

        foreach (preg_split('/\R/', $bloque[1]) as $linea) {
            $linea = trim($linea);

            if (preg_match('#^/\*\s*(.*?)\s*\*/$#', $linea, $m)) {
                $grupo = $m[1];
                $lineas[] = '';
                $lineas[] = '**'.$grupo.'**';
                continue;
            }

            if (preg_match_all('/(--maristas-[a-z0-9-]+)\s*:\s*([^;]+);/', $linea, $m, PREG_SET_ORDER)) {
                foreach ($m as $token) {
                    $lineas[] = '- `'.$token[1].'`: `'.trim($token[2]).'`';
                }
            }
        }

        return implode("\n", $lineas);
    }

    protected static function componentes(): string
    {
        $lineas = [
            '## Componentes Blade',
            '',
            'Se usan como `<x-maristas::nombre propiedad="…">contenido</x-maristas::nombre>`. Las propiedades sin valor por defecto son obligatorias.',
        ];

        $archivos = glob(static::raiz().'/resources/views/components/*.blade.php');
        sort($archivos);

        foreach ($archivos as $archivo) {
            $nombre = basename($archivo, '.blade.php');

            if (in_array($nombre, static::SOLO_DOCS, true)) {
                continue;
            }

            $fuente = file_get_contents($archivo);
            $props = static::props($fuente);
            $slots = static::slotsNombrados($fuente, $props);

            $lineas[] = '';
            $lineas[] = '### `x-maristas::'.$nombre.'`';
            $lineas[] = $props
                ? '- Propiedades: '.implode(', ', array_map(fn ($p) => '`'.$p.'`', $props))
                : '- Sin propiedades propias (solo contenido y atributos HTML).';

            if ($slots) {
                $lineas[] = '- Slots con nombre: '.implode(', ', array_map(fn ($s) => '`'.$s.'`', $slots)).' (`<x-slot:nombre>…</x-slot:nombre>`).';
            }

            $lineas[] = '- Acepta atributos HTML adicionales (`class`, `id`, `data-*`, `wire:*`, `x-*`).';
        }

        return implode("\n", $lineas);
    }

    /** @return string[] propiedades con su valor por defecto, p. ej. "tone = 'info'" */
    protected static function props(string $fuente): array
    {
        if (! preg_match('/@props\(\[(.*?)\]\)/s', $fuente, $m)) {
            return [];
        }

        $props = [];

        foreach (preg_split('/,(?=(?:[^\']*\'[^\']*\')*[^\']*$)/', $m[1]) as $item) {
            $item = trim($item);

            if ($item === '') {
                continue;
            }

            if (preg_match("/^'([^']+)'\s*=>\s*(.+)$/s", $item, $p)) {
                $props[] = $p[1].' = '.trim($p[2]);
            } else {
                $props[] = trim($item, "' ").' (obligatoria)';
            }
        }

        return $props;
    }

    /** @return string[] */
    protected static function slotsNombrados(string $fuente, array $props): array
    {
        $nombresProps = array_map(fn ($p) => strtok($p, ' '), $props);
        preg_match_all('/\{\{\s*\$([a-z]+)\s*(?:\?\?[^}]*)?\}\}/i', $fuente, $m);
        preg_match_all('/\$([a-z]+)\s*=(?![=>])/i', $fuente, $locales);

        // Una variable impresa que no es propiedad ni $slot es un slot con nombre.
        return array_values(array_unique(array_diff($m[1], ['slot', 'attributes', 'code'], $nombresProps, $locales[1])));
    }

    protected static function clases(): string
    {
        $css = file_get_contents(static::raiz().'/resources/css/maristas-ui.css');
        preg_match_all('/\.(mr-[a-z0-9-]+)/', $css, $m);

        $familias = [];

        foreach (array_unique($m[1]) as $clase) {
            $base = explode('-', $clase)[1] ?? $clase;
            $familias[$base][] = $clase;
        }

        ksort($familias);

        $lineas = [
            '## Clases disponibles',
            '',
            'Estas son todas las clases `.mr-*` que existen, agrupadas por familia. Usa solo estas.',
            '',
        ];

        foreach ($familias as $base => $clases) {
            sort($clases);
            $lineas[] = '- **'.$base.'**: '.implode(', ', array_map(fn ($c) => '`'.$c.'`', $clases));
        }

        return implode("\n", $lineas);
    }

    protected static function paginas(bool $ejemplos): string
    {
        $lineas = ['## Catálogo de componentes y patrones'];

        if ($ejemplos) {
            $lineas[] = '';
            $lineas[] = 'Cada ejemplo es código listo para copiar. Cambia los datos, no la estructura.';
        }

        $grupoActual = null;

        foreach (Catalogo::paginas() as $slug => $pagina) {
            if (in_array($slug, ['introduccion'], true)) {
                continue;
            }

            if ($pagina['grupo'] !== $grupoActual) {
                $grupoActual = $pagina['grupo'];
                $lineas[] = '';
                $lineas[] = '### '.$grupoActual;
            }

            $lineas[] = '';
            $lineas[] = '#### '.$pagina['titulo'].' (`'.$slug.'`)';

            if ($pagina['descripcion'] !== '') {
                $lineas[] = '';
                $lineas[] = static::textoPlano($pagina['descripcion']);
            }

            if (! $ejemplos) {
                continue;
            }

            foreach (static::ejemplosDe($slug) as $ejemplo) {
                $lineas[] = '';
                $lineas[] = '**'.($ejemplo['titulo'] ?: 'Ejemplo').'**'.($ejemplo['nota'] ? ' — '.static::textoPlano($ejemplo['nota']) : '');
                $lineas[] = '';
                $lineas[] = '```blade';
                $lineas[] = $ejemplo['codigo'];
                $lineas[] = '```';
            }
        }

        return implode("\n", $lineas);
    }

    protected static function textoPlano(string $html): string
    {
        $html = preg_replace('#<code>(.*?)</code>#s', '`$1`', $html);

        return trim(html_entity_decode(strip_tags($html)));
    }

    /** @return array<int, array{titulo: ?string, nota: ?string, codigo: string}> */
    protected static function ejemplosDe(string $slug): array
    {
        $archivo = static::raiz().'/resources/views/docs/pages/'.$slug.'.blade.php';

        if (! is_file($archivo)) {
            return [];
        }

        $fuente = file_get_contents($archivo);
        $patron = '#<x-maristas::example((?:"[^"]*"|\'[^\']*\'|[^>"\'])*)>(.*?)</x-maristas::example>#s';

        if (! preg_match_all($patron, $fuente, $m, PREG_SET_ORDER)) {
            return [];
        }

        $resultado = [];

        foreach ($m as [$todo, $atributos, $interior]) {
            preg_match('/title="([^"]*)"/', $atributos, $t);
            preg_match('/note="([^"]*)"/', $atributos, $n);

            if (preg_match('#<x-slot:code>(.*?)</x-slot:code>#s', $interior, $c)) {
                $codigo = str_replace(['@verbatim', '@endverbatim'], '', $c[1]);
            } else {
                $codigo = $interior;
            }

            $codigo = preg_replace('/\{\{--.*?--\}\}/s', '', $codigo);
            $codigo = static::sinSangria($codigo);

            if ($codigo === '') {
                continue;
            }

            $resultado[] = ['titulo' => $t[1] ?? null, 'nota' => $n[1] ?? null, 'codigo' => $codigo];
        }

        return $resultado;
    }

    protected static function sinSangria(string $texto): string
    {
        $lineas = preg_split('/\R/', trim($texto, "\r\n"));
        $lineas = array_values(array_filter($lineas, fn ($l) => trim($l) !== ''));

        if (! $lineas) {
            return '';
        }

        $minimo = min(array_map(fn ($l) => strlen($l) - strlen(ltrim($l)), $lineas));

        return implode("\n", array_map(fn ($l) => rtrim(substr($l, $minimo)), $lineas));
    }
}

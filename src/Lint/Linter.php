<?php

namespace Maristas\UiKit\Lint;

/**
 * Revisa vistas Blade contra las reglas del kit. Solo lee: nunca modifica archivos.
 * Las listas de clases y componentes salen del propio paquete, así no se desactualizan.
 */
class Linter
{
    public const ERROR = 'error';

    public const AVISO = 'aviso';

    protected const TONOS = [
        'state' => ['success', 'warning', 'danger', 'info', 'neutral'],
        'alert' => ['info', 'success', 'warning', 'danger'],
    ];

    /** Atributos HTML/framework que cualquier componente acepta. */
    protected const ATRIBUTOS_LIBRES = ['class', 'id', 'style', 'title', 'role', 'name', 'value', 'type', 'href', 'target', 'rel', 'disabled', 'hidden', 'for'];

    /** @var string[] */
    protected array $clases;

    /** @var array<string, string[]> componente => propiedades (en kebab-case) */
    protected array $componentes;

    public function __construct()
    {
        $raiz = dirname(__DIR__, 2);

        preg_match_all('/\.(mr-[a-z0-9-]+)/', file_get_contents($raiz.'/resources/css/maristas-ui.css'), $m);
        $this->clases = array_flip(array_unique($m[1]));

        foreach (glob($raiz.'/resources/views/components/*.blade.php') as $archivo) {
            $props = [];

            if (preg_match('/@props\(\[(.*?)\]\)/s', file_get_contents($archivo), $p)) {
                preg_match_all("/'([A-Za-z]+)'/", preg_replace("/=>\s*'[^']*'/", '=>x', $p[1]), $nombres);
                $props = array_map(fn ($n) => strtolower(preg_replace('/(?<!^)[A-Z]/', '-$0', $n)), $nombres[1]);
            }

            $this->componentes[basename($archivo, '.blade.php')] = $props;
        }
    }

    /** @return array<int, array{linea: int, nivel: string, mensaje: string}> */
    public function revisar(string $contenido): array
    {
        $texto = $this->sinComentarios($contenido);
        $hallazgos = [];

        $this->clasesInventadas($texto, $hallazgos);
        $this->coloresSueltos($texto, $hallazgos);
        $this->componentesYPropiedades($texto, $hallazgos);
        $this->iconosSinNombre($texto, $hallazgos);
        $this->coloresDeBootstrap($texto, $hallazgos);
        $this->botonesPrincipales($texto, $hallazgos);

        usort($hallazgos, fn ($a, $b) => $a['linea'] <=> $b['linea']);

        return $hallazgos;
    }

    /** Quita comentarios Blade y bloques @verbatim conservando los saltos de línea. */
    protected function sinComentarios(string $contenido): string
    {
        $vaciar = fn (array $m) => str_repeat("\n", substr_count($m[0], "\n"));

        // Regiones que el lint no revisa: {{-- mr-lint:off motivo --}} … {{-- mr-lint:on --}}
        // (por ejemplo la vista previa de un correo, que replica los colores fijos de la plantilla real).
        $contenido = preg_replace_callback('/\{\{--\s*mr-lint:off.*?--\}\}.*?\{\{--\s*mr-lint:on\s*--\}\}/s', $vaciar, $contenido);

        $contenido = preg_replace_callback('/\{\{--.*?--\}\}/s', $vaciar, $contenido);

        return preg_replace_callback('/@verbatim.*?@endverbatim/s', $vaciar, $contenido);
    }

    protected function linea(string $texto, int $posicion): int
    {
        return substr_count(substr($texto, 0, $posicion), "\n") + 1;
    }

    protected function agregar(array &$hallazgos, string $texto, int $posicion, string $nivel, string $mensaje): void
    {
        $hallazgos[] = ['linea' => $this->linea($texto, $posicion), 'nivel' => $nivel, 'mensaje' => $mensaje];
    }

    protected function clasesInventadas(string $texto, array &$h): void
    {
        preg_match_all('/(?<![\w:-])(?::)?class\s*=\s*"([^"]*)"/', $texto, $m, PREG_OFFSET_CAPTURE);

        foreach ($m[1] as [$valor, $pos]) {
            preg_match_all('/(?<![\w-])(mr-[a-z0-9-]+)(?![a-z0-9-])(\{|\$)?/i', $valor, $c, PREG_SET_ORDER);

            foreach ($c as $coincidencia) {
                $clase = $coincidencia[1];

                // Clases armadas con Blade (mr-state-{{ $tono }}) no se pueden comprobar.
                if (! empty($coincidencia[2]) || str_ends_with($clase, '-') || isset($this->clases[$clase])) {
                    continue;
                }

                $this->agregar($h, $texto, $pos, self::ERROR, "clase inventada: `{$clase}` (no existe en el kit)");
            }
        }
    }

    protected function coloresSueltos(string $texto, array &$h): void
    {
        preg_match_all('/\bstyle\s*=\s*"([^"]*)"/', $texto, $m, PREG_OFFSET_CAPTURE);

        foreach ($m[1] as [$valor, $pos]) {
            if (preg_match('/#[0-9a-fA-F]{3,8}\b|\brgba?\(/', $valor, $color)) {
                $this->agregar($h, $texto, $pos, self::ERROR, "color suelto `{$color[0]}`: usa var(--maristas-*)");
            }
        }
    }

    protected function componentesYPropiedades(string $texto, array &$h): void
    {
        $patron = '#<x-maristas::([a-z-]+)((?:"[^"]*"|\'[^\']*\'|[^>"\'])*)>#';
        preg_match_all($patron, $texto, $m, PREG_SET_ORDER | PREG_OFFSET_CAPTURE);

        foreach ($m as $tag) {
            $nombre = $tag[1][0];
            $pos = $tag[0][1];

            if (! isset($this->componentes[$nombre])) {
                $this->agregar($h, $texto, $pos, self::ERROR, "componente inexistente: `x-maristas::{$nombre}`");
                continue;
            }

            preg_match_all('/(?<=\s)(:?[A-Za-z@][\w:.@-]*)(?:\s*=\s*(?:"([^"]*)"|\'([^\']*)\'))?/', $tag[2][0], $atributos, PREG_SET_ORDER);

            foreach ($atributos as $a) {
                $attr = ltrim($a[1], ':');
                $valor = $a[2] ?? $a[3] ?? null;

                if ($this->esAtributoLibre($attr) || in_array($attr, $this->componentes[$nombre], true)) {
                    if ($attr === 'tone' && $valor !== null && ! str_starts_with($a[1], ':') && isset(self::TONOS[$nombre]) && ! in_array($valor, self::TONOS[$nombre], true)) {
                        $this->agregar($h, $texto, $pos, self::ERROR, "tono inválido `{$valor}` en `{$nombre}`: usa ".implode(', ', self::TONOS[$nombre]));
                    }
                    continue;
                }

                foreach ($this->componentes[$nombre] as $prop) {
                    if (levenshtein($attr, $prop) <= 2) {
                        $this->agregar($h, $texto, $pos, self::ERROR, "propiedad `{$attr}` en `{$nombre}`: ¿quisiste decir `{$prop}`?");
                        break;
                    }
                }
            }
        }
    }

    protected function esAtributoLibre(string $attr): bool
    {
        return in_array($attr, self::ATRIBUTOS_LIBRES, true)
            || preg_match('/^(wire:|x-|data-|aria-|@|v-|:)/', $attr) === 1;
    }

    protected function iconosSinNombre(string $texto, array &$h): void
    {
        preg_match_all('#<(button|a)\b([^>]*)>\s*<i\s+class="ri-[^"]*"\s*>\s*</i>\s*</\1>#i', $texto, $m, PREG_SET_ORDER | PREG_OFFSET_CAPTURE);

        foreach ($m as $b) {
            if (! preg_match('/aria-label|aria-labelledby|\btitle\s*=/', $b[2][0])) {
                $this->agregar($h, $texto, $b[0][1], self::ERROR, 'ícono solo sin `aria-label`: nadie sabrá qué hace');
            }
        }
    }

    protected function coloresDeBootstrap(string $texto, array &$h): void
    {
        preg_match_all('/(?<![\w:-])class\s*=\s*"([^"]*)"/', $texto, $m, PREG_OFFSET_CAPTURE);

        foreach ($m[1] as [$valor, $pos]) {
            if (preg_match('/(?<![\w-])((?:bg|text|border)-(?:primary|secondary|success|danger|warning|info|dark))(?![\w-])/', $valor, $c)) {
                $this->agregar($h, $texto, $pos, self::AVISO, "clase de color de Bootstrap `{$c[1]}`: usa un componente (`state`, `alert`) o un token");
            }
        }
    }

    protected function botonesPrincipales(string $texto, array &$h): void
    {
        $principales = [];

        preg_match_all('#<x-maristas::button((?:"[^"]*"|\'[^\']*\'|[^>"\'])*)>#', $texto, $m, PREG_SET_ORDER | PREG_OFFSET_CAPTURE);
        foreach ($m as $b) {
            if (! preg_match('/\bvariant\s*=/', $b[1][0]) || preg_match('/\bvariant\s*=\s*"primary"/', $b[1][0])) {
                $principales[] = $b[0][1];
            }
        }

        preg_match_all('/class\s*=\s*"[^"]*\bbtn-primary\b[^"]*"/', $texto, $m, PREG_OFFSET_CAPTURE);
        foreach ($m[0] as [, $pos]) {
            $principales[] = $pos;
        }

        if (count($principales) > 1) {
            sort($principales);
            $this->agregar($h, $texto, $principales[1], self::AVISO, 'hay '.count($principales).' botones principales en la vista: debería haber uno solo (los de un modal cuentan aparte)');
        }
    }
}

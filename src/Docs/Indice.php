<?php

namespace Maristas\UiKit\Docs;

use Illuminate\Support\Str;

/**
 * Índice de búsqueda de la documentación: páginas y ejemplos con título.
 * Lo consume la paleta Cmd/Ctrl + K.
 */
class Indice
{
    protected static ?array $cache = null;

    /** Olvida el índice generado (sus direcciones dependen de la raíz de URL del momento). */
    public static function reiniciar(): void
    {
        static::$cache = null;
    }

    /** @return array<int, array{tipo: string, titulo: string, pagina: string, grupo: string, texto: string, url: string}> */
    public static function generar(): array
    {
        if (static::$cache !== null) {
            return static::$cache;
        }

        $entradas = [];

        foreach (Catalogo::paginas() as $slug => $pagina) {
            $url = route('maristas-ui.docs', $slug === 'introduccion' ? null : $slug);
            $descripcion = trim(html_entity_decode(strip_tags($pagina['descripcion'])));

            $entradas[] = [
                'tipo' => 'pagina',
                'titulo' => $pagina['titulo'],
                'pagina' => $pagina['titulo'],
                'grupo' => $pagina['grupo'],
                'texto' => $descripcion,
                'url' => $url,
            ];

            foreach (GuiaIA::ejemplosDe($slug) as $ejemplo) {
                if (! $ejemplo['titulo']) {
                    continue;
                }

                $entradas[] = [
                    'tipo' => 'ejemplo',
                    'titulo' => $ejemplo['titulo'],
                    'pagina' => $pagina['titulo'],
                    'grupo' => $pagina['grupo'],
                    'texto' => trim(html_entity_decode(strip_tags((string) $ejemplo['nota']))),
                    'url' => $url.'#'.Str::slug($ejemplo['titulo']),
                ];
            }
        }

        return static::$cache = $entradas;
    }
}

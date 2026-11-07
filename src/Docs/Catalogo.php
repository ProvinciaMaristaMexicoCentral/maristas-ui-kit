<?php

namespace Maristas\UiKit\Docs;

/**
 * Índice de la documentación: grupos, páginas y su descripción.
 */
class Catalogo
{
    public static function grupos(): array
    {
        return [
            'Empezar' => [
                'introduccion' => ['titulo' => 'Introducción', 'descripcion' => ''],
                'uso' => ['titulo' => 'Cómo usarlo', 'descripcion' => 'Tres pasos para una pantalla nueva o una que se migre.'],
                'ia' => ['titulo' => 'Para asistentes de IA', 'descripcion' => 'Una guía en Markdown generada desde este mismo kit, para que Claude, Copilot o Cursor escriban pantallas que respeten el sistema de diseño.'],
            ],
            'Fundamentos' => [
                'colores' => ['titulo' => 'Colores', 'descripcion' => 'La marca es el azul institucional. Los estados (éxito, atención, error, información) son independientes de la marca y nunca se usan como acento decorativo.'],
                'tipografia' => ['titulo' => 'Tipografía', 'descripcion' => 'Una sola familia, Poppins, en pesos 400, 500, 600 y 700. La jerarquía se logra con tamaño y peso, no con mayúsculas ni con color.'],
                'iconos' => ['titulo' => 'Íconos', 'descripcion' => 'Usamos Remix Icon (<code>ri-*</code>), en estilo de línea. Haz clic en un ícono para copiar su clase. Un ícono acompaña al texto; si va solo, necesita <code>aria-label</code>.'],
                'forma' => ['titulo' => 'Forma y espacio', 'descripcion' => 'Tres radios según el tamaño del elemento, una sola sombra para las tarjetas, espaciado en múltiplos de 4px y un margen de página compartido.'],
                'accesibilidad' => ['titulo' => 'Accesibilidad', 'descripcion' => 'Mínimos que todo componente del kit cumple y que toda pantalla debe respetar.'],
            ],
            'Entradas' => [
                'botones' => ['titulo' => 'Botones', 'descripcion' => 'Un botón principal por vista. Los demás son secundarios. Todos comparten alto, radio, tipografía y estados; el deshabilitado es azul claro, nunca gris.'],
                'formularios' => ['titulo' => 'Formularios', 'descripcion' => 'Etiqueta pequeña arriba, campo con radio medio y un anillo azul al enfocar. El mismo estilo para campos, selectores y áreas de texto. Los errores dicen qué pasó y cómo corregirlo.'],
                'seleccion' => ['titulo' => 'Selectores y etiquetas', 'descripcion' => 'Para elegir entre muchas opciones o capturar varias etiquetas sin salir del formulario.'],
                'fecha' => ['titulo' => 'Fecha, hora y rango', 'descripcion' => 'Fechas, horas y rangos con los controles nativos del navegador, con el mismo aspecto que el resto de los campos.'],
                'archivos' => ['titulo' => 'Carga de archivos', 'descripcion' => 'Una zona para arrastrar o elegir archivos y una lista que muestra el avance de cada uno.'],
            ],
            'Datos' => [
                'disclosure' => ['titulo' => 'Acordeón y listas', 'descripcion' => 'Para ocultar detalle secundario sin perderlo, y para mostrar elementos que se escanean uno tras otro.'],
                'avatares' => ['titulo' => 'Avatares', 'descripcion' => 'Iniciales sobre un fondo de marca. Tres tamaños y una versión suave para filas de tabla.'],
                'estados' => ['titulo' => 'Estados y chips', 'descripcion' => 'Una etiqueta de estado dice una cosa y usa un color semántico. Nunca se usa el color de marca para un estado.'],
                'tablas' => ['titulo' => 'Tablas', 'descripcion' => 'Encabezado en gris sobre fondo suave, filas con separadores finos y resaltado al pasar el cursor. Los estados van como etiquetas y las acciones de fila en un menú.'],
                'tablas-datos' => ['titulo' => 'Tablas de datos', 'descripcion' => 'Tabla con búsqueda, filtros, orden por columna, selección de filas y paginación. Funciona con un script ligero de JavaScript puro; no necesita Alpine, Livewire ni jQuery.'],
                'tarjetas' => ['titulo' => 'Tarjetas y cifras', 'descripcion' => 'La tarjeta agrupa una idea. Solo la cifra que es el punto de la pantalla se destaca como indicador; no todo número merece una tarjeta.'],
            ],
            'Retroalimentación' => [
                'alertas' => ['titulo' => 'Alertas y avisos', 'descripcion' => 'Una alerta explica qué pasó y qué hacer. Se queda en la página hasta que se resuelve. Un aviso temporal (toast) confirma una acción y desaparece solo.'],
                'feedback' => ['titulo' => 'Progreso y carga', 'descripcion' => 'Mientras algo carga se muestra la forma de lo que vendrá; si no se puede saber cuánto falta, un indicador giratorio.'],
            ],
            'Navegación' => [
                'barra' => ['titulo' => 'Barra principal', 'descripcion' => 'Una barra con dos niveles: arriba la marca y las herramientas de la persona (institución, notificaciones, perfil); abajo la navegación. Lo de uso diario va suelto y lo demás se agrupa en menús desplegables.'],
                'navegacion' => ['titulo' => 'Pestañas y migas', 'descripcion' => 'Pestañas para cambiar de contenido dentro de una misma página; filtros en píldora para acotar una lista; ruta de migas para ubicarse.'],
                'menus' => ['titulo' => 'Menús desplegables', 'descripcion' => 'Un menú agrupa acciones relacionadas detrás de un solo botón. Úsalo cuando la pantalla no tiene espacio para todas.'],
                'pasos' => ['titulo' => 'Pasos', 'descripcion' => 'Indica en qué punto de un proceso largo está la persona y qué falta.'],
            ],
            'Superposiciones' => [
                'overlays' => ['titulo' => 'Ventanas y capas', 'descripcion' => 'Modal para decidir o capturar algo sin salir de la página (un editor largo, como redactar un mensaje, va en modal grande con scroll y sin cerrarse al hacer clic fuera); panel lateral para tareas más largas; globos de ayuda para aclarar sin ocupar espacio.'],
            ],
            'Patrones' => [
                'patrones' => ['titulo' => 'Patrones de página', 'descripcion' => 'Composiciones completas hechas con los componentes del kit y pensadas para cualquier sistema Maristas. Se copian tal cual y se cambian los datos. Los textos de estos ejemplos son ficticios.'],
            ],
        ];
    }

    /** @return array<string, array{slug: string, titulo: string, descripcion: string, grupo: string}> */
    public static function paginas(): array
    {
        $paginas = [];

        foreach (static::grupos() as $grupo => $items) {
            foreach ($items as $slug => $datos) {
                $paginas[$slug] = ['slug' => $slug, 'grupo' => $grupo] + $datos;
            }
        }

        return $paginas;
    }

    public static function pagina(string $slug): ?array
    {
        return static::paginas()[$slug] ?? null;
    }

    /** @return array{0: ?array, 1: ?array} anterior y siguiente */
    public static function vecinas(string $slug): array
    {
        $claves = array_keys(static::paginas());
        $i = array_search($slug, $claves, true);

        if ($i === false) {
            return [null, null];
        }

        $paginas = static::paginas();

        return [
            isset($claves[$i - 1]) ? $paginas[$claves[$i - 1]] : null,
            isset($claves[$i + 1]) ? $paginas[$claves[$i + 1]] : null,
        ];
    }
}

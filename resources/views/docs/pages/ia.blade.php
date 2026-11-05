<div class="row g-3 mb-4">
    <div class="col-md-6">
        <a class="mr-tile" href="{{ route('maristas-ui.ia') }}" target="_blank" rel="noopener">
            <span class="mr-tile-icon"><i class="ri-file-text-line"></i></span>
            <span><strong>Guía completa</strong><span class="d-block mr-small">Reglas, tokens, componentes, clases y todos los ejemplos.</span></span>
            <i class="ri-external-link-line ms-auto text-muted"></i>
        </a>
    </div>
    <div class="col-md-6">
        <a class="mr-tile" href="{{ route('maristas-ui.ia', ['resumen' => 1]) }}" target="_blank" rel="noopener">
            <span class="mr-tile-icon"><i class="ri-list-check-2"></i></span>
            <span><strong>Resumen</strong><span class="d-block mr-small">Lo mismo sin ejemplos, para contextos pequeños.</span></span>
            <i class="ri-external-link-line ms-auto text-muted"></i>
        </a>
    </div>
</div>

<x-maristas::example title="Genera la guía en tu proyecto" note="La guía no se escribe a mano: sale de los tokens del CSS, las propiedades de los componentes y los ejemplos de esta documentación, así que siempre coincide con la versión instalada.">
    <div class="w-100"><x-maristas::state tone="info">php artisan maristas-ui:ia --agentes</x-maristas::state></div>
    <x-slot:code>
@verbatim
# Escribe docs/maristas-ui.md y avisa a Claude Code, Cursor y Copilot
php artisan maristas-ui:ia --agentes

# Solo el resumen, sin ejemplos
php artisan maristas-ui:ia --resumen

# En otra ruta
php artisan maristas-ui:ia --ruta=storage/maristas-ui.md
@endverbatim
    </x-slot:code>
</x-maristas::example>

<x-maristas::example title="Qué hace --agentes" note="Agrega un bloque entre marcas a CLAUDE.md y AGENTS.md (si no existe ninguno, crea AGENTS.md). Volver a ejecutarlo actualiza ese bloque sin tocar el resto del archivo.">
    <div class="w-100 mr-small">Los asistentes leen esos archivos al abrir el proyecto, así que la regla «usa el kit, no inventes estilos» queda activa sin que tengas que repetirla en cada petición.</div>
    <x-slot:code>
@verbatim
<!-- maristas-ui:inicio -->
## Interfaz de usuario

Toda pantalla nueva o modificada usa el Maristas UI Kit. Antes de escribir vistas lee `docs/maristas-ui.md` y sigue sus reglas: componentes `x-maristas::*`, clases `.mr-*` y tokens `--maristas-*`; no inventes estilos.
<!-- maristas-ui:fin -->
@endverbatim
    </x-slot:code>
</x-maristas::example>

<x-maristas::example title="Cómo pedirle una pantalla" note="Con la guía en el proyecto basta con describir qué necesitas; no hace falta explicar el diseño.">
    <div class="w-100 mr-small">Pide el resultado y las acciones, y deja que el asistente elija componentes.</div>
    <x-slot:code>
@verbatim
Crea la pantalla de «Documentos del aspirante»: una tabla con búsqueda y
filtro por estado, selección de filas con acción en lote «Solicitar de nuevo»
y un botón principal «Agregar documento». Usa el Maristas UI Kit.
@endverbatim
    </x-slot:code>
</x-maristas::example>

<x-maristas::rule :do="true"><strong>Qué contiene la guía</strong> Reglas obligatorias, tokens <code>--maristas-*</code>, propiedades de cada componente <code>x-maristas::*</code>, la lista completa de clases <code>.mr-*</code> y el código de cada ejemplo del catálogo.</x-maristas::rule>
<x-maristas::rule :do="false" class="mt-2"><strong>No la edites a mano</strong> Para cambiar una regla de diseño, cámbiala en el kit y regenera la guía en cada proyecto.</x-maristas::rule>

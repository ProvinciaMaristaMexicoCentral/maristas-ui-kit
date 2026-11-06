<x-maristas::example title="Autocompletar" note="Un campo de texto con sugerencias nativas (datalist): rápido de escribir y accesible por teclado.">
    <div class="w-100" style="max-width: 360px;">
        <label class="form-label" for="mr-inst">Institución</label>
        <input id="mr-inst" class="form-control" list="mr-inst-lista" placeholder="Escribe para buscar">
        <datalist id="mr-inst-lista">
            <option value="Instituto México Primaria"><option value="Colegio Champagnat"><option value="Instituto Hispano Inglés"><option value="Colegio Cristóbal Colón">
        </datalist>
    </div>
</x-maristas::example>

<x-maristas::example title="Etiquetas" note="Escribe y presiona Enter o coma para agregar; cada etiqueta se quita con su ×. Se activa con data-mr-tags.">
    <div class="w-100" style="max-width: 460px;">
        <label class="form-label" for="mr-tags-input">Intereses del aspirante</label>
        <div class="mr-tags" data-mr-tags data-mr-tags-name="intereses[]">
            <span class="mr-tag">Deportes<button type="button" aria-label="Quitar Deportes">&times;</button></span>
            <span class="mr-tag">Música<button type="button" aria-label="Quitar Música">&times;</button></span>
            <input id="mr-tags-input" type="text" placeholder="Agregar…">
        </div>
        <div class="form-text">Máximo 8 etiquetas.</div>
    </div>
</x-maristas::example>

<x-maristas::example title="Selección múltiple" note="Un menú con casillas que no se cierra al elegir; el botón resume cuántas hay marcadas.">
    <div class="dropdown" data-mr-multiselect>
        <button type="button" class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"><i class="ri-filter-3-line"></i><span data-mr-multiselect-label>Grados</span></button>
        <div class="dropdown-menu p-2" style="min-width: 220px;">
            @foreach (['Preescolar', 'Primaria', 'Secundaria', 'Bachillerato'] as $grado)
                <label class="dropdown-item d-flex align-items-center gap-2 mb-0"><input class="form-check-input mt-0" type="checkbox" value="{{ $grado }}">{{ $grado }}</label>
            @endforeach
        </div>
    </div>
</x-maristas::example>

<x-maristas::example title="Selección múltiple con buscador y etiquetas" note="Para listas largas: busca dentro del menú y muestra lo elegido como etiquetas que se quitan con su ×. Las casillas se envían con el formulario.">
    <div class="w-100" style="max-width: 460px;">
        <label class="form-label" id="kit-ms-label">Instituciones</label>
        <x-maristas::multiselect name="instituciones[]" placeholder="Selecciona instituciones" search-placeholder="Buscar institución…"
            :options="['1' => 'Instituto México Primaria', '2' => 'Instituto México Secundaria', '3' => 'Colegio Champagnat', '4' => 'Colegio Cristóbal Colón', '5' => 'Instituto Zaragoza', '6' => 'Colegio Montferrant']" :selected="['2']" />
    </div>
    <x-slot:code>
@verbatim
<x-maristas::multiselect
    name="instituciones[]"
    placeholder="Selecciona instituciones"
    search-placeholder="Buscar institución…"
    :options="$instituciones->pluck('nombre', 'id')"
    :selected="old('instituciones', $usuario->instituciones->pluck('id'))"
    :invalid="$errors->has('instituciones')" />
@endverbatim
    </x-slot:code>
</x-maristas::example>

<div class="row g-3">
    <div class="col-md-6"><x-maristas::rule>Con 5 opciones o menos usa casillas o botones de opción visibles. Reserva el selector para listas largas.</x-maristas::rule></div>
    <div class="col-md-6"><x-maristas::rule :do="false">No uses un selector múltiple sin mostrar cuántas opciones hay marcadas.</x-maristas::rule></div>
</div>

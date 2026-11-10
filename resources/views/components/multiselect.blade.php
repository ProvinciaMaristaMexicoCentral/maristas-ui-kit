{{-- Selección múltiple con buscador y etiquetas. Las casillas se envían con el formulario: name="instituciones[]". --}}
@props([
    'name',
    'options' => [],
    'selected' => [],
    'placeholder' => 'Selecciona opciones',
    'searchPlaceholder' => 'Buscar…',
    'emptyText' => 'No se encontraron resultados',
    'invalid' => false,
])
@php($selected = collect($selected)->map(fn ($v) => (string) $v)->all())
<div {{ $attributes->merge(['class' => 'mr-multi']) }} data-mr-multiselect>
    <div class="dropdown">
        <button type="button" class="form-select text-start {{ $invalid ? 'is-invalid' : '' }}" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false" aria-haspopup="listbox"><span data-mr-multiselect-label>{{ $placeholder }}</span></button>
        <div class="dropdown-menu w-100">
            <div class="p-2"><input type="search" class="form-control form-control-sm" placeholder="{{ $searchPlaceholder }}" aria-label="{{ $searchPlaceholder }}" data-mr-multiselect-filter autocomplete="off"></div>
            <div class="mr-multi-options">
                @foreach ($options as $value => $label)
                    <label class="dropdown-item d-flex align-items-center gap-2 mb-0"><input class="form-check-input mt-0" type="checkbox" name="{{ $name }}" value="{{ $value }}" @checked(in_array((string) $value, $selected, true))>{{ $label }}</label>
                @endforeach
            </div>
            <div class="mr-small px-2 py-1" data-mr-multiselect-empty hidden>{{ $emptyText }}</div>
        </div>
    </div>
    <div class="mr-multi-chips" data-mr-multiselect-chips></div>
</div>

@props(['target', 'locked' => false, 'label' => 'Editar', 'lockedLabel' => 'Bloqueado', 'title' => null, 'lockedTitle' => 'No se puede editar en esta etapa'])
@if ($locked)
    <button type="button" class="mr-chip mr-chip-action" disabled title="{{ $lockedTitle }}"><i class="ri-lock-line"></i>{{ $lockedLabel }}</button>
@else
    <button type="button" {{ $attributes->merge(['class' => 'mr-chip mr-chip-action']) }} data-bs-toggle="modal" data-bs-target="{{ $target }}" @if ($title) title="{{ $title }}" @endif><i class="ri-pencil-fill"></i>{{ $label }}</button>
@endif

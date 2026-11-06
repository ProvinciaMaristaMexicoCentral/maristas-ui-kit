@props(['target', 'locked' => false, 'label' => 'Editar', 'lockedLabel' => 'Bloqueado', 'title' => null, 'lockedTitle' => 'No se puede editar en esta etapa'])
@if ($locked)
    <button type="button" class="btn btn-sm mr-btn-dashed" disabled title="{{ $lockedTitle }}"><i class="ri-lock-line"></i>{{ $lockedLabel }}</button>
@else
    <button type="button" {{ $attributes->merge(['class' => 'btn btn-sm mr-btn-dashed']) }} data-bs-toggle="modal" data-bs-target="{{ $target }}" @if ($title) title="{{ $title }}" @endif><i class="ri-pencil-fill"></i>{{ $label }}</button>
@endif

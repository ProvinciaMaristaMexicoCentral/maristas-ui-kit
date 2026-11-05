@props(['tone' => 'info', 'icon' => null, 'dismissible' => false])
@php
    $iconos = ['info' => 'ri-information-line', 'success' => 'ri-checkbox-circle-line', 'warning' => 'ri-error-warning-line', 'danger' => 'ri-alert-line'];
@endphp
<div {{ $attributes->merge(['class' => 'alert alert-'.$tone.' d-flex align-items-center gap-2 py-2 '.($dismissible ? 'alert-dismissible fade show' : ''), 'role' => 'alert']) }}>
    <i class="{{ $icon ?? ($iconos[$tone] ?? $iconos['info']) }} fs-5 flex-shrink-0"></i>
    <div class="flex-grow-1 lh-sm">{{ $slot }}</div>
    @if ($dismissible)<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>@endif
</div>

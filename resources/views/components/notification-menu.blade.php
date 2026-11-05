{{-- Campanita con contador y panel. Slots: por defecto (las notificaciones), actions (junto al título) y footer. --}}
@props(['count' => 0, 'title' => 'Notificaciones'])
<div class="dropdown">
    <button type="button" class="mr-topbar-btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" aria-label="{{ $title }}{{ $count > 0 ? ', '.$count.' sin leer' : '' }}">
        <i class="ri-notification-3-line"></i>
        @if ($count > 0)<span class="mr-topbar-count">{{ $count > 99 ? '99+' : $count }}</span>@endif
    </button>
    <div class="dropdown-menu dropdown-menu-end mr-topbar-panel">
        <div class="mr-menu-head d-flex justify-content-between align-items-center"><strong class="d-inline">{{ $title }}</strong>{{ $actions ?? '' }}</div>
        <div class="mr-scroll-menu">{{ $slot }}</div>
        @isset($footer)<div class="border-top mt-1 pt-1">{{ $footer }}</div>@endisset
    </div>
</div>

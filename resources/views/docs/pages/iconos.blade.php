<div class="mr-icons">
    @foreach ([
        'ri-user-line' => 'Persona', 'ri-user-smile-line' => 'Alumno', 'ri-phone-line' => 'Teléfono', 'ri-mail-line' => 'Correo',
        'ri-mail-send-line' => 'Enviado', 'ri-mail-open-line' => 'Bandeja', 'ri-sticky-note-line' => 'Nota', 'ri-calendar-event-line' => 'Actividad',
        'ri-contacts-fill' => 'Seguimiento', 'ri-history-line' => 'Historial', 'ri-book-open-line' => 'Oferta', 'ri-building-line' => 'Institución',
        'ri-attachment-2' => 'Adjunto', 'ri-edit-2-line' => 'Redactar', 'ri-pencil-fill' => 'Editar', 'ri-delete-bin-line' => 'Eliminar',
        'ri-check-line' => 'Confirmar', 'ri-close-line' => 'Cerrar', 'ri-search-line' => 'Buscar', 'ri-filter-3-line' => 'Filtrar',
        'ri-lock-line' => 'Bloqueado', 'ri-alert-line' => 'Alerta', 'ri-information-line' => 'Información', 'ri-reply-line' => 'Responder',
        'ri-arrow-down-line' => 'Recibido', 'ri-arrow-up-line' => 'Enviado (flecha)', 'ri-more-2-fill' => 'Más acciones', 'ri-download-2-line' => 'Descargar',
    ] as $clase => $nombre)
        <button type="button" class="mr-icon-tile" onclick="navigator.clipboard?.writeText('{{ $clase }}')" title="Copiar {{ $clase }}">
            <i class="{{ $clase }}"></i>
            <span>{{ $nombre }}</span>
            <code>{{ $clase }}</code>
        </button>
    @endforeach
</div>
    

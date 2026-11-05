@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        if (!window.bootstrap) return;
        document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(function (el) { new bootstrap.Tooltip(el); });
        document.querySelectorAll('[data-bs-toggle="popover"]').forEach(function (el) { new bootstrap.Popover(el); });
        var boton = document.getElementById('kit-toast-btn');
        var toast = document.getElementById('kit-toast');
        if (boton && toast) boton.addEventListener('click', function () { bootstrap.Toast.getOrCreateInstance(toast).show(); });
    });
</script>
@endpush

<!DOCTYPE html>
<html lang="es" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') · Maristas</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.3.0/fonts/remixicon.css" rel="stylesheet">
    <link href="{{ route('maristas-ui.css') }}" rel="stylesheet">
</head>
<body class="mr-scope">
    <main class="container-fluid py-4 px-lg-5">
        @yield('content')
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Botón de hamburguesa de la barra principal (pantallas angostas)
        document.addEventListener('click', function (e) {
            var boton = e.target.closest('[data-mr-toggle]');
            if (!boton) return;
            var panel = document.querySelector(boton.getAttribute('data-mr-toggle'));
            var abierto = panel.classList.toggle('is-open');
            boton.setAttribute('aria-expanded', abierto ? 'true' : 'false');
        });
    </script>
    @stack('scripts')
</body>
</html>

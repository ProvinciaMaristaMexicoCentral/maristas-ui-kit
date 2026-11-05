<?php

return [
    'docs' => [
        // Ruta de la página de documentación del kit.
        'route' => 'ui-kit',

        // Entornos donde se publica. En producción no existe.
        'environments' => ['local', 'testing'],

        // Middleware de la ruta (agrega 'auth' si la quieres protegida).
        'middleware' => ['web'],
    ],
];

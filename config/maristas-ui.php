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

    'lint' => [
        // Carpetas de vistas que maristas-ui:lint no revisa al recorrer un directorio (por ejemplo los
        // correos, que llevan colores fijos a propósito porque los clientes de correo no leen variables CSS).
        'excluir' => ['emails'],
    ],
];

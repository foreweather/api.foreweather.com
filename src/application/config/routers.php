<?php

use Bundle\System\Controllers\WelcomeController;

!defined('FILTER_NUMERIC') ? define('FILTER_NUMERIC', '{id:[0-9]+}') : null;

return [
    '/'       => [
        // Class, Method, Route, Handler, isPublic
        [WelcomeController::class, 'info', 'get', '', true],
        [WelcomeController::class, 'version', 'get', 'version', false],
    ]
];

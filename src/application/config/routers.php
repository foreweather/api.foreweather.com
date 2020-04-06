<?php

use Bundle\System\Controllers\WelcomeController;
use Bundle\System\Controllers\OAuthController;

!defined('FILTER_NUMERIC') ? define('FILTER_NUMERIC', '{id:[0-9]+}') : null;

return [
    '/'       => [
        // Class, Method, Route, Handler, isPublic
        [WelcomeController::class, 'info', 'get', '', true],
        [WelcomeController::class, 'version', 'get', 'version', false],
    ],
    '/oauth2' => [
        // Class, Method, Route, Handler, isPublic
        [OAuthController::class, 'token', 'post', '/token', true],
    ],
];


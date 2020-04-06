<?php

use Middleware\OAuthMiddleware;
use Middleware\ResponseMiddleware;

return [
    ResponseMiddleware::class => 'after',
    OAuthMiddleware::class    => 'before',
];

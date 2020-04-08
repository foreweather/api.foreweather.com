<?php

use Middleware\NotFoundMiddleware;
use Middleware\OAuthMiddleware;
use Middleware\ResponseMiddleware;

return [
    NotFoundMiddleware::class => 'before',
    OAuthMiddleware::class    => 'before',
    ResponseMiddleware::class => 'after',
];

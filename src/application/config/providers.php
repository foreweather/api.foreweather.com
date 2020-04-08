<?php

use Providers\ConfigProvider;
use Providers\DatabaseProvider;
use Providers\ErrorHandlerProvider;
use Providers\LoggerProvider;
use Providers\RequestProvider;
use Providers\ResponseProvider;
use Providers\RouterProvider;
use Providers\OAuthProvider;

/**
 * Provider class names
 */
return [
    ResponseProvider::class,
    RequestProvider::class,
    ConfigProvider::class,
    DatabaseProvider::class,
    LoggerProvider::class,
    ErrorHandlerProvider::class,
    OAuthProvider::class,
    RouterProvider::class,

];

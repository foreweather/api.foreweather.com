<?php

use Providers\ConfigProvider;
use Providers\DatabaseProvider;
use Providers\RequestProvider;
use Providers\ResponseProvider;
use Providers\RouterProvider;

/**
 * Provider class names
 */
return [
    ConfigProvider::class,
    RouterProvider::class,
    RequestProvider::class,
    ResponseProvider::class,
    DatabaseProvider::class
];

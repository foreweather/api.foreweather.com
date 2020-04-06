<?php

use Phalcon\Loader;

include_once '../application/config/env.php';
include_once '../vendor/autoload.php';

$loader = new Loader();
$loader->registerNamespaces(
    [
        'Providers'   => '../library/Providers',
        'Middleware'   => '../library/Middleware',
        'Foreweather' => '../library/Foreweather',
        'Bundle'      => '../application/service/Bundle',
    ]
);
$loader->register();

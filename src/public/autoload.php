<?php

use Phalcon\Loader;

include_once '../vendor/autoload.php';

$loader = new Loader();
$loader->registerNamespaces(
    [
        'Providers'   => '../library/Providers',
        'Foreweather' => '../library/Foreweather',
        'Bundle'      => '../application/service/Bundle',
    ]
);
$loader->register();

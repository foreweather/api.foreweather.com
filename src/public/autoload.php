<?php

use Phalcon\Loader;

include_once '../vendor/autoload.php';

$loader = new Loader();
$loader->registerNamespaces(
    [
        'Providers'   => '../library/Providers',
    ]
);
$loader->register();

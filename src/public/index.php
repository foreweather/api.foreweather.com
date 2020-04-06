<?php
declare(strict_types=1);

include_once 'autoload.php';

use Foreweather\Phalcon\Mvc\Micro\Api;

defined('APPLICATION_ENV') || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ?
    getenv('APPLICATION_ENV') : 'development'));

$providers = require_once '../application/config/providers.php';

$api = new Api();
$api->setup($providers);
$api->run();

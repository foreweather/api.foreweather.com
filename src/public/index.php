<?php
declare(strict_types=1);

include_once 'autoload.php';

use Foreweather\Phalcon\Mvc\Micro\Api;

/**
 * Define application environment
 */
defined('APPLICATION_ENV') || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ?
    getenv('APPLICATION_ENV') : 'development'));

try {
    $api = new Api();
    $api->setup(require_once '../application/config/providers.php');

    /**
     * Run application
     */
    $api->run();
} catch (Exception $e) {
    echo $e->getMessage();
}

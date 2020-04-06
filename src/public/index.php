<?php

declare(strict_types=1);

defined('APPLICATION_ENV') || define('APPLICATION_ENV', (getenv('APPLICATION_ENV') ?
    getenv('APPLICATION_ENV') : 'development'));

include_once 'autoload.php';

echo 'Hello Weather';


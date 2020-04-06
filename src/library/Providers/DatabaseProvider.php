<?php
declare(strict_types=1);


namespace Providers;

use Phalcon\Di\DiInterface;
use Phalcon\Di\ServiceProviderInterface;

/**
 * Database connection is created based in the parameters defined in the configuration file
 */
class DatabaseProvider implements ServiceProviderInterface
{
    /**
     * Registers a service provider.
     *
     * @param DiInterface $di
     *
     * @return void
     */
    public function register(DiInterface $di): void
    {
        $config = $di->getShared('config')->get('database')->toArray();

        $di->setShared(
            'db',
            function () use ($config) {
                $db = 'Phalcon\Db\Adapter\Pdo\\' . $config['adapter'];
                unset($config['adapter']);

                return new $db($config);
            }
        );
    }
}

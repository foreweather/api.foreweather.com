<?php

namespace Foreweather\Phalcon\Mvc\Micro;

use Phalcon\Di\FactoryDefault;
use Phalcon\Di\FactoryDefault\Cli;
use Phalcon\Di\ServiceProviderInterface;
use Phalcon\Mvc\Micro;

abstract class AbstractBootstrapApp implements BootstrapAppInterface
{
    /**
     * @var Micro|Cli
     */
    protected $application;
    /**
     * @var array
     */
    protected $providers = [];

    /**
     * @var FactoryDefault|Cli
     */
    protected $di;

    /**
     * @param array $providers
     */
    public function setup(array $providers = []): void
    {
        $this->providers = $providers;
        $this->di->set('metrics', microtime(true));
    }

    /**
     * Registers available services
     *
     * @return void
     */
    protected function registerServices()
    {
        foreach ($this->providers as $provider) {
            /**
             * @var ServiceProviderInterface $object
             */
            $object = (new $provider());
            $object->register($this->di);
        }
    }

    /**
     * Run the application
     */
    public function run(): void
    {
        $this->application->handle($_SERVER['REQUEST_URI']);
    }
}

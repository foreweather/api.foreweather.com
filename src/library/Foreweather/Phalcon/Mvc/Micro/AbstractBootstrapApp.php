<?php

namespace Foreweather\Phalcon\Mvc\Micro;

use Phalcon\Di\FactoryDefault;
use Phalcon\Di\FactoryDefault\Cli;
use Phalcon\Di\ServiceProviderInterface;

abstract class AbstractBootstrapApp implements BootstrapAppInterface
{
    /**
     * @var array
     */
    protected $providers = [];

    /**
     * @var FactoryDefault|Cli
     */
    protected $di;

    /**
     * Run the application
     */
    abstract public function run(): void;

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
}

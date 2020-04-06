<?php

namespace Foreweather\Phalcon\Mvc\Micro;

use Phalcon\Di\FactoryDefault;
use Phalcon\Mvc\Micro;

class Api extends AbstractBootstrapApp implements BootstrapAppInterface
{
    /**
     * Setup the application
     *
     * @param array $providers
     */
    public function setup(array $providers = []): void
    {
        $this->di = new FactoryDefault();
        parent::setup($providers);

        $this->setupApplication();

        $this->registerServices();
    }

    /**
     * Setup the application object in the di
     *
     * @return void
     */
    protected function setupApplication()
    {
        $this->application = new Micro($this->di);
        $this->di->setShared('application', $this->application);
    }
}

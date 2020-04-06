<?php

namespace Foreweather\Phalcon\Mvc\Micro;

interface BootstrapAppInterface
{
    /**
     * Setup the application
     *
     * @param array $providers
     */
    public function setup(array $providers = []): void;

    /**
     * Run the application
     */
    public function run(): void;
}

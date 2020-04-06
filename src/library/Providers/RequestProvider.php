<?php

namespace Providers;

use Foreweather\Phalcon\Http\Request;
use Phalcon\Di\ServiceProviderInterface;
use Phalcon\Di\DiInterface;

class RequestProvider implements ServiceProviderInterface
{
    /**
     * @param DiInterface $di
     */
    public function register(DiInterface $di): void
    {
        $routes = $this->getRoutes();
        $public_resources = [];

        foreach ($routes as $prefix => $group) {
            foreach ($group as $route) {
                if (isset($route[4]) && $route['4'] === true) {
                    $route[2] = strtoupper($route[2]);
                    $route[5] = $prefix.$route[3];
                    $public_resources[] = $route;
                }
            }
        }

        $di->setShared('request', new Request($public_resources));
    }

    /**
     * Returns the array for the routes
     *
     * @return array
     */
    private function getRoutes(): array
    {
        $routes = include '../application/config/routers.php';
        return $routes;
    }
}

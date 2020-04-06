<?php

namespace Foreweather\Phalcon\Http;

use Phalcon\Http\Request as PhalconRequest;
use Phalcon\Mvc\Router\RouteInterface;

class Request extends PhalconRequest
{
    private $public_resources = [];

    public function __construct(array $public_resources = [])
    {
        $this->public_resources = $public_resources;
    }


    /**
     * @param RouteInterface $matched_route
     *
     * @return bool
     */
    public function isPublic($matched_route): bool
    {
        foreach ($this->public_resources as $resource) {
            if (($resource[5] === $matched_route->getPattern()) && $resource[2] == $this->getMethod()) {
                return true;
            }
        }
        return false;
    }
}

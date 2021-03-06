<?php

namespace Middleware;

use Foreweather\Phalcon\Http\Response;
use Phalcon\Mvc\Micro;
use Phalcon\Mvc\Micro\MiddlewareInterface;

/**
 * Class ResponseMiddleware
 *
 * @property Response $response
 */
class ResponseMiddleware implements MiddlewareInterface
{
    /**
     * Halt execution after setting the message in the response
     *
     * @param Micro  $api
     * @param string $message
     *
     * @return mixed
     */
    protected function halt(Micro $api, string $message)
    {
        /**
         * @var Response $response
         */
        $response = $api->getService('response');
        $response->notFound($message)->send();

        $api->stop();
    }

    /**
     * Call me
     *
     * @param Micro $api
     *
     * @return bool
     */
    public function call(Micro $api)
    {
        /**
         * @var Response $response
         */
        $response = $api->getService('response');
        $response->send();

        return true;
    }
}

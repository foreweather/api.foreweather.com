<?php
declare(strict_types=1);

namespace Middleware;

use Foreweather\Phalcon\Http\Response;
use Phalcon\Di\Injectable;
use Phalcon\Mvc\Micro;
use Phalcon\Mvc\Micro\MiddlewareInterface;

/**
 * Class NotFoundMiddleware
 *
 * @property Micro    $application
 * @property Response $response
 */
class NotFoundMiddleware extends Injectable implements MiddlewareInterface
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
     * Checks if the resource was found
     */
    public function beforeNotFound()
    {
        $this->halt(
            $this->application,
            $this->response->getHttpCodeDescription($this->response::NOT_FOUND)
        );

        return false;
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
        return true;
    }
}

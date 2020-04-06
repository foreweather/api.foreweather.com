<?php

namespace Providers;

use Foreweather\Phalcon\Http\Response;
use Phalcon\Di\ServiceProviderInterface;
use Phalcon\Di\DiInterface;

class ResponseProvider implements ServiceProviderInterface
{

    /**
     * @param DiInterface $di
     */
    public function register(DiInterface $di): void
    {
        $di->setShared(
            'response',
            function () {
                $response = new Response();

                /**
                 * Assume success. We will work with the edge cases in the code
                 */
                $response
                    ->setStatusCode(200)
                    ->setContentType('application/vnd.api+json', 'UTF-8')
                ;

                return $response;
            }
        );
    }
}

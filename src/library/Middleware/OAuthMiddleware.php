<?php


namespace Middleware;

use Foreweather\Phalcon\Http\Request;
use Foreweather\Phalcon\Http\Response;
use OAuth2\Server;
use Phalcon\Mvc\Micro;
use Phalcon\Mvc\Micro\MiddlewareInterface;

/**
 * Class OAuthMiddleware
 */
class OAuthMiddleware implements MiddlewareInterface
{
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
         * @var Request $request
         */
        $request = $api->getService('request');

        /**
         * @var Response $response
         */
        $response = $api->getService('response');

        /**
         * Check request is protected?
         */
        if (true !== $request->isPublic($api->getRouter()->getMatchedRoute())) {

            /**
             * @var Server $oauth
             */
            $oauth = $api->getService('oauth');

            $oauth_request  = \OAuth2\Request::createFromGlobals();
            $oauth_response = new \OAuth2\Response();

            $scope = '';

            if (!$oauth->verifyResourceRequest($oauth_request, $oauth_response, $scope)) {
                $response->unAuthorized($oauth_response->getParameter('error_description'))->send();
                $api->stop();
                return false;
            }
        }

        return true;
    }
}

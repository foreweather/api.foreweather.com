<?php

namespace Bundle\System\Controllers;

use Foreweather\Phalcon\Http\Response;
use OAuth2\Request;
use OAuth2\Server;
use Phalcon\Mvc\Controller;

/**
 * Class BaseController
 *
 * @property Response $response
 */
class OAuthController extends Controller
{
    /**
     * @return Response
     */
    public function token()
    {
        /**
         * @var Server $oauth
         */
        $oauth = $this->getDI()->get('oauth');

        $request = Request::createFromGlobals();

        /**
         * let the oauth2-server-php library do all the work!
         */
        $result = $oauth->handleTokenRequest($request);

        $access_token  = $result->getParameter('access_token');
        $expires_in    = $result->getParameter('expires_in');
        $token_type    = $result->getParameter('token_type');
        $scope         = $result->getParameter('scope');
        $refresh_token = $result->getParameter('refresh_token');

        if ($access_token) {
            return $this->response->success(
                [
                    'access_token'  => $access_token,
                    'refresh_token' => $refresh_token,
                    'expires_in'    => $expires_in,
                    'token_type'    => $token_type,
                    'scope'         => $scope,
                ]
            );
        }

        return $this->response->notFound($_POST);
    }
}

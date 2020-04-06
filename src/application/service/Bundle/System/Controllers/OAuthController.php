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
     *
     * @return Response
     *
     * @api      {post} /oauth2/token Request access token
     * @apiName  token
     * @apiGroup OAuth
     *
     * @apiParam {username} username.
     * @apiParam {password} password.
     * @apiParam {grant_type} New authorization grant types can be defined by assigning them a
     *                        unique absolute URI for use with the "grant_type" parameter..
     * @apiParam {client_id} client id .
     * @apiParam {client_secret} client secret
     *
     * @apiSuccess {String} access_token
     * @apiSuccess {String} expires_in
     * @apiSuccess {String} token_type
     * @apiSuccess {String} scope
     * @apiSuccess {String} refresh_token
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

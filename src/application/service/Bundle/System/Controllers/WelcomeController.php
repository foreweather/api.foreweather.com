<?php


namespace Bundle\System\Controllers;

use Foreweather\Phalcon\Http\Response;
use Phalcon\Mvc\Controller;

/**
 * Class BaseController
 *
 * @property Response            $response
 */
class WelcomeController extends Controller
{
    public function info()
    {
        $this->response->success(
            [
                'message' => 'Welcome to the Foreweather API v1.0.0',
                'detail' => 'You can check our documentation'
            ]
        );
    }

    public function version()
    {
        $this->response->success(
            [
                'message' => 'v1.0.0',
                'detail' => 'Test for public resource'
            ]
        );
    }
}

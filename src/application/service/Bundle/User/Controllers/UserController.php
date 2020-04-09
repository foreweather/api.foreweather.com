<?php


namespace Bundle\User\Controllers;

use BadFunctionCallException;
use DateTime;
use DateTimeZone;
use Exception;
use Foreweather\Phalcon\Http\Response;
use Phalcon\Image\Adapter\Gd;
use Phalcon\Image\Enum;
use Phalcon\Mvc\Controller;
use Bundle\User\Models\User;

/**
 * @property Response            $response
 */
class UserController extends Controller
{
    const LIMIT = 5;

    protected $exclude = ['password'];

    /**
     * @api      {post} /user/token Request access token
     * @apiName  token
     * @apiGroup OAuth
     * @apiParam {username} username.
     * @apiParam {password} password.
     * @apiParam {grant_type}   New authorization grant types can be defined by assigning them a unique absolute URI for
     *                          use with the "grant_type" parameter..
     * @apiParam {client_id} client id .
     * @apiParam {client_secret} client secret
     *
     * @apiSuccess {String} access_token
     * @apiSuccess {String} expires_in
     * @apiSuccess {String} token_type
     * @apiSuccess {String} scope
     * @apiSuccess {String} refresh_token
     */
    /**
     * @param $id
     *
     * @return Response
     */
    public function imageFile($id)
    {
        try {
            /**
             * @var User $data
             */
            $data = User::findFirst(array('user_id=' . $id));

            if (!$data) {
                return $this->response->notFound(
                    'User not exist or you dont have permission',
                    'API-REQ404',
                    baseUrl() . '/documentation/#api-Users'
                );
            }

            $code_base64 = str_replace('data:image/jpeg;base64,', '', $data->getPhotoBase64());
            $code_binary = base64_decode($code_base64);
            $image       = imagecreatefromstring($code_binary);
            header('Content-Type: image/jpeg');
            imagejpeg($image);
            imagedestroy($image);
        } catch (Exception $e) {
            return $this->response->badRequest(
                $e->getMessage(),
                null
            );
        }
    }

    public function image($id)
    {
        try {
            /**
             * @var User $data
             */
            $data = User::findFirst(array('user_id=' . $id));

            if (!$data) {
                return $this->response->notFound(
                    'User not exist or you dont have permission',
                    'API-REQ404',
                    baseUrl() . '/documentation/#api-Users'
                );
            }

            $filename = null;
            $base64   = null;
            if ($this->request->hasFiles() == true) {
                $filename = '/tmp/' . $data->getUserId() . '.jpg';

                foreach ($this->request->getUploadedFiles() as $file) {
                    $image = new Gd($file->getTempName());
                    $image->resize(300, 300, Enum::AUTO);
                    $image->render('jpeg', 100);
                    $image->save($filename);
                    $base64 = 'data:image/' . 'jpeg' . ';base64,' . base64_encode(file_get_contents($filename));
                }
            }

            $data->setPhoto($filename);
            $data->setPhotoBase64($base64);

            if ($data->validation()) {
                $data->save();
            }

            if (empty($data->getMessages())) {
                return $this->response->successNoContent();
            } else {
                return $this->response->badRequest(
                    $data->getMessages(),
                    null,
                    baseUrl() . '/documentation/#api-Users'
                );
            }
        } catch (Exception $e) {
            return $this->response->badRequest(
                $e->getMessage(),
                null
            );
        }
    }

    public function create()
    {
        try {
            $data = new User();

            $city = $this->request->getPost('city', 'string', false, false);
            if ($city && !is_array($city)) {
                $city = [$city];
            }

            $data->setEmail($this->request->getPost('email', 'email', false, false));
            $data->setCity($city);
            $data->setDevice($this->request->getPost('device', 'string', false, false));
            $data->setLanguage($this->request->getPost('language', 'string', false, false));
            $data->setOnesignalId($this->request->getPost('onesignal_id', 'string', false, false));
            $data->setPassword(sha1($this->request->getPost('password', 'string', false, false)));
            $data->setPhone($this->request->getPost('phone', 'string', false, false));
            $data->setTimezone($this->request->getPost('timezone', 'string', false, false));

            if ($data->validation()) {
                $data->save();

                if (empty($data->getMessages())) {
                    return $this->response->successCreated(
                        $data->toSafeArray(['password', 'photo_base64', 'photo'])
                    );
                }
            }

            return $this->response->badRequest(
                $data->getMessages(),
                null,
                baseUrl() . '/documentation/#api-Users'
            );
        } catch (Exception $e) {
            return $this->response->badRequest(
                $e->getMessage(),
                null,
                baseUrl() . '/documentation/#api-Users'
            );
        }
    }

    public function update($id)
    {
        try {
            /**
             * @var User $data
             */
            $data = User::findFirst(array('user_id=' . $id));

            if (!$data) {
                return $this->response->notFound(
                    'User not exist or you dont have permission',
                    'API-REQ404',
                    baseUrl() . '/documentation/#api-Users'
                );
            }

            if ($this->request->getPut('email', 'email', false, true)) {
                $data->setEmail($this->request->getPut('email'));
            }

            $city = $this->request->getPut('city', 'integer', false, true);
            if ($city && !is_array($city)) {
                $city = [$city];
            }

            if ($this->request->getPut('city', 'integer', false, true)) {
                $data->setCity($city);
            }
            if ($this->request->getPut('device', 'string', false, true)) {
                $data->setDevice($this->request->getPut('device'));
            }
            if ($this->request->getPut('onesignal_id', 'string', false, true)) {
                $data->setOnesignalId($this->request->getPut('onesignal_id'));
            }
            if ($this->request->getPut('password', 'string', false, true)) {
                $data->setPassword(sha1($this->request->getPut('password')));
            }
            if ($this->request->getPut('phone', 'string', false, true)) {
                $data->setPhone($this->request->getPut('phone'));
            }
            if ($this->request->getPut('photo', 'string', false, true)) {
                $data->setPhoto($this->request->getPut('photo'));
            }
            if ($this->request->getPut('language', 'string', false, true)) {
                $data->setLanguage($this->request->getPut('language'));
            }
            if ($this->request->getPut('timezone', 'string', false, true)) {
                $data->setTimezone($this->request->getPut('timezone'));
            }
            if ($this->request->getPut('email_at', 'string', false, true)) {
                $data->setEmailAt($this->request->getPut('email_at'));
            }
            if ($this->request->getPut('mobile_push_at', 'string', false, true)) {
                $data->setMobilePushAt($this->request->getPut('mobile_push_at'));
            }

            if ($data->getChangedFields()) {
                if ($data->validation()) {
                    $data->save();
                }

                if (empty($data->getMessages())) {
                    return $this->response->success(
                        $data->toSafeArray(['password', 'photo_base64', 'photo'])
                    );
                } else {
                    return $this->response->badRequest(
                        $data->getMessages(),
                        null,
                        baseUrl() . '/documentation/#api-Users'
                    );
                }
            }

            return $this->response->accepted([
                $data->toSafeArray(['password', 'photo_base64', 'photo']),
                $this->request->getPut(),
            ]);
        } catch (Exception $e) {
            return $this->response->badRequest(
                $e->getMessage(),
                null
            );
        }
    }

    public function delete($id)
    {
        try {
            $data = User::findFirst(array('user_id=' . $id));

            if (!$data) {
                return $this->response->notFound(
                    'User not exist or you dont have permission',
                    'API-REQ404',
                    baseUrl() . '/documentation/#api-Users'
                );
            }

            $data->delete();

            return $this->response->successNoContent();
        } catch (Exception $e) {
            return $this->response->badRequest(
                null,
                null,
                baseUrl() . '/documentation/#api-Users'
            );
        }
    }

    public function findById($id)
    {
        try {
            $data = User::findFirst(array('user_id=' . $id));

            if (!$data) {
                return $this->response->notFound(
                    'User not exist or you dont have permission',
                    'API-REQ404',
                    baseUrl() . '/documentation/#api-Users'
                );
            }

            return $this->response->success(
                $data->toSafeArray(['password', 'photo_base64', 'photo'])
            );
        } catch (Exception $e) {
            return $this->response->badRequest(
                null,
                null,
                baseUrl() . '/documentation/#api-Users'
            );
        }
    }

    /**
     * @return Response
     */
    public function find()
    {
        try {
            $query  = [];
            $offset = $this->request->getQuery('offset', "int", 0);
            $limit  = $this->request->getQuery('limit', "int", self::LIMIT);
            $filter = $this->request->get('filter', null, []);
            foreach ($filter as $field => $value) {
                if (is_array($value)) {
                    $query[] = "" . $field . "" . ' IN ("' . implode('","', $value) . '")';
                } else {
                    $query[] = "" . $field . "" . '="' . $value . '"';
                }
            }
            $query = implode(' and ', $query);

            $filter = array(
                'limit'   => array(
                    'number' => $limit,
                    'offset' => $offset,
                ),
                "columns" => $this->request->get('field') ?? User::excluded(['password', 'photo_base64']),
                $query,
            );

            $collection = User::find($filter)->toArray();
            foreach ($collection as $key => $value) {
                $collection[$key]['city'] = explode(',', $value['city']);
            }

            return $this->response->success(
                collection($collection, User::count($query), '/user', $offset, $limit)
            );
        } catch (BadFunctionCallException $e) {
            return $this->response->badRequest(
                $e->getMessage(),
                null,
                baseUrl() . '/documentation/#api-Users'
            );
        } catch (Exception $e) {
            return $this->response->badRequest($e->getMessage());
        }
    }

    /**
     * @param       $key
     * @param array $arr
     *
     * @return array|mixed
     */
    private function arrayValueRecursive($key, array $arr)
    {
        $val = array();
        array_walk_recursive($arr, function ($v, $k) use ($key, &$val) {
            if ($k == $key) {
                array_push($val, $v);
            }
        });
        return count($val) > 1 ? $val : array_pop($val);
    }

    /**
     * @return array
     */
    protected function getUserTimezones(): array
    {
        $query = array(
            "columns" => "timezone",
            'limit'   => array(
                'number' => 300,
                'offset' => 0,
            ),
            'group'   => 'timezone',
            "status='active'",
        );

        return User::find($query)->toArray();
    }

    /**
     * @throws Exception
     */
    public function timezone()
    {
        $collection = $this->getUserTimezones();

        if ($this->request->getQuery('clock')) {
            foreach ($collection as $key => $item) {
                $userClock        = new DateTime('now', new DateTimeZone($item['timezone']));
                $userClock        = $userClock->format('H:i');
                $collection[$key] = $item;
                if ($userClock !== $this->request->getQuery('clock')) {
                    unset($collection[$key]);
                }
            }
        }

        if (!empty($collection)) {
            $collection = $this->arrayValueRecursive('timezone', $collection);
            if (!is_array($collection)) {
                $collection = [$collection];
            }
        }

        $this->response->success(
            collection($collection, count($collection), '/user/timezone', 0, 250)
        );
    }

    /**
     * @throws Exception
     */
    public function clock()
    {
        $collection = $this->getUserTimezones();

        foreach ($collection as $key => $item) {
            $userClock        = new DateTime('now', new DateTimeZone($item['timezone']));
            $userClock        = $userClock->format('H:i');
            $item['clock']    = $userClock;
            $collection[$key] = $item;
        }

        $this->response->success(
            collection($collection, count($collection), '/user/timezone', 0, 250)
        );
    }

    /**
     * @param $id
     *
     * @return Response
     */
    public function dailyNotifyStatus($id)
    {
        /**
         * @var User $data
         */
        $data = User::findFirst($id);
        if (!$data) {
            return $this->response->notFound(
                'User not exist or you dont have permission',
                'API-REQ404',
                baseUrl() . '/documentation/#api-Users'
            );
        }

        $now = date_create('now')->format('Y-m-d');
        return $this->response->success([
            'mobile' => ($now === date_create($data->getMobilePushAt())->format('Y-m-d')),
            'email'  => ($now === date_create($data->getEmailAt())->format('Y-m-d')),
        ]);
    }

    /**
     * @param $id
     *
     * @return Response
     */
    public function subscribe($id)
    {
        try {
            /**
             * @var User $data
             */
            $data = User::findFirst($id);
            if (!$data) {
                return $this->response->notFound(
                    'User not exist or you dont have permission',
                    'API-REQ404',
                    baseUrl() . '/documentation/#api-Users'
                );
            }

            $coupon = $this->request->getPost('coupon', 'string', false, true);
            if (!$coupon) {
                return $this->response->badRequest(
                    'Subscriber coupon is not valid',
                    'API-REQ615',
                    baseUrl() . '/documentation/#api-Users'
                );
            }

            $data->activateByCoupon($coupon);

            return $this->response->successNoContent();
        } catch (Exception $e) {
            return $this->response->badRequest(
                $e->getMessage(),
                baseUrl() . '/documentation/#api-Users'
            );
        }
    }
}

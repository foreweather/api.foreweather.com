<?php


namespace Bundle\Coupon\Controllers;

use BadFunctionCallException;
use Exception;
use Foreweather\Phalcon\Http\Response;
use Phalcon\Mvc\Controller;
use Bundle\Coupon\Models\Coupon;

/**
 * @property Response            $response
 */
class CouponController extends Controller
{
    const LIMIT = 5;

    public function update($id)
    {
        try {
            /**
             * @var Coupon $data
             */
            $data = Coupon::findFirst(array('user_id=' . $id));

            if (!$data) {
                return $this->response->notFound(
                    'Coupon not exist or you dont have permission',
                    'API-REQ404',
                    baseUrl() . '/documentation/#api-Coupons'
                );
            }

            if ($this->request->getPut('user_id', 'integer', false, false)) {
                $data->setUserId($this->request->getPut('user_id'));
            }
            if ($this->request->getPut('code', 'string', false, false)) {
                $data->setCode($this->request->getPut('code'));
            }
            if ($this->request->getPut('status', 'string', false, false)) {
                $data->setStatus($this->request->getPut('status'));
            }
            if ($this->request->getPut('used_at', 'string', false, false)) {
                $data->setUsedAt($this->request->getPut('used_at'));
            }

            if ($data->getChangedFields()) {
                if ($data->validation()) {
                    $data->save();
                }

                if (empty($data->getMessages())) {
                    return $this->response->success(
                        $data->toSafeArray()
                    );
                } else {
                    return $this->response->badRequest(
                        $data->getMessages(),
                        null,
                        baseUrl() . '/documentation/#api-Coupons'
                    );
                }
            }

            return $this->response->accepted([
                $data->toSafeArray(),
                $this->request->getPut(),
            ]);
        } catch (Exception $e) {
            return $this->response->badRequest(
                $e->getMessage(),
                null
            );
        }
    }

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
                    'offset' => $offset
                ),
                "columns" => $this->request->get('field') ?? Coupon::excluded(),
                $query,
            );

            $collection = Coupon::find($filter);

            $this->response->success(
                collection($collection->toArray(), Coupon::count($query), '/coupon', $offset, $limit)
            );
        } catch (BadFunctionCallException $e) {
            $this->response->badRequest(
                $e->getMessage(),
                null,
                baseUrl() . '/documentation/#api-Coupons'
            );
        } catch (Exception $e) {
            $this->response->badRequest($e->getMessage());
        }
    }
}

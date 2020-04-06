<?php

namespace Bundle\Coupon\Models;

use Foreweather\Phalcon\Mvc\Model\AbstractModel;
use Foreweather\Phalcon\Mvc\Model\ModelInterface;
use Phalcon\Validation;
use Phalcon\Validation\Validator\PresenceOf;

class Coupon extends AbstractModel implements ModelInterface
{
    /**
     * @var integer
     */
    protected $coupon_id;

    /**
     * @var integer
     */
    protected $user_id;

    /**
     * @var string
     */
    protected $code;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $created_at;

    /**
     * @var string
     */
    protected $updated_at;

    /**
     * @var string
     */
    protected $used_at;

    /**
     * @return int
     */
    public function getCouponId(): int
    {
        return $this->coupon_id;
    }

    /**
     * @param int $coupon_id
     *
     * @return Coupon
     */
    public function setCouponId(int $coupon_id): Coupon
    {
        $this->coupon_id = $coupon_id;
        return $this;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * @param int $user_id
     *
     * @return Coupon
     */
    public function setUserId(int $user_id): Coupon
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCode(): string
    {
        return $this->code;
    }

    /**
     * @param string $code
     *
     * @return Coupon
     */
    public function setCode(string $code): Coupon
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @param string $status
     *
     * @return Coupon
     */
    public function setStatus(string $status): Coupon
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt(): string
    {
        return $this->created_at;
    }

    /**
     * @param string $created_at
     *
     * @return Coupon
     */
    public function setCreatedAt(string $created_at): Coupon
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpdatedAt(): string
    {
        return $this->updated_at;
    }

    /**
     * @param string $updated_at
     *
     * @return Coupon
     */
    public function setUpdatedAt(string $updated_at): Coupon
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return string
     */
    public function getUsedAt(): string
    {
        return $this->used_at;
    }

    /**
     * @param string $used_at
     *
     * @return Coupon
     */
    public function setUsedAt(string $used_at): Coupon
    {
        $this->used_at = $used_at;
        return $this;
    }

    /**
     * @param array $exclude
     *
     * @return string
     */
    public static function excluded(array $exclude = []): string
    {
        return parent::excludedItSelf($exclude, new Coupon());
    }

    /**
     * @return bool
     */
    public function validation(): bool
    {
        $validator = new Validation();

        $validator->add(
            'user_id',
            new PresenceOf(
                [
                    'message' => 'The user is required',
                ]
            )
        );

        $validator->add(
            'code',
            new PresenceOf(
                [
                    'message' => 'The code is required',
                ]
            )
        );
        $validator->add(
            'status',
            new PresenceOf(
                [
                    'message' => 'The status is required',
                ]
            )
        );

        return $this->validate($validator);
    }
}

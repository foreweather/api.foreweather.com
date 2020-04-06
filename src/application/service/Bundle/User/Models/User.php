<?php

namespace Bundle\User\Models;

use Bundle\Coupon\Models\Coupon;
use Exception;
use Foreweather\Phalcon\Mvc\Model\AbstractModel;
use Foreweather\Phalcon\Mvc\Model\ModelInterface;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\PresenceOf;

class User extends AbstractModel implements ModelInterface
{

    /**
     * @var int
     */
    protected $user_id;

    /**
     * @var string
     */
    protected $email = null;

    /**
     * @var string
     */
    protected $password = null;

    /**
     * @var string
     */
    protected $phone = null;

    /**
     * @var string
     */
    protected $photo = 'default.jpg';

    /**
     * @var string
     */
    protected $photo_base64 = null;

    /**
     * @var array|string
     */
    protected $city;

    /**
     * @var string
     */
    protected $email_at;

    /**
     * @var string
     */
    protected $mobile_push_at;

    /**
     * @var string
     */
    protected $status;

    /**
     * @var string
     */
    protected $subscribe_at;

    /**
     * @var string
     */
    protected $timezone;

    /**
     * @var string
     */
    protected $language;

    /**
     * @var string
     */
    protected $device;

    /**
     * @var string
     */
    protected $onesignal_id;

    public function beforeSave()
    {
        $this->city = implode(',', $this->city);
    }


    public function afterSave()
    {
        $this->city = explode(',', $this->city);
    }

    public function afterFetch()
    {
        $this->city = explode(',', $this->city);
    }

    /**
     * @return array
     */
    public function getCity(): array
    {
        return $this->city;
    }

    /**
     * @param array $city city id list of array
     *
     * @return User
     */
    public function setCity(array $city): User
    {
        $this->city = $city;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubscribeAt(): string
    {
        return $this->subscribe_at;
    }

    /**
     * @param string $subscribe_at
     *
     * @return User
     */
    public function setSubscribeAt(string $subscribe_at): User
    {
        $this->subscribe_at = $subscribe_at;
        return $this;
    }

    /**
     * @return string
     */
    public function getEmailAt(): string
    {
        return $this->email_at;
    }

    /**
     * @param string $email_at
     *
     * @return User
     */
    public function setEmailAt(string $email_at): User
    {
        $this->email_at = $email_at;
        return $this;
    }

    /**
     * @return string
     */
    public function getMobilePushAt(): string
    {
        return $this->mobile_push_at;
    }

    /**
     * @param string $mobile_push_at
     *
     * @return User
     */
    public function setMobilePushAt(string $mobile_push_at): User
    {
        $this->mobile_push_at = $mobile_push_at;
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
     * @return User
     */
    public function setStatus(string $status): User
    {
        $this->status = $status;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhotoBase64(): string
    {
        return $this->photo_base64;
    }

    /**
     * @param string $photo_base64
     *
     * @return User
     */
    public function setPhotoBase64(string $photo_base64): User
    {
        $this->photo_base64 = $photo_base64;
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
     * @return User
     */
    public function setUserId(int $user_id): User
    {
        $this->user_id = $user_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     *
     * @return User
     */
    public function setEmail(string $email): User
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param string $password
     *
     * @return User
     */
    public function setPassword(string $password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     *
     * @return User
     */
    public function setPhone(string $phone): User
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhoto()
    {
        return $this->photo;
    }

    /**
     * @param string|null $photo
     *
     * @return User
     */
    public function setPhoto(string $photo): User
    {
        if ($photo === null) {
            $this->photo = 'default';
        }

        $this->photo = $photo;
        return $this;
    }


    /**
     * @return string
     */
    public function getTimezone()
    {
        return $this->timezone;
    }

    /**
     * @param string $timezone
     *
     * @return User
     */
    public function setTimezone(string $timezone): User
    {
        $this->timezone = $timezone;
        return $this;
    }

    /**
     * @return string
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param string $language
     *
     * @return User
     */
    public function setLanguage(string $language): User
    {
        $this->language = $language;
        return $this;
    }

    /**
     * @return string
     */
    public function getDevice()
    {
        return $this->device;
    }

    /**
     * @param string $device
     *
     * @return User
     */
    public function setDevice(string $device): User
    {
        $this->device = $device;
        return $this;
    }

    /**
     * @return string
     */
    public function getOnesignalId()
    {
        return $this->onesignal_id;
    }

    /**
     * @param string $onesignal_id
     *
     * @return User
     */
    public function setOnesignalId(string $onesignal_id): User
    {
        $this->onesignal_id = $onesignal_id;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * @param string $created_at
     *
     * @return User
     */
    public function setCreatedAt(string $created_at): User
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * @param string $updated_at
     *
     * @return User
     */
    public function setUpdatedAt(string $updated_at): User
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @param array $exclude
     *
     * @return string
     */
    public static function excluded(array $exclude = []): string
    {
        return parent::excludedItSelf($exclude, new User());
    }

    /**
     * @return bool
     */
    public function validation(): bool
    {
        $validator = new Validation();

        $validator->add(
            'email',
            new PresenceOf(
                [
                    'message' => 'The e-mail is required',
                ]
            )
        );

        $validator->add(
            'email',
            new Email(
                [
                    'message' => 'The e-mail is not valid',
                ]
            )
        );

//        $validator->add(
//            'cst_email',
//            new Uniqueness(
//                [
//                    'message' => 'The customer email must be unique',
//                ]
//            )
//        );

        $validator->add(
            'password',
            new PresenceOf(
                [
                    'message' => 'The password is required',
                ]
            )
        );
        $validator->add(
            'photo',
            new PresenceOf(
                [
                    'message' => 'The photo is required',
                ]
            )
        );
        $validator->add(
            'phone',
            new PresenceOf(
                [
                    'message' => 'The phone is required',
                ]
            )
        );
        $validator->add(
            'city',
            new PresenceOf(
                [
                    'message' => 'The city is required',
                ]
            )
        );
        $validator->add(
            'timezone',
            new PresenceOf(
                [
                    'message' => 'The timezone is required',
                ]
            )
        );
        $validator->add(
            'language',
            new PresenceOf(
                [
                    'message' => 'The language is required',
                ]
            )
        );
        $validator->add(
            'device',
            new PresenceOf(
                [
                    'message' => 'The device is required',
                ]
            )
        );
        $validator->add(
            'onesignal_id',
            new PresenceOf(
                [
                    'message' => 'The onesignal account is required',
                ]
            )
        );

        return $this->validate($validator);
    }

    /**
     * @param string $coupon
     *
     * @return User
     * @throws Exception
     */
    public function activateByCoupon(string $coupon): User
    {
        /**
         * @var Coupon $coupon
         */
        $coupon = Coupon::findFirst("code='{$coupon}' and status='unused'");
        if (!$coupon) {
            throw new Exception('Subscriber coupon is not valid');
        }
        $date = date_create('now')->format('Y-m-d H:i:s');

        $this->setStatus('active')->setSubscribeAt($date)->save();

        $coupon->setUserId($this->user_id)
            ->setStatus('used')
            ->setUsedAt($date)
            ->save();

        return $this;
    }
}

<?php

namespace Foreweather\Phalcon\Plugins;

use OAuth2\Storage\Pdo;

class OAuth extends Pdo
{
    /**
     * OAuth constructor.
     *
     * @param       $connection
     * @param array $config
     */
    public function __construct($connection, $config = array())
    {
        parent::__construct($connection, $config);

        $this->config = array_merge(array(
            'client_table'        => 'oauth_clients',
            'access_token_table'  => 'oauth_access_tokens',
            'refresh_token_table' => 'oauth_refresh_tokens',
            'code_table'          => 'oauth_authorization_codes',
            'user_table'          => 'user',
            'jwt_table'           => 'oauth_jwt',
            'jti_table'           => 'oauth_jti',
            'scope_table'         => 'oauth_scopes',
            'public_key_table'    => 'oauth_public_keys',
        ), $config);
    }

    //

    /**
     * @param $password
     *
     * @return string
     * @todo use a secure hashing algorithm when storing passwords.
     */
    protected function hashPassword($password)
    {
        return sha1($password);
    }

    /**
     * @param $user_id
     *
     * @return array|bool
     */
    public function getUserById($user_id)
    {
        $stmt = $this->db->prepare(
            $sql = sprintf('SELECT * from %s where user_id=:user_id', $this->config['user_table'])
        );
        $stmt->execute(array('user_id' => $user_id));

        if (!$userInfo = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            return false;
        }

        $user = array_merge(array('user_id' => $user_id), $userInfo);

        /**
         * the default behavior is to use "username" as the user_id
         */
        return $user;
    }

    /* OAuth2\Storage\UserCredentialsInterface */
    public function checkUserCredentials($username, $password)
    {
        $user = $this->getUser($username);

        if ($user) {
            return $this->checkPassword($user, $password);
        }

        return false;
    }

    // plaintext passwords are bad!  Override this for your application
    protected function checkPassword($user, $password)
    {
        if ($user['password'] == $this->hashPassword($password)) {
            return true;
        }

        return false;
    }

    // plaintext passwords are bad!  Override this for your application
    protected function checkVerify($user, $code)
    {
        if ($user['verification'] == $code) {
            return true;
        }

        return false;
    }

    public function setUser(
        $username,
        $password,
        $scope = 'basic',
        $firstName = null,
        $lastName = null,
        $phone = 0,
        $verification = null
    ) {
        // do not store in plaintext
        $password   = $this->hashPassword($password);
        $created_at = date_create('now')->format('Y-m-d H:i:s');
        $updated_at = date_create('now')->format('Y-m-d H:i:s');

        // if it exists, update it.
        if ($this->getUser($username)) {
            $stmt   = $this->db->prepare(
                $sql = sprintf('UPDATE %s SET password=:password, first_name=:firstName, last_name=:lastName, 
phone=:phone, email=:username, updated_at=:updated_at, scope=:scope, verification=:verification 
where email=:username', $this->config['user_table'])
            );
            $result = $stmt->execute(
                compact(
                    'username',
                    'password',
                    'firstName',
                    'lastName',
                    'phone',
                    'username',
                    'updated_at',
                    'scope',
                    'verification'
                )
            );
        } else {
            $stmt   = $this->db->prepare(
                sprintf('INSERT INTO %s (email, password, first_name, last_name, phone, email, created_at, 
updated_at, scope, verification) 
VALUES (:username, :password, :firstName, :lastName, :phone, :username, :created_at, 
:updated_at, :scope, :verification)', $this->config['user_table'])
            );
            $result = $stmt->execute(compact(
                'username',
                'password',
                'firstName',
                'lastName',
                'phone',
                'username',
                'created_at',
                'updated_at',
                'scope',
                'verification'
            ));
        }

        return $this->getUser($username);
    }

    /**
     * @param string $username
     * @param string $verification
     *
     * @return array|bool
     */
    public function updateVerify($username, $verification)
    {
        $updated_at = date_create('now')->format('Y-m-d H:i:s');

        if ($this->getUser($username)) {
            $stmt = $this->db->prepare(
                $sql = sprintf('UPDATE %s SET updated_at=:updated_at, verification=:verification, scope="verify" 
where email=:username', $this->config['user_table'])
            );
            $stmt->execute(compact('username', 'updated_at', 'verification'));
        }

        return $this->getUser($username);
    }

    /**
     * @param string $username
     * @param string $password
     *
     * @return array|bool
     */
    public function updatePassword($username, $password)
    {
        // do not store in plaintext
        $password   = $this->hashPassword($password);
        $updated_at = date_create('now')->format('Y-m-d H:i:s');

        if ($this->getUser($username)) {
            $stmt = $this->db->prepare($sql = sprintf('UPDATE %s SET updated_at=:updated_at, password=:password 
where email=:username', $this->config['user_table']));
            $stmt->execute(compact('username', 'updated_at', 'password'));
        }

        return $this->getUser($username);
    }

    /**
     * @param string $username
     * @param string $code
     * @param string $scope
     *
     * @return array|bool
     */
    public function verify($username, $code, $scope = 'basic')
    {
        $user = $this->getUser($username);

        if ($user) {
            if ($this->checkVerify($user, $code)) {
                $updated_at = date_create('now')->format('Y-m-d H:i:s');
                $status     = 'active';
                $stmt       = $this->db->prepare(
                    $sql = sprintf('UPDATE %s SET scope=:scope, updated_at=:updated_at, status=:status 
where email=:username', $this->config['user_table'])
                );
                $stmt->execute(compact('username', 'scope', 'updated_at', 'status'));

                return $this->getUser($username);
            }
        }

        return false;
    }

    public function getUser($username)
    {
        $stmt = $this->db->prepare($sql = sprintf(
            'SELECT * from %s where email=:username',
            $this->config['user_table']
        ));
        $stmt->execute(array('username' => $username));

        if (!$userInfo = $stmt->fetch(\PDO::FETCH_ASSOC)) {
            return false;
        }

        // the default behavior is to use "username" as the user_id
        return array_merge(array(
            'user_id' => $username,
        ), $userInfo);
    }
}

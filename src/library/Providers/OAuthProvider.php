<?php

namespace Providers;

use Foreweather\Phalcon\Plugins\OAuth;
use OAuth2\GrantType\ClientCredentials;
use OAuth2\GrantType\RefreshToken;
use OAuth2\GrantType\UserCredentials;
use OAuth2\Scope;
use OAuth2\Server;
use PDO;
use Phalcon\Di\DiInterface;

//use OAuth2\Storage\Memory;

class OAuthProvider
{
    /**
     * Registers a service provider.
     *
     * @param DiInterface $di
     *
     * @return void
     */

    public function register(DiInterface $di): void
    {
        $config_database = $di->getShared('config')->get('database')->toArray();
        $config_oauth    = $di->getShared('config')->get('oauth')->toArray();

        $di->setShared(
            'oauth',
            function () use ($config_database, $config_oauth) {
                $dsn      = 'mysql:dbname=' . $config_database['dbname'] . ';host=' . $config_database['host'];
                $username = $config_database['username'];
                $password = $config_database['password'];

                /*
               // configure your available scopes
               $defaultScope    = 'basic';
               $supportedScopes = array(
                   'basic',
                   'admin',
                   'editor',
               );

               $memory = new Memory(
                   [
                       'default_scope'    => $defaultScope,
                       'supported_scopes' => $supportedScopes,
                   ]
               );
               */

                $storage = new OAuth(
                    [
                        'dsn'      => $dsn,
                        'username' => $username,
                        'password' => $password,
                        'options'  => [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"],
                    ]
                );

                $scopeUtil = new Scope($storage);

                // Pass a storage object or array of storage objects to the OAuth2 server class
                $server = new Server($storage, array(
                    'access_lifetime'                => $config_oauth['access_token_life_time'], // 1 day
                    'refresh_token_lifetime'         => $config_oauth['refresh_token_lifetime'], // 28 days
                    'always_issue_new_refresh_token' => $config_oauth['always_issue_new_refresh_token'],
                    'unset_refresh_token_after_use'  => $config_oauth['unset_refresh_token_after_use'],
                ));

                $server->setScopeUtil($scopeUtil);

                $server->addGrantType(new ClientCredentials($storage));
                $server->addGrantType(new UserCredentials($storage));
                $server->addGrantType(
                    new RefreshToken(
                        $storage,
                        ['always_issue_new_refresh_token' => $config_oauth['always_issue_new_refresh_token']]
                    )
                );

                /**
                 * @var Server $server
                 */
                return $server;
            }
        );
    }
}

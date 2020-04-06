<?php
//  Add application configuration
return [
    'database'    => [
        'adapter'  => getenv('DB_ADAPTER'),
        'host'     => getenv('DB_HOST'),
        'port'     => getenv('DB_PORT'),
        'username' => getenv('DB_USERNAME'),
        'password' => getenv('DB_PASSWORD'),
        'dbname'   => getenv('DB_NAME'),
    ],
    'oauth'    => [
        'access_token_life_time'         => getenv('OAUTH_ACCESS_TOKEN_LIFETIME'), // 1 day
        'refresh_token_lifetime'         => getenv('OAUTH_REFRESH_TOKEN_LIFETIME'), // 28 days
        'always_issue_new_refresh_token' => getenv('OAUTH_ALWAYS_ISSUE_NEW_REFRESH_TOKEN'),
        'unset_refresh_token_after_use'  => getenv('OAUTH_UNSET_REFRESH_TOKEN_AFTER_USE'),
    ]
];

<?php

use Bundle\System\Controllers\WelcomeController;
use Bundle\System\Controllers\OAuthController;
use Bundle\Coupon\Controllers\CouponController;
use Bundle\User\Controllers\UserController;

!defined('FILTER_NUMERIC') ? define('FILTER_NUMERIC', '{id:[0-9]+}') : null;

return [
    '/'       => [
        // Class, Method, Route, Handler, isPublic
        [WelcomeController::class, 'info', 'get', '', true],
        [WelcomeController::class, 'version', 'get', 'version', false],
    ],
    '/user'   => [
        // Class, Method, Route, Handler, isPublic
        [UserController::class, 'findById', 'get', '/' . FILTER_NUMERIC],
        [UserController::class, 'find', 'get', '/'],
        [UserController::class, 'create', 'post', '/'],
        [UserController::class, 'update', 'put', '/' . FILTER_NUMERIC],
        [UserController::class, 'delete', 'delete', '/' . FILTER_NUMERIC],
        [UserController::class, 'image', 'post', '/' . FILTER_NUMERIC . '/image'],
        [UserController::class, 'imageFile', 'get', '/' . FILTER_NUMERIC . '/image', true],
        [UserController::class, 'timezone', 'get', '/subscribed_timezone'],
        [UserController::class, 'clock', 'get', '/clock'],
        [UserController::class, 'dailyNotifyStatus', 'get', '/' . FILTER_NUMERIC . '/daily_notify_status'],
        [UserController::class, 'subscribe', 'post', '/' . FILTER_NUMERIC . '/subscribe'],
    ],
    '/coupon' => [
        // Class, Method, Route, Handler, isPublic
        [CouponController::class, 'find', 'get', '/'],
        [CouponController::class, 'update', 'put', '/' . FILTER_NUMERIC],
    ],
    '/oauth2' => [
        // Class, Method, Route, Handler, isPublic
        [OAuthController::class, 'token', 'post', '/token', true],
    ],
];


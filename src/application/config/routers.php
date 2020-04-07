<?php

use Bundle\Coupon\Controllers\CouponController;
use Bundle\System\Controllers\OAuthController;
use Bundle\System\Controllers\WelcomeController;
use Bundle\User\Controllers\UserController;

!defined('FILTER_NUMERIC') ? define('FILTER_NUMERIC', '{id:[0-9]+}') : null;

return [
    '/'       => [
        /**
         * @api      {get} / Api information
         *
         * @apiName  welcome
         * @apiGroup Foreweather
         *
         * @apiSuccess {String} message
         * @apiSuccess {String} detail
         *
         * @apiSuccessExample {json} Success-Response:
         * HTTP/1.1 200 OK
         * {
         *      "message": "Welcome to the Foreweather API v1.0.0",
         *      "detail": "You can check our documentation"
         * }
         */
        [WelcomeController::class, 'info', 'get', '', true], // Class, Method, Route, Handler, isPublic

        /**
         * @api              {get} /version Version information
         *
         * @apiName          version
         * @apiGroup         Foreweather
         *
         * @apiHeader {String} access_token OAuth2 client token
         * @apiHeaderExample Header-Example:
         * Authorization:'Bearer af7e2f2s5g8c5952d50cc961bfe7245dbd15348b'
         *
         * @apiSuccess {String} message
         * @apiSuccess {String} detail
         */
        [WelcomeController::class, 'version', 'get', 'version', false],
    ],
    '/user'   => [
        /**
         * @api              {get} /user List all users
         *
         * @apiName          List
         * @apiGroup         Users
         *
         * @apiHeader {String} access_token OAuth2 client token
         * @apiHeaderExample Header-Example:
         * Authorization:'Bearer af7e2f2s5g8c5952d50cc961bfe7245dbd15348b'
         *
         * @apiParam {String} [limit=5] A limit on the number of objects to be returned.
         * @apiParam {String} [offset=0] A cursor for use in pagination.
         *
         * @apiSuccess {String} length Result set size of users for this page.
         * @apiSuccess {String} items A dictionary with a items property that contains an array of up to limit users
         * @apiSuccess {String} pagination Pagination parameters
         */
        [UserController::class, 'find', 'get', '/'],

        /**
         * @api              {get} /user/:id Retrieve an user
         * @apiParam {Number} id User unique ID.
         *
         * @apiName          Get
         * @apiGroup         Users
         *
         * @apiHeader {String} access_token OAuth2 client token
         * @apiHeaderExample Header-Example:
         * Authorization:'Bearer af7e2f2s5g8c5952d50cc961bfe7245dbd15348b'
         *
         * @apiSuccess {String} user_id user unique id.
         * @apiSuccess {String} email user email
         * @apiSuccess {String} password user password
         * @apiSuccess {String} phone user phone
         * @apiSuccess {Object} city user service city list collection
         * @apiSuccess {String} timezone user timezone
         * @apiSuccess {String} language user language code
         * @apiSuccess {String} onesignal_id user notification id
         * @apiSuccess {String} device user device information
         *
         * @apiSuccessExample {json} Success-Response:
         * HTTP/1.1 200 OK
         * {
         *      "user_id": "1",
         *      "email": "teknasyon@mail.com",
         *      "phone": "905557016060",
         *      "city": [
         *          "1",
         *          "3"
         *      ],
         *      "timezone": "Europe/Istanbul",
         *      "language": "tr",
         *      "device": "iPhone11,2 (13.4)",
         *      "onesignal_id": "1831af97-67db-4a52-95ef-45b479f3849c",
         *      "created_at": "2020-04-07 04:26:00",
         *      "updated_at": "2020-04-07 08:02:42",
         *      "subscribe_at": "2020-04-06 13:43:58",
         *      "email_at": "2020-04-07 08:02:42",
         *      "mobile_push_at": "2020-04-07 08:02:42",
         *      "status": "active"
         * }
         *
         */
        [UserController::class, 'findById', 'get', '/' . FILTER_NUMERIC], // Class, Method, Route, Handler, isPublic

        /**
         * @api              {post} /user Create an user
         * @apiName          Create
         * @apiGroup         Users
         *
         * @apiHeader {String} access_token OAuth2 client token
         * @apiHeaderExample Header-Example:
         * Authorization:'Bearer af7e2f2s5g8c5952d50cc961bfe7245dbd15348b'
         *
         * @apiParam {String} email user email
         * @apiParam {String} password user password
         * @apiParam {String} phone user phone
         * @apiParam {Object} city user service city list collection
         * @apiParam {String} timezone user timezone
         * @apiParam {String} language user language code
         * @apiParam {String} onesignal_id user notification id
         * @apiParam {String} device user device information
         *
         * @apiSuccess {String} user_id user unique id.
         * @apiSuccess {String} email user email
         * @apiSuccess {String} password user password
         * @apiSuccess {String} phone user phone
         * @apiSuccess {Object} city[] user service city list collection
         * @apiSuccess {String} timezone user timezone
         * @apiSuccess {String} language user language code
         * @apiSuccess {String} onesignal_id user notification id
         * @apiSuccess {String} device user device information
         *
         * @apiSuccessExample {json} Success-Response:
         * HTTP/1.1 200 OK
         * {
         *      "user_id": "1",
         *      "email": "teknasyon@mail.com",
         *      "phone": "905557016060",
         *      "city": [
         *          "1",
         *          "3"
         *      ],
         *      "timezone": "Europe/Istanbul",
         *      "language": "tr",
         *      "device": "iPhone11,2 (13.4)",
         *      "onesignal_id": "1831af97-67db-4a52-95ef-45b479f3849c",
         *      "created_at": "2020-04-07 04:26:00",
         *      "updated_at": "2020-04-07 08:02:42",
         *      "subscribe_at": "2020-04-06 13:43:58",
         *      "email_at": "2020-04-07 08:02:42",
         *      "mobile_push_at": "2020-04-07 08:02:42",
         *      "status": "active"
         * }
         *
         */
        [UserController::class, 'create', 'post', '/'],

        /**
         * @api              {put} /user/:id Update an user
         * @apiParam {Number} id User unique ID.
         *
         * @apiName          Update
         * @apiGroup         Users
         *
         * @apiHeader {String} access_token OAuth2 client token
         * @apiHeaderExample Header-Example:
         * Authorization:'Bearer af7e2f2s5g8c5952d50cc961bfe7245dbd15348b'
         *
         * @apiParam {String} [email] user email
         * @apiParam {String} [password] user password
         * @apiParam {String} [phone] user phone
         * @apiParam {String} [city[]] user service city list collection
         * @apiParam {String} [timezone] user timezone
         * @apiParam {String} [language] user language code
         * @apiParam {String} [onesignal_id] user notification id
         * @apiParam {String} [device] user device information
         *
         * @apiSuccess {String} user_id user unique id.
         * @apiSuccess {String} email user email
         * @apiSuccess {String} password user password
         * @apiSuccess {String} phone user phone
         * @apiSuccess {Object} city user service city list collection
         * @apiSuccess {String} timezone user timezone
         * @apiSuccess {String} language user language code
         * @apiSuccess {String} onesignal_id user notification id
         * @apiSuccess {String} device user device information
         *
         * @apiSuccessExample {json} Success-Response:
         * HTTP/1.1 200 OK
         * {
         *      "user_id": "1",
         *      "email": "teknasyon@mail.com",
         *      "phone": "905557016060",
         *      "city": [
         *          "1",
         *          "5"
         *      ],
         *      "timezone": "Europe/Istanbul",
         *      "language": "tr",
         *      "device": "iPhone11,2 (13.4)",
         *      "onesignal_id": "1831af97-67db-4a52-95ef-45b479f3849c",
         *      "created_at": "2020-04-07 04:26:00",
         *      "updated_at": "2020-04-07 08:02:42",
         *      "subscribe_at": "2020-04-06 13:43:58",
         *      "email_at": "2020-04-07 08:02:42",
         *      "mobile_push_at": "2020-04-07 08:02:42",
         *      "status": "active"
         * }
         *
         * @apiSuccessExample {json} Accepted-Response:
         * HTTP/1.1 202 OK
         * {
         *      "user_id": "1",
         *      "email": "teknasyon@mail.com",
         *      "phone": "905557016060",
         *      "city": [
         *          "1",
         *          "5"
         *      ],
         *      "timezone": "Europe/Istanbul",
         *      "language": "tr",
         *      "device": "iPhone11,2 (13.4)",
         *      "onesignal_id": "1831af97-67db-4a52-95ef-45b479f3849c",
         *      "created_at": "2020-04-07 04:26:00",
         *      "updated_at": "2020-04-07 08:02:42",
         *      "subscribe_at": "2020-04-06 13:43:58",
         *      "email_at": "2020-04-07 08:02:42",
         *      "mobile_push_at": "2020-04-07 08:02:42",
         *      "status": "active"
         * }
         *
         */
        [UserController::class, 'update', 'put', '/' . FILTER_NUMERIC],

        /**
         * @api               {delete} /user/:id Delete an user
         * @apiParam {Number} id User unique ID.
         *
         * @apiName           Delete
         * @apiGroup          Users
         *
         * @apiHeader {String} access_token OAuth2 client token
         * @apiHeaderExample  Header-Example:
         * Authorization:'Bearer af7e2f2s5g8c5952d50cc961bfe7245dbd15348b'
         *
         * @apiSuccessExample Success-Response:
         * HTTP/1.1 204 NO CONTENT
         *
         */
        [UserController::class, 'delete', 'delete', '/' . FILTER_NUMERIC],

        /**
         * @api               {post} /user/:id/image Upload user image
         * @apiParam {Number} id User unique ID.
         *
         * @apiName           UpdateImage
         * @apiGroup          Users
         *
         * @apiHeader {String} access_token OAuth2 client token
         * @apiHeaderExample Header-Example:
         * Authorization:'Bearer af7e2f2s5g8c5952d50cc961bfe7245dbd15348b'
         *
         * @apiParam {Object} photo Image file
         *
         * @apiSuccessExample Success-Response:
         * HTTP/1.1 204 NO CONTENT
         */
        [UserController::class, 'image', 'post', '/' . FILTER_NUMERIC . '/image'],

        /**
         * @api      {get} /user/:id/image Retrieve an user image
         * @apiParam {Number} id User unique ID.
         *
         * @apiName  GetUserImage
         * @apiGroup Users
         *
         * @apiSuccess {Object} file Raw image stream will be outputted directly
         *
         * @apiSuccessExample {image/jpeg} Success-Response:
         * HTTP/1.1 200 OK
         * Raw image stream will be outputted directly
         */
        [UserController::class, 'imageFile', 'get', '/' . FILTER_NUMERIC . '/image', true],

        /**
         * @api            {get} /user/subscribed_timezone Subscribed timezones
         *
         * @apiDescription List of timezones where members are active.
         *                 You can also list timezones that match a specified clock.
         * @apiName        ListSubscribedTimeZone
         * @apiGroup       Users
         *
         * @apiHeader {String} access_token OAuth2 client token
         * @apiHeaderExample Header-Example:
         * Authorization:'Bearer af7e2f2s5g8c5952d50cc961bfe7245dbd15348b'
         *
         * @apiParam {String} [clock] subscribed timezones by clock
         * @apiParamExample {http_query_param} Request-Example:
         *       /user/subscribed_timezone?clock=09:00
         * @apiParam {String} [limit=250] A limit on the number of objects to be returned.
         * @apiParam {String} [offset=0] A cursor for use in pagination.
         *
         * @apiSuccess {String} length Result set size of timezones for this page.
         * @apiSuccess {String} items A dictionary with a items property that contains an array of up to limit timezones
         * @apiSuccess {String} pagination Pagination parameters
         *
         * @apiSuccessExample {json} Success-Response:
         * HTTP/1.1 200 OK
         * {
         *      "pagination": {
         *          "limit": 250,
         *          "offset": 0,
         *          "next_offset": false,
         *          "prev_offset": false,
         *          "last_offset": false,
         *          "current_page": 1,
         *          "page_count": 1,
         *          "items_count": 3,
         *          "path": "/user/timezone"
         *      },
         *      "length": 3,
         *      "items": [
         *          "Asia/Tokyo",
         *          "Europe/Amsterdam",
         *          "Europe/Istanbul"
         *      ]
         * }
         */
        [UserController::class, 'timezone', 'get', '/subscribed_timezone'],

        /**
         * @api            {get} /user/:id/daily_notify_status Notification availability
         * @apiParam       {Number} id User unique ID.
         *
         * @apiDescription Checks the availability of daily notifications.
         *
         * @apiName        CheckNotificationAvailability
         * @apiGroup       Users
         *
         * @apiHeader {String} access_token OAuth2 client token
         * @apiHeaderExample Header-Example:
         * Authorization:'Bearer af7e2f2s5g8c5952d50cc961bfe7245dbd15348b'
         *
         * @apiSuccess {String} mobile Mobile push notification availability
         * @apiSuccess {String} email E-Mail push notification availability
         *
         * @apiSuccessExample {json} Success-Response:
         * HTTP/1.1 200 OK
         * {
         *      "mobile": false,
         *      "email": true
         * }
         */
        [UserController::class, 'dailyNotifyStatus', 'get', '/' . FILTER_NUMERIC . '/daily_notify_status'],

        /**
         * @api               {post} /user/:id/subscribe Subscribe to Foreweather
         * @apiParam       {Number} id User unique ID.
         * @apiDescription    Subscribe to Foreweather application by code.
         *
         * @apiName           SubscribeApp
         * @apiGroup          Users
         *
         * @apiHeader {String} access_token OAuth2 client token
         * @apiHeaderExample Header-Example:
         * Authorization:'Bearer af7e2f2s5g8c5952d50cc961bfe7245dbd15348b'
         *
         * @apiParam {String} coupon Coupon code for subscribe to app.
         *
         * @apiSuccessExample Success-Response:
         * HTTP/1.1 204 NO CONTENT
         *
         * @apiErrorExample {json} Error-Response:
         * HTTP/1.1 400 BAD REQUEST
         * {
         *      "code": "https://documantation.api.foreweather.com/user#activate",
         *      "message": "Bad Request",
         *      "detail": "Subscriber coupon is not valid"
         * }
         */
        [UserController::class, 'subscribe', 'post', '/' . FILTER_NUMERIC . '/subscribe'],
        [UserController::class, 'clock', 'get', '/clock'],
    ],
    '/coupon' => [
        /**
         * @api      {post} /coupon List all coupons
         *
         * @apiName  List
         * @apiGroup Coupons
         *
         * @apiHeader {String} access_token OAuth2 client token
         * @apiHeaderExample Header-Example:
         * Authorization:'Bearer af7e2f2s5g8c5952d50cc961bfe7245dbd15348b'
         *
         * @apiParam {String} [limit=5] A limit on the number of objects to be returned.
         * @apiParam {String} [offset=0] A cursor for use in pagination.
         *
         * @apiSuccess {String} length Result set size of coupons for this page.
         * @apiSuccess {String} items A dictionary with a items property that contains an array of up to limit coupons
         * @apiSuccess {String} pagination Pagination parameters
         *
         * @apiSuccessExample {json} Success-Response:
         * HTTP/1.1 200 OK
         * {
         *      "pagination": {
         *          "limit": 5,
         *          "offset": 0,
         *          "next_offset": 5,
         *          "prev_offset": false,
         *          "last_offset": 175,
         *          "current_page": 1,
         *          "page_count": 36,
         *          "items_count": 177,
         *          "path": "/coupon"
         *      },
         *      "length": 5,
         *      "items": [
         *          {
         *              " coupon_id": "1",
         *              " status": "used"
         *          },
         *          {
         *              " coupon_id": "2",
         *              " status": "used"
         *          },
         *          {
         *              " coupon_id": "3",
         *              " status": "unused"
         *          },
         *          {
         *              " coupon_id": "4",
         *              " status": "used"
         *          },
         *          {
         *              " coupon_id": "5",
         *              " status": "unused"
         *          },
         *      ]
         * }
         */
        [CouponController::class, 'find', 'get', '/'], // Class, Method, Route, Handler, isPublic

        /**
         * @api      {put} /coupon Update a coupon
         *
         * @apiName  Update
         * @apiGroup Coupons
         *
         * @apiHeader {String} access_token OAuth2 client token
         * @apiHeaderExample Header-Example:
         * Authorization:'Bearer af7e2f2s5g8c5952d50cc961bfe7245dbd15348b'
         *
         * @apiSuccess {String} length Result set size for this page.
         * @apiSuccess {String} items A dictionary with a items property that contains an array of up to limit coupons
         * @apiSuccess {String} pagination Pagination information
         */
        [CouponController::class, 'update', 'put', '/' . FILTER_NUMERIC],
    ],
    '/oauth2' => [
        /**
         * @api      {post} /oauth2/token Request access token
         *
         * @apiName  token
         * @apiGroup OAuth
         *
         * @apiParam {String} client_id OAuth client id
         * @apiParam {String} client_secret OAuth client secret
         * @apiParam {String} username User email
         * @apiParam {String} password User password
         * @apiParam {String} grant_type OAuth request grand type
         * @apiParam {String} [scope] Authorization scope request
         *
         * @apiSuccess {String} access_token
         * @apiSuccess {String} expires_in
         * @apiSuccess {String} token_type
         * @apiSuccess {String} scope
         * @apiSuccess {String} refresh_token
         *
         * @apiSuccessExample {json} Success-Response:
         * HTTP/1.1 200 OK
         * {
         *      "access_token": "9de88adc04ff20b815b7c7e495a6fa3e7d89e54b",
         *      "refresh_token": "997dfdfdc73db55feb034b1f9f851226f84f5de3",
         *      "expires_in": "86400",
         *      "token_type": "Bearer",
         *      "scope": null
         * }
         *
         * @apiErrorExample {json} Error-Response:
         * HTTP/1.1 404 NOT FOUND
         * {
         *      "message": "Not Found",
         * }
         */
        [OAuthController::class, 'token', 'post', '/token', true], // Class, Method, Route, Handler, isPublic
    ],
];

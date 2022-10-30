<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => 'https://www.testingserver101.ml/auth/googlehandler',
    ],
    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        'redirect' => 'https://www.testingserver101.ml/auth/facebookhandler',
    ],
    'recaptcha' => [
        'key' => env('GOOGLE_RECAPTCHA_KEY'),
        'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
    ],
    'invisible-recaptcha' => [
        'key' => env('GOOGLE_INVISIBLE_RECAPTCHA_KEY'),
        'secret' => env('GOOGLE_INVISIBLE_RECAPTCHA_SECRET'),
    ],
    'stripe' => [
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'vonage' => [
        'sms_from' => '15556666666',
    ],
    'travelomatix' => [
        'key' => env('TRAVELOMATIX_KEY'),
        'username' => env('TRAVELOMATIX_USERNAME'),
        'password' => env('TRAVELOMATIX_PASSWORD'),
        'enviroment' => env('TRAVELOMATIX_ENV'),
        'base_url' => env('TRAVELOMATIX_BASE_URL'),

    ],
    'currency_exchange_service' => [
        'access_key' => '94ad23cd08d3ce5425959ed92f226a82',
    ],
    'klarna' => [
        'username' => env('KLARNA_USERNAME'),
        'password' => env('KLARNA_PASSWORD'),
    ],
    'hotelbeds' => [
        'API_KEY' => env('HOTELBEDS_API_KEY'),
        'API_SECRET' => env('HOTELBEDS_API_SECRET'),
        'base_url' => env('APP_ENV') == 'production' ? 'https://api.test.hotelbeds.com/' : 'https://api.test.hotelbeds.com/',
    ]

];

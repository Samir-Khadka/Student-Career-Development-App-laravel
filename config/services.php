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
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],

    // Job API Services
    'adzuna' => [
        'app_id' => env('ADZUNA_APP_ID'),
        'api_key' => env('ADZUNA_API_KEY'),
        'base_url' => 'https://api.adzuna.com/v1/api',
    ],

    'reed' => [
        'api_key' => env('REED_API_KEY'),
        'base_url' => 'https://www.reed.co.uk/api/1.0',
    ],

    'indeed' => [
        'publisher_id' => env('INDEED_PUBLISHER_ID'),
        'api_key' => env('INDEED_API_KEY'),
        'base_url' => 'https://api.indeed.com/ads/apisearch',
    ],

];
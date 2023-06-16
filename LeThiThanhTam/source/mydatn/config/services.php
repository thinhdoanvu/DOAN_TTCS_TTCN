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

    'google' => [
        'client_id' => '278160199090-olaajbspmjso5cclidgh9o8uajhgp2t3.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost:8000/tai-khoan/login/google',
    ],
    
    'facebook' => [
        'client_id' => '964244458288204',
        'client_secret' => 'fa0ea4262319d2ac2c8ed17299613233',
        'redirect' => '/tai-khoan/login/facebook/callback',
    ],

];

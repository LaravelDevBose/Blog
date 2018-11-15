<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '2097313277220989',         // Your GitHub Client ID
        'client_secret' => '4c1acadf4262e417724623f64bcb6a67', // Your GitHub Client Secret
        'redirect' => 'http://localhost/Blog/auth/facebook/callback',
    ],

    'twitter' => [
        'client_id' => 'SnzU3PQUzYq3oY0AsaEVy0ye4',         // Your GitHub Client ID
        'client_secret' => 'k42QDiZrCRp1NqbTqjP9rdEsmxxI0ZYYs6X2jtWtsEx6kSfBqY', // Your GitHub Client Secret
        'redirect' => 'http://localhost/Blog/auth/twitter/callback',
    ],

    'google' => [
        'client_id' => '650438412225-uhfgs1hs1h558rik73bfn674c4klcn64.apps.googleusercontent.com',         // Your GitHub Client ID
        'client_secret' => '5I2PkxSktAKpvnQbd_La3JXF', // Your GitHub Client Secret
        'redirect' => 'http://localhost/Blog/auth/google/callback',
    ],

];

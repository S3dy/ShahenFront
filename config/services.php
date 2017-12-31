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
        //'client_id'=>'1706510156306719',
        //'client_secret'=>'0257538c3a460f14307b998fd64ec66f',
        // 'redirect'=>'http://products.cogzidel.com/rbs/signup/create-account/facebook/callback',
          //'client_id'=>'1424519307558192',
          //'client_secret'=>'9e065c0329f958268fc630407633db83',
         // 'redirect'=>'http://demo.cogzidel.com/upc/signup/create-account/facebook/callback',
    // 'client_id' => env('facebook_client_id'),
    // 'client_secret' => env('facebook_client_secret'),
    // 'redirect' => env('APPHOST').'signup/create-account/facebook/callback',
         'client_id'=>'279970979082642',
         'client_secret'=>'071656f167e7c05ebddf30f74a328291',
         //'redirect'=>'http://localhost/upwork/newclone/upc/signup/create-account/facebook/callback',
         'redirect'=>'http://demo.cogzidel.com/upc/signup/create-account/facebook/callback',

],
        'google' => [
        // 'client_id'=>'438617032287-h754ch9g5j8ujj8ft54rdek30kk565fi.apps.googleusercontent.com',
        // 'client_secret'=>'TCBl06No-Mm0IcMln_PqosXy',
        // 'redirect'=>'http://products.cogzidel.com/rbs/signup/create-account/google/callback',
         'client_id'=>'166025985090-vvi2b14njcq9ode38aeitiocm0m09lja.apps.googleusercontent.com',
         'client_secret'=>'hPd4ylhhk09E5EmmdPwweXZO',
         //'redirect'=>'http://localhost/standard/upcnew/signup/create-account/google/callback',
        'redirect'=>'http://demo.cogzidel.com/upc/signup/create-account/google/callback',
    // 'client_id' => env('google_client_id'),
    // 'client_secret' => env('google_client_secret'),
    // 'redirect' => env('APPHOST').'signup/create-account/google/callback',
   // 'redirect' => 'http://localhost/upwork/newclone/upc/signup/create-account/google/callback',



],
        'twitter' => [
       // 'client_id'=>'OfWgvjIECUJe6COOqwE6w6GxQ',
       //  'client_secret'=>'jwm8wn6PqLJ4DYyRvcafaJVSko23yHXA2y4CM5aXAIB89Bgn1O',
       //  'redirect'=>'http://products.cogzidel.com/rbs/signup/create-account/twitter/callback',
         // 'client_id'=>'OjIc9o7iVK5rDu4h8zBlqU0YH',
         // 'client_secret'=>'FMYrp1Ihh8NDIo6bhHWeRJcb5KkGSSdybZpwplCnzFkRJ5MYJ5',
          'redirect'=>'http://demo.cogzidel.com/upc/signup/create-account/twitter/callback',
    // 'client_id' => env('twitter_client_id'),
    // 'client_secret' => env('twitter_client_secret'),
    // 'redirect' => env('APPHOST').'signup/create-account/twitter/callback',
         'client_id'=>'ooDZIaTZ23pmnFUAhvfjQoSEc',
         'client_secret'=>'cBrGRcLBYvS4EH8GaJMgvqdLSEqukg65BbqxEZzAWxYvqaxkRK',
         //'redirect'=>'http://localhost/standard/upcnew/signup/create-account/twitter/callback',

],
        'github' => [
    'client_id' => env('github_client_id'),
    'client_secret' => env('github_client_secret'),
    'redirect' => env('APPHOST').'newclone/upc/github/callback',

],

];

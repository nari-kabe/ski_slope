<?php

return [
    //twitterはbearer_tokenのみ使用
    'twitter' => [
        'key' => env('TWITTER_CLIENT_KEY'),
        'secret_key' => env('TWITTER_CLIENT_SECRET'),
        'access_token' => env('TWITTER_CLIENT_ID_ACCESS_TOKEN'),
        'access_token_secret' => env('TWITTER_CLIENT_ID_ACCESS_TOKEN_SECRET'),
        'bearer_token' => env('TWITTER_CLIENT_BEARER_TOKEN'),
        'call_back_url' => env('TWITTER_CALLBACK_URL'),
    ],
    
    'openweathermap' => [
        'key' => env('OPEN_WHATHER_MAP_API_KEY'),
        'url' => env('OPEN_WHATHER_MAP_URL'),
    ],
    
    'googlemap' => [
        'key' => env('GOOGLE_MAP_API_KEY'),
    ]
];
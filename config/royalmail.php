<?php

return [
    'shipping' => [
        'auth' => [
            'clientId' => env('ROYALMAIL_SHIPPING_AUTH_CLIENT_ID'),
            'clientSecret' => env('ROYALMAIL_SHIPPING_AUTH_CLIENT_SECRET'),
        ],
        'cache' => [
            'prefix' => env('ROYALMAIL_SHIPPING_CACHE_PREFIX', ''),
            'ttl' => env('ROYALMAIL_SHIPPING_CACHE_TTL', 600),
        ],
        'serializer' => [
            'cachePath' => env('ROYALMAIL_SHIPPING_SERIALIZER_CACHE_PATH', storage_path('framework/cache/royalmail/shipping')),
            'debug' => env('ROYALMAIL_SHIPPING_SERIALIZER_DEBUG', false),
        ],
    ],
    'tracking' => [
        'auth' => [
            'clientId' => env('ROYALMAIL_TRACKING_AUTH_CLIENT_ID'),
            'clientSecret' => env('ROYALMAIL_TRACKING_AUTH_CLIENT_SECRET'),
        ],
        'serializer' => [
            'cachePath' => env('ROYALMAIL_TRACKING_SERIALIZER_CACHE_PATH', storage_path('framework/cache/royalmail/tracking')),
            'debug' => env('ROYALMAIL_TRACKING_SERIALIZER_DEBUG', false),
        ],
    ],
];

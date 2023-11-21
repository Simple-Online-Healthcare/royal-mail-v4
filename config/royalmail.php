<?php

declare(strict_types=1);

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
];

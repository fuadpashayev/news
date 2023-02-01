<?php

use App\Services\Formatters\{GNewsFormatter, GuardianFormatter, NewsApiOrgFormatter, NewsDataIoFormatter};
use App\Services\Sources\{GNewsSource, GuardianSource, NewsApiOrgSource, NewsDataIoSource};

return [
    'sources' => [
        'newsApiOrg' => [
            'source' => NewsApiOrgSource::class,
            'formatter' => NewsApiOrgFormatter::class,
            'config'    => [
                'base_uri' => 'https://newsapi.org/v2/',
                'headers' => [
                    'X-Api-Key' => env('NEWSAPIORG_API_KEY'),
                ],
            ]
        ],
        'gNews' => [
            'token' => env('GNEWS_API_KEY'),
            'source' => GNewsSource::class,
            'formatter' => GNewsFormatter::class,
            'config'    => [
                'base_uri' => 'https://gnews.io/api/v4/',
            ]
        ],
        'newsDataIo' => [
            'source' => NewsDataIoSource::class,
            'formatter' => NewsDataIoFormatter::class,
            'config' => [
                'base_uri' => 'https://newsdata.io/api/1/',
                'headers' => [
                    'X-ACCESS-KEY' => env('NEWSDATAIO_API_KEY'),
                ],
            ],
        ],
        'guardian' => [
            'token' => env('GUARDIAN_API_KEY'),
            'source' => GuardianSource::class,
            'formatter' => GuardianFormatter::class,
            'config' => [
                'base_uri' => 'https://content.guardianapis.com/'
            ],
        ],
    ],
    'cacheTime' => env('NEWS_CACHE_TIME', 10)
];

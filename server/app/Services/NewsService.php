<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

class NewsService
{
    protected array $newsSources;

    public function __construct(array $newsSources)
    {
        $this->newsSources = $newsSources;
    }

    /**
     * Get news from all sources, cache them and shuffle before returning them to the client
     *
     * @param array $filters
     * @return array
     */
    public function getNews(array $filters): array
    {
        $cacheKey = md5(json_encode($filters));
        $news = Cache::remember($cacheKey, config('news.cacheTime'), fn() => $this->getNewsFromAllSources($filters));
        return Arr::shuffle($news);
    }

    /**
     * Get news from all sources and merge them into one array
     *
     * @param $filters
     * @return array
     */
    public function getNewsFromAllSources($filters): array
    {
        return array_reduce($this->newsSources, function($news, $source) use($filters) {
            try {
                $data = $source->getNews($filters);
            } catch (Exception) {
                $data = [];
            }
            return array_merge($news, $data);
        }, []);
    }
}

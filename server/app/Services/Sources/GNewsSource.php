<?php

namespace App\Services\Sources;

class GNewsSource extends NewsSource
{
    public function getUrlPath(array $filters): string
    {
        return 'top-headlines';
    }

    public function getQuery(array $filters): array
    {
        return [
            'query' => [
                'lang' => $this->filterLanguage,
                'token' => config('news.sources.gNews.token'),
                'q' => $filters['keyword'],
                'from' => "{$filters['date_from']}T00:00:00Z",
                'to' => "{$filters['date_to']}T19:59:00Z",
                'topic' => $this->filterCategory
            ]
        ];
    }

    public function getResponseStructure(): string
    {
        return 'articles';
    }
}

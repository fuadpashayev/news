<?php

namespace App\Services\Sources;

class NewsApiOrgSource extends NewsSource
{
    public function getUrlPath(array $filters): string
    {
        return match (true) {
            !!$filters['category'] => 'top-headlines',
            default => 'everything',
        };
    }

    public function getQuery(array $filters): array
    {
        return [
            'query' => [
                'language' => $this->filterLanguage,
                'pageSize' => 10,
                'q' => $filters['keyword'],
                'from' => $filters['date_from'],
                'to' => $filters['date_to'],
                'category' => $this->filterCategory
            ]
        ];
    }

    public function getResponseStructure(): string
    {
        return 'articles';
    }
}

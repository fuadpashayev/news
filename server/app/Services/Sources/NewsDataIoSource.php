<?php

namespace App\Services\Sources;

class NewsDataIoSource extends NewsSource
{
    public function getUrlPath(array $filters): string
    {
        return 'news';
    }

    public function getQuery(array $filters): array
    {
        return [
            'query' => [
                'language' => $this->filterLanguage,
                'q' => $filters['keyword'],
                'from_date' => $filters['date_from'],
                'to_date' => $filters['date_to'],
                'category' => $this->filterCategory,
            ]
        ];
    }

    public function getResponseStructure(): string
    {
        return 'results';
    }

}

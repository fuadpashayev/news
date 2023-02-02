<?php

namespace App\Services\Sources;

class NewsApiOrgSource extends NewsSource
{
    /**
     * This method is used to get the url path where the news will be fetched from.
     *
     * @param array $filters
     * @return string
     */
    public function getUrlPath(array $filters): string
    {
        return match (true) {
            !!$filters['category'] => 'top-headlines',
            default => 'everything',
        };
    }

    /**
     * This method is used to generate the query parameters for the API.
     *
     * @param array $filters
     * @return array[]
     */
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

    /**
     * This method is used to get the structure of the response from the API. for example: { "articles": [] }
     *
     * @return string
     */
    public function getResponseStructure(): string
    {
        return 'articles';
    }
}

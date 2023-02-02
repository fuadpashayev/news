<?php

namespace App\Services\Sources;

class GNewsSource extends NewsSource
{
    /**
     * This method is used to get the url path where the news will be fetched from.
     *
     * @param array $filters
     * @return string
     */
    public function getUrlPath(array $filters): string
    {
        return 'top-headlines';
    }

    /**
     * This method is used to generate the query parameters for the API.
     *
     * @param array $filters
     * @return array
     */
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

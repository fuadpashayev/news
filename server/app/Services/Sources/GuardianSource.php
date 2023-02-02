<?php

namespace App\Services\Sources;

class GuardianSource extends NewsSource
{
    /**
     * This method is used to get the url path where the news will be fetched from.
     *
     * @param array $filters
     * @return string
     */
    public function getUrlPath(array $filters): string
    {
        return 'search';
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
                'lang' => $this->filterLanguage,
                'api-key' => config('news.sources.guardian.token'),
                'q' => $filters['keyword'],
                'from-date' => $filters['date_from'],
                'to-date' => $filters['date_to'],
                'show-fields' => 'headline,trailText,bodyText,byline,thumbnail,publication',
                'section' => $this->filterCategory
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
        return 'response.results';
    }

}

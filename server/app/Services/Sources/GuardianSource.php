<?php

namespace App\Services\Sources;

class GuardianSource extends NewsSource
{
    public function getUrlPath(array $filters): string
    {
        return 'search';
    }

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

    public function getResponseStructure(): string
    {
        return 'response.results';
    }

}

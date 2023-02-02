<?php

namespace App\Services;

use Illuminate\Http\Request;

class FilterService
{
    protected array $filterKeys = [
        'keyword',
        'date_from',
        'date_to',
        'category',
        'language',
    ];

    /**
     * Get filters from request and combine them with filter keys
     *
     * @param Request $request
     * @return array
     */
    public function getFilters(Request $request): array
    {
        return array_combine($this->filterKeys, array_map(fn($key) => $request->get($key), $this->filterKeys));
    }
}

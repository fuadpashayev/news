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

    public function getFilters(Request $request): array
    {
        return array_combine($this->filterKeys, array_map(fn($key) => $request->get($key), $this->filterKeys));
    }
}

<?php

namespace App\Services\Sources\Contracts;

use App\Services\Formatters\Formatter;

interface NewsSourceInterface
{
    public function getNews(array $filters): array;
    public function getUrlPath(array $filters): string;
    public function getQuery(array $filters): array;
    public function getResponseStructure(): string;
}

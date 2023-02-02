<?php

namespace App\Services;

use App\Services\Categories\Contracts\NewsCategoryKeysInterface;
use App\Services\Sources\Contracts\NewsLanguagesInterface;
use ReflectionClass;

class FilterItemsService
{

    /**
     * Get all categories
     *
     * @return array
     */
    public function getCategories(): array
    {
        $class = new ReflectionClass(NewsCategoryKeysInterface::class);
        return $class->getConstants();
    }

    /**
     * Get all languages
     *
     * @return array
     */
    public function getLanguages(): array
    {
        $class = new ReflectionClass(NewsLanguagesInterface::class);
        return $class->getConstants();
    }
}

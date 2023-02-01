<?php

namespace App\Services;

use App\Services\Categories\Contracts\NewsCategoryKeysInterface;
use App\Services\Sources\Contracts\NewsLanguagesInterface;
use ReflectionClass;

class FilterItemsService
{

    public function getCategories(): array
    {
        $class = new ReflectionClass(NewsCategoryKeysInterface::class);
        return $class->getConstants();
    }

    public function getLanguages(): array
    {
        $class = new ReflectionClass(NewsLanguagesInterface::class);
        return $class->getConstants();
    }
}

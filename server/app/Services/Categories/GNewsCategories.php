<?php

namespace App\Services\Categories;

use App\Services\Categories\Contracts\{NewsCategoryInterface, NewsCategoryKeysInterface};

class GNewsCategories implements NewsCategoryInterface, NewsCategoryKeysInterface
{
    public function getCategories(): array
    {
        return [
            self::BREAKING,
            self::WORLD,
            self::NATION,
            self::BUSINESS,
            self::TECHNOLOGY,
            self::ENTERTAINMENT,
            self::SPORTS,
            self::SCIENCE,
            self::HEALTH
        ];
    }
}

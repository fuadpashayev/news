<?php

namespace App\Services\Sources;

use App\Services\Categories\Contracts\{NewsCategoryInterface, NewsCategoryKeysInterface};

class ExampleCategories implements NewsCategoryInterface, NewsCategoryKeysInterface
{
    /**
     * This method is used to set the categories of the news source.
     *
     * @return array
     */
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

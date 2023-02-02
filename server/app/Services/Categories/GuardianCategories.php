<?php

namespace App\Services\Categories;

use App\Services\Categories\Contracts\{NewsCategoryInterface, NewsCategoryKeysInterface};

class GuardianCategories implements NewsCategoryInterface, NewsCategoryKeysInterface
{
    /**
     * This method is used to set the categories of the news source.
     *
     * @return array
     */
    public function getCategories(): array
    {
        return [
            self::WORLD,
            self::BUSINESS,
            self::TECHNOLOGY,
            self::SPORTS => 'sport',
            self::SCIENCE,
            self::HEALTH => 'healthcare-network',
            self::FOOD,
            self::POLITICS,
            self::TRAVEL
        ];
    }
}

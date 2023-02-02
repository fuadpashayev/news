<?php

namespace App\Services\Categories;

use App\Services\Categories\Contracts\{NewsCategoryInterface, NewsCategoryKeysInterface};

class NewsApiOrgCategories implements NewsCategoryInterface, NewsCategoryKeysInterface
{
    /**
     * This method is used to set the categories of the news source.
     *
     * @return array
     */
    public function getCategories(): array
    {
        return [
            self::BUSINESS,
            self::ENTERTAINMENT,
            self::GENERAL,
            self::HEALTH,
            self::SCIENCE,
            self::SPORTS,
            self::TECHNOLOGY
        ];
    }
}

<?php

namespace App\Services\Categories\Contracts;

interface NewsCategoryInterface
{
    /**
     * This method is used to set the categories of the news source.
     *
     * @return array
     */
    public function getCategories(): array;
}

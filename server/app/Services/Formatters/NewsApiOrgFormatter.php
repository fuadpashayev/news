<?php

namespace App\Services\Formatters;

class NewsApiOrgFormatter extends Formatter
{
    public function getFormat(): array
    {
        return  [
            self::TITLE => 'title',
            self::DESCRIPTION => 'description',
            self::CONTENT => 'content',
            self::AUTHOR => 'author',
            self::URL => 'url',
            self::IMAGE_URL => 'urlToImage',
            self::PUBLISHED_AT => 'publishedAt',
            self::SOURCE => 'source.name',
        ];
    }
}

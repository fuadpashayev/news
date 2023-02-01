<?php

namespace App\Services\Formatters;

class GNewsFormatter extends Formatter
{
    public function getFormat(): array
    {
        return  [
            self::TITLE => 'title',
            self::DESCRIPTION => 'description',
            self::CONTENT => 'content',
            self::AUTHOR => '',
            self::URL => 'url',
            self::IMAGE_URL => 'image',
            self::PUBLISHED_AT => 'publishedAt',
            self::SOURCE => 'source.name',
        ];
    }
}

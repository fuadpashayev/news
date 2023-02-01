<?php

namespace App\Services\Formatters;

class NewsDataIoFormatter extends Formatter
{
    public function getFormat(): array
    {
        return  [
            self::TITLE => 'title',
            self::DESCRIPTION => 'description',
            self::CONTENT => 'content',
            self::AUTHOR => 'creator.0',
            self::URL => 'link',
            self::IMAGE_URL => 'image_url',
            self::PUBLISHED_AT => 'pubDate',
            self::SOURCE => 'source_id',
        ];
    }
}

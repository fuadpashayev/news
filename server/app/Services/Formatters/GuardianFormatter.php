<?php

namespace App\Services\Formatters;

class GuardianFormatter extends Formatter
{
    public function getFormat(): array
    {
        return  [
            self::TITLE => 'fields.headline',
            self::DESCRIPTION => 'fields.trailText',
            self::CONTENT => 'fields.bodyText',
            self::AUTHOR => 'fields.byline',
            self::URL => 'webUrl',
            self::IMAGE_URL => 'fields.thumbnail',
            self::PUBLISHED_AT => 'webPublicationDate',
            self::SOURCE => 'fields.publication',
        ];
    }
}

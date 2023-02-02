<?php

namespace App\Services\Formatters;

class GuardianFormatter extends Formatter
{
    /**
     * This method is used to generate the format of the response from the API.
     *
     * @return string[]
     */
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

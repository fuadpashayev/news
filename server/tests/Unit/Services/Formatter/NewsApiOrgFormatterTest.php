<?php

namespace Tests\Unit\Services\Formatter;

use Tests\TestCase;

class NewsApiOrgFormatterTest extends TestCase
{
    use FormatterTest;
    public function testName()
    {
        $this->getData('newsApiOrg');
    }
}

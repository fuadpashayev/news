<?php

namespace Tests\Unit\Services\Formatter;

use Tests\TestCase;

class NewsDataIoFormatterTest extends TestCase
{
    use FormatterTest;
    public function testName()
    {
        $this->getData('newsDataIo');
    }
}

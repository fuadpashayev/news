<?php

namespace Tests\Unit\Services\Formatter;

use Tests\TestCase;

class GNewsFormatterTest extends TestCase
{
    use FormatterTest;
    public function testName()
    {
        $this->getData('gNews');
    }
}

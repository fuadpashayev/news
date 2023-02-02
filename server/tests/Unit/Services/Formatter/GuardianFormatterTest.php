<?php

namespace Tests\Unit\Services\Formatter;

use Tests\TestCase;

class GuardianFormatterTest extends TestCase
{
    use FormatterTest;
    public function testName()
    {
        $this->getData('guardian');
    }
}

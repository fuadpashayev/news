<?php

namespace Tests\Unit\Services\Formatter;

use Tests\TestCase;

class NewsApiOrgFormatterTest extends TestCase
{
    public function test_example()
    {

        ['config' => $config, 'className' => $className, 'formatter' => $formatter] = config('news.sources.newsApiOrg');

        $source = new $className(new $formatter, $config);

        $data = $source->getNews();

        $this->assertIsArray($data);

        foreach ((new $formatter)->getFormat() as $key => $value)
        {
            $this->assertArrayHasKey($key, $data[0]);
        }
    }
}

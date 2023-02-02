<?php

namespace Tests\Unit\Services\Formatter;

trait FormatterTest
{
    public array $data;
    public array $format;
    public function getData(string $name): void
    {
        ['config' => $config, 'source' => $sourceClass, 'formatter' => $formatter] = config("news.sources.$name");

        $source = new $sourceClass(new $formatter, $config, 'guardian');
        $format = (new $formatter)->getFormat();

        $filters = [
            'keyword' => 'bitcoin',
            'date_from' => '2021-01-01',
            'date_to' => '2022-01-01',
            'language' => 'en',
            'category' => 'business'
        ];
        $data = $source->getNews($filters);
        $this->assertIsArray($data);
        foreach ($format as $key => $value)
        {
            $this->assertArrayHasKey($key, $data[0]);
        }
    }
}

<?php

namespace App\Services\Sources;

use App\Services\Formatters\Contracts\FormatterKeysInterface;
use App\Services\Formatters\Formatter;
use App\Services\Sources\Contracts\NewsSourceInterface;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

abstract class NewsSource implements NewsSourceInterface {

    protected Client $client;
    protected Formatter $formatter;

    private array $filters;
    protected string $filterLanguage;
    protected string $filterCategory;

    /**
     * @param Formatter $formatter
     * @param array $config
     * @param string $sourceName
     */
    public function __construct(Formatter $formatter, array $config, public string $sourceName)
    {
        $this->formatter = $formatter->merge([FormatterKeysInterface::SOURCE_API => $sourceName]);
        $this->client = new Client($config);
    }

    /**
     * @param $filters
     * @return array
     * @throws GuzzleException
     */
    public function getNews($filters): array
    {
        $responseStructure = $this->getResponseStructure();
        $response = $this->getResponse($filters);
        $structuredResponse = data_get($response, $responseStructure);
        return $this->formatter->format($structuredResponse);
    }

    /**
     * @param $key
     * @param string $default
     * @return string
     */
    public function getSetting($key, string $default): string
    {
        $settings = auth()->user()?->settings;
        $setting = $settings?->where('key', $key)?->first();
        return $this->filters[$key] ?? $setting->value ?? $default;
    }

    /**
     * @return void
     */
    public function getFilterSettings(): void
    {
        $this->filterLanguage = $this->getSetting('language', 'en');
        $this->filterCategory = $this->getSetting('category', 'sport');
    }

    /**
     * @param array $filters
     * @return array
     * @throws GuzzleException
     */
    public function getResponse(array $filters): array
    {
        $this->filters = $filters;
        $this->getFilterSettings();
        $url = $this->getUrlPath($filters);
        $query = $this->getQuery($filters);
        $request = $this->client->get($url, $query);
        return json_decode($request->getBody(), 1);
    }
}

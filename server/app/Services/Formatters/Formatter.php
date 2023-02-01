<?php

namespace App\Services\Formatters;

use App\Services\Formatters\Contracts\{FormatterInterface, FormatterKeysInterface};

abstract class Formatter implements FormatterInterface, FormatterKeysInterface
{
    public array $dataToMerge = [];

    /**
     * This method adds additional data to the formatted data
     *
     * @param array $dataToMerge
     * @return $this
     */
    public function merge(array $dataToMerge): Formatter
    {
        $this->dataToMerge = $dataToMerge;
        return $this;
    }
    /**
     * This method formats array of data according to the format
     *
     * @param array $data
     * @return array
     */
    public function format(array $data): array
    {
        $format = $this->getFormat();

        return array_map(function ($item) use ($format) {
            $formattedItem = [];
            foreach ($format as $key => $value) {
                $formattedItem[$key] = $this->getValue($item, $value);
            }
            return array_merge($formattedItem, $this->dataToMerge);
        }, $data);
    }

    /**
     * This method gets value from array by key with the support of dot notation
     *
     * @param array $data
     * @param string $key
     * @return string|array|null
     */
    public function getValue(array $data, string $key): string|null|array
    {
        return data_get($data, $key);
    }
}

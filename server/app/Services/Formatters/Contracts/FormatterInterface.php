<?php

namespace App\Services\Formatters\Contracts;

use App\Services\Formatters\Formatter;

interface FormatterInterface
{
    /**
     * @param array $dataToMerge
     * @return Formatter
     */
    public function merge(array $dataToMerge): Formatter;

    /**
     * @param array $data
     * @return array
     */
    public function format(array $data): array;

    /**
     * @return array
     */
    public function getFormat(): array;

    /**
     * @param array $data
     * @param string $key
     * @return string|array|null
     */
    public function getValue(array $data, string $key): string|null|array;
}

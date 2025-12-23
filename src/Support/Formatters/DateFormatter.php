<?php

declare(strict_types=1);

namespace XBot\OneUI\Support\Formatters;

use Carbon\Carbon;
use XBot\OneUI\Contracts\FormatterContract;

/**
 * Date Formatter
 *
 * Formats date values to specified format strings.
 */
class DateFormatter implements FormatterContract
{
    protected string $defaultFormat = 'Y-m-d';

    /**
     * Format date
     *
     * @param  mixed  $value  Date value
     * @param  array  $options  Options (dateFormat, timezone)
     */
    public function format(mixed $value, array $options = []): string
    {
        if (empty($value)) {
            return '';
        }

        $format = $options['dateFormat'] ?? $this->defaultFormat;

        try {
            $date = Carbon::parse($value);

            if (!empty($options['timezone'])) {
                $date = $date->timezone($options['timezone']);
            }

            return $date->format($format);
        } catch (\Exception $e) {
            return (string) $value;
        }
    }

    /**
     * Set default format
     */
    public function setDefaultFormat(string $format): self
    {
        $this->defaultFormat = $format;

        return $this;
    }

    public function getName(): string
    {
        return 'date';
    }
}

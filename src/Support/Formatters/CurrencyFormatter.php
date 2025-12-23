<?php

declare(strict_types=1);

namespace XBot\OneUI\Support\Formatters;

use XBot\OneUI\Contracts\FormatterContract;

/**
 * Currency Formatter
 *
 * Formats numeric values into currency strings.
 */
class CurrencyFormatter implements FormatterContract
{
    protected string $defaultSymbol = '$';

    protected int $defaultDecimals = 2;

    /**
     * Format currency
     *
     * @param  mixed  $value  Numeric value
     * @param  array  $options  Options (currencySymbol, decimals, thousandsSeparator, decimalPoint)
     */
    public function format(mixed $value, array $options = []): string
    {
        if (!is_numeric($value)) {
            return (string) $value;
        }

        $symbol = $options['currencySymbol'] ?? $this->defaultSymbol;
        $decimals = $options['decimals'] ?? $this->defaultDecimals;
        $thousandsSeparator = $options['thousandsSeparator'] ?? ',';
        $decimalPoint = $options['decimalPoint'] ?? '.';

        $formatted = number_format((float) $value, $decimals, $decimalPoint, $thousandsSeparator);

        // Support symbol position configuration
        $symbolPosition = $options['symbolPosition'] ?? 'before';

        return $symbolPosition === 'after'
            ? $formatted . $symbol
            : $symbol . $formatted;
    }

    /**
     * Set default currency symbol
     */
    public function setDefaultSymbol(string $symbol): self
    {
        $this->defaultSymbol = $symbol;

        return $this;
    }

    public function getName(): string
    {
        return 'currency';
    }
}

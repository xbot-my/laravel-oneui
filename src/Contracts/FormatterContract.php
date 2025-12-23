<?php

declare(strict_types=1);

namespace XBot\OneUI\Contracts;

/**
 * Formatter Contract
 *
 * Defines the contract for value formatting (such as date, currency, Badge, etc.).
 */
interface FormatterContract
{
    /**
     * Format value
     *
     * @param  mixed  $value  Original value
     * @param  array  $options  Formatting options
     * @return string Formatted string
     */
    public function format(mixed $value, array $options = []): string;

    /**
     * Get formatter name
     */
    public function getName(): string;
}

<?php

declare(strict_types=1);

namespace XBot\OneUI\Contracts;

use XBot\OneUI\Support\ItemCollection;

/**
 * Data Source Contract
 *
 * Defines the contract for converting from various data sources (array, Collection, Eloquent, Paginator) to a unified format.
 */
interface DataSourceContract
{
    /**
     * Convert to array
     */
    public function toArray(): array;

    /**
     * Convert to ItemCollection
     *
     * @param  array  $config  Column/item configuration
     */
    public function toItems(array $config = []): ItemCollection;

    /**
     * Get item count
     */
    public function count(): int;

    /**
     * Check if is empty
     */
    public function isEmpty(): bool;
}

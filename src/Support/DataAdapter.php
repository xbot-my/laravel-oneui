<?php

declare(strict_types=1);

namespace XBot\OneUI\Support;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use XBot\OneUI\Contracts\DataSourceContract;

/**
 * Data Adapter
 *
 * Uniformly handles various data sources (array, Collection, Eloquent, Paginator),
 * converting them to a unified ItemCollection format.
 */
class DataAdapter implements DataSourceContract
{
    protected mixed $source;

    protected array $items = [];

    protected bool $hasPaginator = false;

    protected ?LengthAwarePaginator $paginator = null;

    protected string $identifierKey = 'id';

    public function __construct(mixed $source = null, string $identifierKey = 'id')
    {
        $this->source = $source;
        $this->identifierKey = $identifierKey;
        $this->processSource();
    }

    /**
     * Process data source
     */
    protected function processSource(): void
    {
        if ($this->source === null) {
            return;
        }

        // LengthAwarePaginator
        if ($this->source instanceof LengthAwarePaginator) {
            $this->hasPaginator = true;
            $this->paginator = $this->source;
            $this->items = $this->normalizeItems($this->source->items());

            return;
        }

        // Collection
        if ($this->source instanceof Collection) {
            $this->items = $this->normalizeItems($this->source->all());

            return;
        }

        // Array
        if (is_array($this->source)) {
            $this->items = $this->normalizeItems($this->source);

            return;
        }

        // Object with toArray method (Eloquent, etc.)
        if (is_object($this->source) && method_exists($this->source, 'toArray')) {
            $this->items = $this->normalizeItems($this->source->toArray());

            return;
        }

        // Single object - wrap in array
        if (is_object($this->source)) {
            $this->items = [(array) $this->source];
        }
    }

    /**
     * Normalize item array
     */
    protected function normalizeItems(array $items): array
    {
        return array_map(function ($item) {
            if (is_object($item) && method_exists($item, 'toArray')) {
                return $item->toArray();
            }

            return is_object($item) ? (array) $item : $item;
        }, $items);
    }

    /**
     * Convert to array
     */
    public function toArray(): array
    {
        return $this->items;
    }

    /**
     * Convert to ItemCollection
     */
    public function toItems(array $config = []): ItemCollection
    {
        return new ItemCollection($this->items, $this->identifierKey);
    }

    /**
     * Get item count
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * Check if is empty
     */
    public function isEmpty(): bool
    {
        return empty($this->items);
    }

    /**
     * Check if has paginator
     */
    public function hasPaginator(): bool
    {
        return $this->hasPaginator;
    }

    /**
     * Get paginator
     */
    public function getPaginator(): ?LengthAwarePaginator
    {
        return $this->paginator;
    }

    /**
     * Set identifier key
     */
    public function setIdentifierKey(string $key): self
    {
        $this->identifierKey = $key;

        return $this;
    }
}

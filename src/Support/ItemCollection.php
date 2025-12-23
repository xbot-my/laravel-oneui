<?php

declare(strict_types=1);

namespace XBot\OneUI\Support;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Traversable;

/**
 * Item Collection
 *
 * Encapsulates multiple DataItems, providing iterable and countable collection operations.
 */
class ItemCollection implements IteratorAggregate, Countable
{
    /**
     * @var DataItem[]
     */
    protected array $items = [];

    protected string $identifierKey;

    /**
     * @param  array  $items  Raw data array
     * @param  string  $identifierKey  Identifier key name
     */
    public function __construct(array $items = [], string $identifierKey = 'id')
    {
        $this->identifierKey = $identifierKey;
        $this->setItems($items);
    }

    /**
     * Set items
     */
    public function setItems(array $items): self
    {
        $this->items = [];
        foreach ($items as $item) {
            $this->items[] = DataItem::make($item, $this->identifierKey);
        }

        return $this;
    }

    /**
     * Add item
     */
    public function add(mixed $item): self
    {
        $this->items[] = DataItem::make($item, $this->identifierKey);

        return $this;
    }

    /**
     * Get all items
     *
     * @return DataItem[]
     */
    public function all(): array
    {
        return $this->items;
    }

    /**
     * Get first item
     */
    public function first(): ?DataItem
    {
        return $this->items[0] ?? null;
    }

    /**
     * Get last item
     */
    public function last(): ?DataItem
    {
        return $this->items[count($this->items) - 1] ?? null;
    }

    /**
     * Get item by index
     */
    public function get(int $index): ?DataItem
    {
        return $this->items[$index] ?? null;
    }

    /**
     * Find item by identifier
     */
    public function find(mixed $identifier): ?DataItem
    {
        foreach ($this->items as $item) {
            if ($item->getIdentifier() === $identifier) {
                return $item;
            }
        }

        return null;
    }

    /**
     * Filter items
     */
    public function filter(callable $callback): self
    {
        $filtered = new self([], $this->identifierKey);
        foreach ($this->items as $item) {
            if ($callback($item)) {
                $filtered->items[] = $item;
            }
        }

        return $filtered;
    }

    /**
     * Map items
     */
    public function map(callable $callback): array
    {
        return array_map($callback, $this->items);
    }

    /**
     * Pluck values by key
     */
    public function pluck(string $key): array
    {
        return array_map(fn(DataItem $item) => $item->getValue($key), $this->items);
    }

    /**
     * Convert to array
     */
    public function toArray(): array
    {
        return array_map(fn(DataItem $item) => $item->toArray(), $this->items);
    }

    /**
     * Convert to JSON string
     */
    public function toJson(int $options = 0): string
    {
        return json_encode($this->toArray(), $options);
    }

    /**
     * Check if is empty
     */
    public function isEmpty(): bool
    {
        return empty($this->items);
    }

    /**
     * Check if is not empty
     */
    public function isNotEmpty(): bool
    {
        return !$this->isEmpty();
    }

    /**
     * Get count
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * Get iterator
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }
}

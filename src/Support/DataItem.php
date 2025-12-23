<?php

declare(strict_types=1);

namespace XBot\OneUI\Support;

use XBot\OneUI\Contracts\ItemRenderable;

/**
 * Data Item Wrapper
 *
 * Wraps a single list item (such as a table row, menu item), providing a unified access interface.
 */
class DataItem implements ItemRenderable
{
    protected array $data;

    protected string $identifierKey;

    public function __construct(array $data, string $identifierKey = 'id')
    {
        $this->data = $data;
        $this->identifierKey = $identifierKey;
    }

    /**
     * Create DataItem from mixed type
     */
    public static function make(mixed $item, string $identifierKey = 'id'): self
    {
        if ($item instanceof self) {
            return $item;
        }

        if (is_object($item) && method_exists($item, 'toArray')) {
            return new self($item->toArray(), $identifierKey);
        }

        if (is_object($item)) {
            return new self((array) $item, $identifierKey);
        }

        return new self((array) $item, $identifierKey);
    }

    /**
     * Get value by key, supports dot notation for nested keys
     */
    public function getValue(string $key, mixed $default = null): mixed
    {
        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }

        // Support dot notation: user.name => $data['user']['name']
        if (str_contains($key, '.')) {
            $value = $this->data;
            foreach (explode('.', $key) as $segment) {
                if (!is_array($value) || !array_key_exists($segment, $value)) {
                    return $default;
                }
                $value = $value[$segment];
            }

            return $value;
        }

        return $default;
    }

    /**
     * Check if key exists
     */
    public function hasKey(string $key): bool
    {
        if (array_key_exists($key, $this->data)) {
            return true;
        }

        if (str_contains($key, '.')) {
            $value = $this->data;
            foreach (explode('.', $key) as $segment) {
                if (!is_array($value) || !array_key_exists($segment, $value)) {
                    return false;
                }
                $value = $value[$segment];
            }

            return true;
        }

        return false;
    }

    /**
     * Get unique identifier
     */
    public function getIdentifier(): mixed
    {
        return $this->getValue($this->identifierKey);
    }

    /**
     * Convert to array
     */
    public function toArray(): array
    {
        return $this->data;
    }

    /**
     * Convert to JSON string
     */
    public function toJson(int $options = 0): string
    {
        return json_encode($this->data, $options | JSON_HEX_APOS | JSON_HEX_QUOT);
    }

    /**
     * Magic method: property access
     */
    public function __get(string $name): mixed
    {
        return $this->getValue($name);
    }

    /**
     * Magic method: property check
     */
    public function __isset(string $name): bool
    {
        return $this->hasKey($name);
    }
}

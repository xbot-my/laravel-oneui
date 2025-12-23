<?php

declare(strict_types=1);

namespace XBot\OneUI\Contracts;

/**
 * Item Renderable Contract
 *
 * Defines the common behavior contract for list items (such as table rows, menu items, dropdown options).
 */
interface ItemRenderable
{
    /**
     * Get value by key
     *
     * @param  string  $key  Key name, supports dot notation for nested keys
     * @param  mixed  $default  Default value
     */
    public function getValue(string $key, mixed $default = null): mixed;

    /**
     * Check if key exists
     */
    public function hasKey(string $key): bool;

    /**
     * Convert to array
     */
    public function toArray(): array;

    /**
     * Convert to JSON string
     */
    public function toJson(int $options = 0): string;

    /**
     * Get unique identifier (such as ID)
     */
    public function getIdentifier(): mixed;
}

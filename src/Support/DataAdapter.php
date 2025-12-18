<?php

declare(strict_types=1);

namespace XBot\OneUI\Support;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use XBot\OneUI\Contracts\DataSourceContract;

/**
 * 数据适配器
 *
 * 统一处理各种数据源（array、Collection、Eloquent、Paginator），
 * 将其转换为统一的 ItemCollection 格式。
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
     * 处理数据源
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
     * 规范化项目数组
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
     * 转换为数组
     */
    public function toArray(): array
    {
        return $this->items;
    }

    /**
     * 转换为项目集合
     */
    public function toItems(array $config = []): ItemCollection
    {
        return new ItemCollection($this->items, $this->identifierKey);
    }

    /**
     * 获取项目数量
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * 是否为空
     */
    public function isEmpty(): bool
    {
        return empty($this->items);
    }

    /**
     * 是否有分页器
     */
    public function hasPaginator(): bool
    {
        return $this->hasPaginator;
    }

    /**
     * 获取分页器
     */
    public function getPaginator(): ?LengthAwarePaginator
    {
        return $this->paginator;
    }

    /**
     * 设置标识符键
     */
    public function setIdentifierKey(string $key): self
    {
        $this->identifierKey = $key;

        return $this;
    }
}

<?php

declare(strict_types=1);

namespace XBot\OneUI\Support;

use ArrayIterator;
use Countable;
use IteratorAggregate;
use Traversable;

/**
 * 项目集合类
 *
 * 封装多个 DataItem，提供可迭代、可计数的集合操作。
 */
class ItemCollection implements IteratorAggregate, Countable
{
    /**
     * @var DataItem[]
     */
    protected array $items = [];

    protected string $identifierKey;

    /**
     * @param  array  $items  原始数据数组
     * @param  string  $identifierKey  标识符键名
     */
    public function __construct(array $items = [], string $identifierKey = 'id')
    {
        $this->identifierKey = $identifierKey;
        $this->setItems($items);
    }

    /**
     * 设置项目
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
     * 添加项目
     */
    public function add(mixed $item): self
    {
        $this->items[] = DataItem::make($item, $this->identifierKey);

        return $this;
    }

    /**
     * 获取所有项目
     *
     * @return DataItem[]
     */
    public function all(): array
    {
        return $this->items;
    }

    /**
     * 获取第一个项目
     */
    public function first(): ?DataItem
    {
        return $this->items[0] ?? null;
    }

    /**
     * 获取最后一个项目
     */
    public function last(): ?DataItem
    {
        return $this->items[count($this->items) - 1] ?? null;
    }

    /**
     * 获取指定索引的项目
     */
    public function get(int $index): ?DataItem
    {
        return $this->items[$index] ?? null;
    }

    /**
     * 根据标识符查找项目
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
     * 过滤项目
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
     * 映射项目
     */
    public function map(callable $callback): array
    {
        return array_map($callback, $this->items);
    }

    /**
     * 提取指定键的值
     */
    public function pluck(string $key): array
    {
        return array_map(fn(DataItem $item) => $item->getValue($key), $this->items);
    }

    /**
     * 转换为数组
     */
    public function toArray(): array
    {
        return array_map(fn(DataItem $item) => $item->toArray(), $this->items);
    }

    /**
     * 转换为 JSON 字符串
     */
    public function toJson(int $options = 0): string
    {
        return json_encode($this->toArray(), $options);
    }

    /**
     * 是否为空
     */
    public function isEmpty(): bool
    {
        return empty($this->items);
    }

    /**
     * 是否非空
     */
    public function isNotEmpty(): bool
    {
        return !$this->isEmpty();
    }

    /**
     * 获取数量
     */
    public function count(): int
    {
        return count($this->items);
    }

    /**
     * 获取迭代器
     */
    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->items);
    }
}

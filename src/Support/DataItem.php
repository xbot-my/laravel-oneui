<?php

declare(strict_types=1);

namespace XBot\OneUI\Support;

use XBot\OneUI\Contracts\ItemRenderable;

/**
 * 数据项封装类
 *
 * 封装单个列表项（如表格行、菜单项），提供统一的访问接口。
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
     * 从混合类型创建 DataItem
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
     * 获取指定键的值，支持点号分隔的嵌套键
     */
    public function getValue(string $key, mixed $default = null): mixed
    {
        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }

        // 支持点号嵌套访问：user.name => $data['user']['name']
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
     * 检查键是否存在
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
     * 获取唯一标识符
     */
    public function getIdentifier(): mixed
    {
        return $this->getValue($this->identifierKey);
    }

    /**
     * 转换为数组
     */
    public function toArray(): array
    {
        return $this->data;
    }

    /**
     * 转换为 JSON 字符串
     */
    public function toJson(int $options = 0): string
    {
        return json_encode($this->data, $options | JSON_HEX_APOS | JSON_HEX_QUOT);
    }

    /**
     * 魔术方法：属性访问
     */
    public function __get(string $name): mixed
    {
        return $this->getValue($name);
    }

    /**
     * 魔术方法：属性检查
     */
    public function __isset(string $name): bool
    {
        return $this->hasKey($name);
    }
}

<?php

declare(strict_types=1);

namespace XBot\OneUI\Contracts;

/**
 * 可渲染项接口
 *
 * 定义列表项（如表格行、菜单项、下拉选项）的通用行为契约。
 */
interface ItemRenderable
{
    /**
     * 获取指定键的值
     *
     * @param  string  $key  键名，支持点号分隔的嵌套键
     * @param  mixed  $default  默认值
     */
    public function getValue(string $key, mixed $default = null): mixed;

    /**
     * 检查键是否存在
     */
    public function hasKey(string $key): bool;

    /**
     * 转换为数组
     */
    public function toArray(): array;

    /**
     * 转换为 JSON 字符串
     */
    public function toJson(int $options = 0): string;

    /**
     * 获取唯一标识符（如 ID）
     */
    public function getIdentifier(): mixed;
}

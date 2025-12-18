<?php

declare(strict_types=1);

namespace XBot\OneUI\Contracts;

use XBot\OneUI\Support\ItemCollection;

/**
 * 数据源转换接口
 *
 * 定义从各种数据源（array、Collection、Eloquent、Paginator）转换为统一格式的契约。
 */
interface DataSourceContract
{
    /**
     * 转换为数组
     */
    public function toArray(): array;

    /**
     * 转换为项目集合
     *
     * @param  array  $config  列/项配置
     */
    public function toItems(array $config = []): ItemCollection;

    /**
     * 获取项目数量
     */
    public function count(): int;

    /**
     * 是否为空
     */
    public function isEmpty(): bool;
}

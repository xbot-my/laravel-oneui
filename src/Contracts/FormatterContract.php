<?php

declare(strict_types=1);

namespace XBot\OneUI\Contracts;

/**
 * 格式化器接口
 *
 * 定义值格式化的契约（如日期、货币、Badge 等）。
 */
interface FormatterContract
{
    /**
     * 格式化值
     *
     * @param  mixed  $value  原始值
     * @param  array  $options  格式化选项
     * @return string 格式化后的字符串
     */
    public function format(mixed $value, array $options = []): string;

    /**
     * 获取格式化器名称
     */
    public function getName(): string;
}

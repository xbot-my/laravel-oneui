<?php

declare(strict_types=1);

namespace XBot\OneUI\Support\Formatters;

use XBot\OneUI\Contracts\FormatterContract;

/**
 * Badge 格式化器
 *
 * 将值格式化为 Badge HTML 输出。
 */
class BadgeFormatter implements FormatterContract
{
    /**
     * 格式化为 Badge
     *
     * @param  mixed  $value  原始值
     * @param  array  $options  选项（badgeMap、type、pill）
     */
    public function format(mixed $value, array $options = []): string
    {
        $type = $options['type'] ?? 'primary';

        // 使用 badgeMap 映射值到类型
        if (!empty($options['badgeMap']) && isset($options['badgeMap'][$value])) {
            $type = $options['badgeMap'][$value];
        }

        $pill = !empty($options['pill']);

        return sprintf(
            '<span class="%s">%s</span>',
            $this->getBadgeClasses($type, $pill),
            e($value)
        );
    }

    /**
     * 获取 Badge CSS 类
     */
    protected function getBadgeClasses(string $type, bool $pill): string
    {
        $classes = 'fs-xs fw-semibold d-inline-block py-1 px-3';
        $classes .= $pill ? ' rounded-pill' : ' rounded';
        $classes .= " bg-{$type}-light text-{$type}";

        return $classes;
    }

    public function getName(): string
    {
        return 'badge';
    }
}

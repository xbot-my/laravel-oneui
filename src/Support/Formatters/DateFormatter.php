<?php

declare(strict_types=1);

namespace XBot\OneUI\Support\Formatters;

use Carbon\Carbon;
use XBot\OneUI\Contracts\FormatterContract;

/**
 * 日期格式化器
 *
 * 将日期值格式化为指定格式的字符串。
 */
class DateFormatter implements FormatterContract
{
    protected string $defaultFormat = 'Y-m-d';

    /**
     * 格式化日期
     *
     * @param  mixed  $value  日期值
     * @param  array  $options  选项（dateFormat、timezone）
     */
    public function format(mixed $value, array $options = []): string
    {
        if (empty($value)) {
            return '';
        }

        $format = $options['dateFormat'] ?? $this->defaultFormat;

        try {
            $date = Carbon::parse($value);

            if (!empty($options['timezone'])) {
                $date = $date->timezone($options['timezone']);
            }

            return $date->format($format);
        } catch (\Exception $e) {
            return (string) $value;
        }
    }

    /**
     * 设置默认格式
     */
    public function setDefaultFormat(string $format): self
    {
        $this->defaultFormat = $format;

        return $this;
    }

    public function getName(): string
    {
        return 'date';
    }
}

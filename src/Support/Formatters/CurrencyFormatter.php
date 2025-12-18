<?php

declare(strict_types=1);

namespace XBot\OneUI\Support\Formatters;

use XBot\OneUI\Contracts\FormatterContract;

/**
 * 货币格式化器
 *
 * 将数值格式化为货币字符串。
 */
class CurrencyFormatter implements FormatterContract
{
    protected string $defaultSymbol = '$';

    protected int $defaultDecimals = 2;

    /**
     * 格式化货币
     *
     * @param  mixed  $value  数值
     * @param  array  $options  选项（currencySymbol、decimals、thousandsSeparator、decimalPoint）
     */
    public function format(mixed $value, array $options = []): string
    {
        if (!is_numeric($value)) {
            return (string) $value;
        }

        $symbol = $options['currencySymbol'] ?? $this->defaultSymbol;
        $decimals = $options['decimals'] ?? $this->defaultDecimals;
        $thousandsSeparator = $options['thousandsSeparator'] ?? ',';
        $decimalPoint = $options['decimalPoint'] ?? '.';

        $formatted = number_format((float) $value, $decimals, $decimalPoint, $thousandsSeparator);

        // 支持符号位置配置
        $symbolPosition = $options['symbolPosition'] ?? 'before';

        return $symbolPosition === 'after'
            ? $formatted . $symbol
            : $symbol . $formatted;
    }

    /**
     * 设置默认货币符号
     */
    public function setDefaultSymbol(string $symbol): self
    {
        $this->defaultSymbol = $symbol;

        return $this;
    }

    public function getName(): string
    {
        return 'currency';
    }
}

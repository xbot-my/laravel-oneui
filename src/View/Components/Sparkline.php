<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Sparkline Component - Small inline charts
 *
 * Usage:
 * <x-oneui::sparkline :data="[10, 20, 15, 30, 25]" type="line" />
 * <x-oneui::sparkline :data="[50, 75]" type="bar" bar-color="#10b981" />
 */
class Sparkline extends Component
{
    public function __construct(
        public string $id = 'sparkline-' . uniqid(),
        public array $data = [],
        public string $type = 'line', // line, bar, tristate, discrete, bullet, pie, box
        public string $lineColor = '#3b82f6',
        public string $fillColor = 'transparent',
        public int $width = 80,
        public int $height = 30,
        public ?string $tooltipFormat = null,
        public array $options = [],
    ) {
        // Ensure data has values
        if (empty($this->data)) {
            $this->data = [0];
        }
    }

    /**
     * Get sparkline configuration as JavaScript object
     */
    public function sparklineConfig(): string
    {
        $config = [
            'type' => $this->type,
            'lineColor' => $this->lineColor,
            'fillColor' => $this->fillColor,
            'width' => $this->width,
            'height' => $this->height,
        ];

        // Type-specific options
        switch ($this->type) {
            case 'line':
                $config['spotRadius'] = 2;
                $config['minSpotColor'] = false;
                $config['maxSpotColor'] = false;
                $config['highlightSpotColor'] = '#ef4444';
                $config['highlightLineColor'] = '#e5e7eb';
                break;
            case 'bar':
                $config['barColor'] = $this->lineColor;
                $config['negBarColor'] = '#ef4444';
                $config['barWidth'] = max(2, (int)($this->width / count($this->data)) - 1);
                break;
            case 'pie':
                $config['sliceColors'] = [
                    '#3b82f6', '#10b981', '#f59e0b', '#ef4444',
                    '#8b5cf6', '#ec4899', '#06b6d4', '#84cc16'
                ];
                break;
        }

        return json_encode(array_merge($config, $this->options), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Get the minimum value from data
     */
    public function getMin(): int
    {
        return min($this->data);
    }

    /**
     * Get the maximum value from data
     */
    public function getMax(): int
    {
        return max($this->data);
    }

    /**
     * Get the average value
     */
    public function getAverage(): float
    {
        return count($this->data) > 0 ? array_sum($this->data) / count($this->data) : 0;
    }

    public function render(): View
    {
        return view('oneui::components.sparkline');
    }
}

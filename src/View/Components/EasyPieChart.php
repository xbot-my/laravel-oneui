<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * EasyPieChart Component - Easy pie charts
 *
 * Usage:
 * <x-oneui::easy-pie-chart :percent="75" />
 * <x-oneui::easy-pie-chart :percent="50" bar-color="#10b981" size="120" />
 */
class EasyPieChart extends Component
{
    public function __construct(
        public string $id = '',
        public float|int $percent = 0,
        public int $size = 80,
        public string $barColor = '#3b82f6',
        public string $trackColor = '#e5e7eb',
        public string $scaleColor = '#d1d5db',
        public int $lineWidth = 3,
        public string $lineCap = 'round', // round, butt, square
        public bool $animate = true,
        public int $animationDuration = 1000,
        public bool $showLabel = false,
        public ?string $label = null,
        public string $labelColor = '#374151',
        public array $options = [],
    ) {
        // Generate unique ID if not provided
        if ($this->id === '') {
            $this->id = 'pie-' . uniqid();
        }

        // Clamp percent between 0 and 100
        $this->percent = max(0, min(100, (float) $percent));
    }

    /**
     * Get EasyPieChart configuration as JavaScript object
     */
    public function chartConfig(): string
    {
        $config = [
            'size' => $this->size,
            'barColor' => $this->barColor,
            'trackColor' => $this->trackColor,
            'scaleColor' => $this->scaleColor,
            'lineWidth' => $this->lineWidth,
            'lineCap' => $this->lineCap,
            'animate' => $this->animate,
            'animationDuration' => $this->animationDuration,
        ];

        return json_encode(array_merge($config, $this->options), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Get display label
     */
    public function getLabel(): string
    {
        return $this->label ?? $this->percent . '%';
    }

    public function render(): View
    {
        return view('oneui::components.easy-pie-chart');
    }
}

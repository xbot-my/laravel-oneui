<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * ChartJS Component - Chart.js wrapper
 *
 * Creates responsive charts using Chart.js library
 *
 * Usage:
 * <x-oneui::chart-js id="myChart" type="line" :labels="['Jan', 'Feb', 'Mar']" :datasets="[['data' => [10, 20, 30]]]" />
 * <x-oneui::chart-js type="bar" :labels="['A', 'B', 'C']" :datasets="$datasetData" :options="$chartOptions" />
 */
class ChartJS extends Component
{
    public function __construct(
        public string $id,
        public string $type = 'line', // line, bar, radar, doughnut, pie, polarArea, bubble, scatter
        public array $labels = [],
        public array $datasets = [],
        public array $options = [],
        public int $height = 300,
        public bool $responsive = true,
        public bool $maintainAspectRatio = true,
        public array $plugins = [],
        public array $scales = [],
    ) {
    }

    /**
     * Get chart datasets configuration as JavaScript array
     */
    public function datasetsJson(): string
    {
        $defaultDataset = [
            'data' => [],
            'label' => 'Dataset',
            'backgroundColor' => [],
            'borderColor' => [],
            'borderWidth' => 2,
        ];

        $processedDatasets = [];
        foreach ($this->datasets as $dataset) {
            if (is_array($dataset)) {
                $processedDatasets[] = array_merge($defaultDataset, $dataset);
            }
        }

        return json_encode($processedDatasets);
    }

    /**
     * Get default colors for datasets
     */
    public function getDefaultColors(int $count): array
    {
        $colors = [
            'rgba(59, 125, 221, 1)',   // primary
            'rgba(234, 88, 12, 1)',     // warning
            'rgba(22, 163, 74, 1)',     // success
            'rgba(239, 68, 68, 1)',     // danger
            'rgba(139, 92, 246, 1)',    // info
            'rgba(236, 72, 153, 1)',    // pink
            'rgba(20, 184, 166, 1)',    // teal
            'rgba(245, 158, 11, 1)',    // orange
        ];

        $backgroundColors = array_map(fn($c) => str_replace('1)', '0.2)', $colors), $colors);

        return [
            'border' => array_slice(array_merge($colors, $colors), 0, $count),
            'background' => array_slice(array_merge($backgroundColors, $backgroundColors), 0, $count),
        ];
    }

    /**
     * Get chart options as JavaScript object
     */
    public function optionsJson(): string
    {
        $defaultOptions = [
            'responsive' => $this->responsive,
            'maintainAspectRatio' => $this->maintainAspectRatio,
            'plugins' => array_merge([
                'legend' => [
                    'display' => true,
                    'position' => 'top',
                ],
                'tooltip' => [
                    'mode' => 'index',
                    'intersect' => false,
                ],
            ], $this->plugins),
        ];

        // Add scales for cartesian charts (line, bar, scatter, bubble)
        if (in_array($this->type, ['line', 'bar', 'scatter', 'bubble'])) {
            $defaultOptions['scales'] = array_merge([
                'y' => [
                    'beginAtZero' => true,
                    'grid' => [
                        'color' => 'rgba(0, 0, 0, 0.05)',
                    ],
                ],
                'x' => [
                    'grid' => [
                        'display' => false,
                    ],
                ],
            ], $this->scales);
        }

        return json_encode(array_merge($defaultOptions, $this->options));
    }

    public function render(): View
    {
        return view('oneui::components.chart-js')
            ->with('chartHeight', $this->height)
            ->with('chartLabels', $this->labels);
    }

    /**
     * Get height value for blade template
     */
    public function getHeight(): int
    {
        return $this->height;
    }

    /**
     * Get labels for blade template
     */
    public function getLabels(): array
    {
        return $this->labels;
    }
}

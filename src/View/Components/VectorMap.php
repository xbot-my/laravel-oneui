<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * VectorMap Component - jVectorMap wrapper
 *
 * Creates interactive vector maps for data visualization
 *
 * Usage:
 * <x-oneui::vector-map id="worldMap" map="world_mill" />
 * <x-oneui::vector-map id="usaMap" map="us_aea" :region-data="$stateData" />
 */
class VectorMap extends Component
{
    public function __construct(
        public string $id,
        public string $map = 'world_mill', // world_mill, us_aea, etc.
        public ?string $backgroundColor = null,
        public ?string $hoverColor = null,
        public ?string $hoverOpacity = null,
        public ?string $selectedColor = null,
        public array $regionData = [], // { 'US-TX': 1000, 'US-CA': 2000 }
        public array $markerData = [], // [{ latLng: [lat, lng], name: 'Name' }]
        public array $seriesData = [],
        public bool $zoomOnScroll = true,
        public bool $zoomButtons = true,
        public bool $showTooltip = true,
        public string|array|null $scaleColors = null, // ['#C8EEFF', '#0071A4']
        public bool $normalizeFunction = 'linear', // linear, polynomial, legend
        public int $min = 0,
        public int|null $max = null,
        public array $options = [],
        public ?string $onRegionClick = null, // JS callback
        public ?string $onRegionOver = null, // JS callback
        public ?string $onRegionOut = null, // JS callback
        public ?string $onMarkerClick = null, // JS callback
        public int $height = 400,
    ) {
    }

    /**
     * Get VectorMap configuration as JavaScript object
     */
    public function mapOptions(): string
    {
        $options = [
            'map' => $this->map,
            'zoomOnScroll' => $this->zoomOnScroll,
            'zoomButtons' => $this->zoomButtons,
            'container' => '#' . $this->id,
            'backgroundColor' => $this->backgroundColor ?? 'transparent',
        ];

        if ($this->hoverColor) {
            $options['hoverColor'] = $this->hoverColor;
        }

        if ($this->hoverOpacity !== null) {
            $options['hoverOpacity'] = $this->hoverOpacity;
        }

        if ($this->selectedColor) {
            $options['selectedColor'] = $this->selectedColor;
        }

        if (!empty($this->regionData)) {
            $options['regionsValues'] = $this->regionData;
        }

        if (!empty($this->markerData)) {
            $options['markers'] = $this->markerData;
        }

        if (!empty($this->seriesData)) {
            $options['series'] = $this->seriesData;
        }

        if ($this->scaleColors !== null) {
            if (is_array($this->scaleColors)) {
                $options['scaleColors'] = $this->scaleColors;
            } else {
                $options['scaleColors'] = [$this->scaleColors, $this->scaleColors];
            }
        }

        if ($this->normalizeFunction) {
            $options['normalizeFunction'] = $this->normalizeFunction;
        }

        if ($this->max !== null) {
            $options['max'] = $this->max;
        }

        // Merge with custom options
        $options = array_merge($options, $this->options);

        return $this->arrayToJs($options);
    }

    /**
     * Convert PHP array to JavaScript object (with function support)
     */
    protected function arrayToJs(array $data): string
    {
        $js = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        // Handle function strings
        $js = preg_replace(
            '/"function\((.*?)\) {(.*?)\}"/s',
            'function($1) {$2}',
            $js
        );

        // Handle arrow functions
        $js = preg_replace(
            '/"\((.*?)\) => (.*?)"/s',
            '($1) => $2',
            $js
        );

        return $js;
    }

    public function render(): View
    {
        return view('oneui::components.vector-map');
    }
}

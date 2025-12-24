<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Appear Component - jQuery.appear wrapper
 *
 * Triggers animations when element scrolls into view
 *
 * Usage:
 * <x-oneui::appear animation="fadeIn">Content to animate on scroll</x-oneui::appear>
 * <x-oneui::appear :threshold="0.5" callback="myCallback">Content</x-oneui::appear>
 */
class Appear extends Component
{
    public function __construct(
        public string $id,
        public string $animation = 'fadeIn',
        public float $threshold = 0.1, // Percentage of element visible
        public bool $once = true, // Only trigger once
        public ?string $callback = null, // Custom JS callback function name
        public int $duration = 600,
        public int $delay = 0,
        public string $easing = 'ease',
        public array $options = [],
    ) {
    }

    /**
     * Get jQuery.appear configuration as JavaScript object
     */
    public function appearOptions(): string
    {
        $options = [
            'threshold' => $this->threshold,
            'once' => $this->once,
        ];

        // Merge with custom options
        $options = array_merge($options, $this->options);

        return json_encode($options, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    public function render(): View
    {
        return view('oneui::components.appear');
    }
}

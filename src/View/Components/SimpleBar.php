<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * SimpleBar Component - SimpleBar wrapper
 *
 * Creates custom scrollbars for any container
 *
 * Usage:
 * <x-oneui::simple-bar height="300px">Scrollable content</x-oneui::simple-bar>
 * <x-oneui::simple-bar :options="['autoHide' => false]">Content</x-oneui::simple-bar>
 */
class SimpleBar extends Component
{
    public function __construct(
        public string $id,
        public ?string $height = null,
        public ?string $maxHeight = null,
        public bool $autoHide = true,
        public int $timeout = 1000,
        public string $theme = 'light', // light, dark
        public array $options = [],
    ) {
    }

    /**
     * Get SimpleBar configuration as JavaScript object
     */
    public function simpleBarOptions(): string
    {
        $options = [
            'autoHide' => $this->autoHide,
            'timeout' => $this->timeout,
        ];

        if ($this->theme !== 'light') {
            $options['theme'] = $this->theme;
        }

        // Merge with custom options
        $options = array_merge($options, $this->options);

        return json_encode($options, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Get container styles
     */
    public function getContainerStyles(): string
    {
        $styles = [];

        if ($this->height) {
            $styles[] = 'height: ' . $this->height;
        }

        if ($this->maxHeight) {
            $styles[] = 'max-height: ' . $this->maxHeight;
        }

        return implode('; ', $styles);
    }

    public function render(): View
    {
        return view('oneui::components.simple-bar');
    }
}

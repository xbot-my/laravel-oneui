<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

/**
 * Progress 组件
 *
 * Usage:
 * <x-oneui::progress :value="50" />
 * <x-oneui::progress :value="75" color="success" :striped="true" />
 */
class Progress extends Component
{
    public function __construct(
        public int $value = 0,
        public string $color = 'primary',
        public bool $striped = false,
        public bool $animated = false,
        public bool $showLabel = false,
        public string $size = '',
    ) {
    }

    public function progressBarClasses(): string
    {
        $classes = ['progress-bar'];

        if ($this->color !== 'primary') {
            $classes[] = "bg-{$this->color}";
        }

        if ($this->striped) {
            $classes[] = 'progress-bar-striped';
        }

        if ($this->animated) {
            $classes[] = 'progress-bar-animated';
        }

        return implode(' ', $classes);
    }

    public function progressClasses(): string
    {
        $classes = ['progress'];

        if ($this->size === 'sm') {
            $classes[] = 'progress-sm';
        }

        return implode(' ', $classes);
    }

    public function render()
    {
        return view('oneui::components.progress');
    }
}

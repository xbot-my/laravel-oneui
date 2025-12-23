<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Ribbon Component - Decorative ribbon badge for blocks
 *
 * Usage:
 * <x-oneui::ribbon type="primary">$28</x-oneui::ribbon>
 * <x-oneui::ribbon type="success" position="bottom-left">$32</x-oneui::ribbon>
 * <x-oneui::ribbon type="danger" :glass="true">New</x-oneui::ribbon>
 */
class Ribbon extends Component
{
    public function __construct(
        public string $type = 'primary', // primary, success, info, warning, danger
        public string $position = 'top-right', // top-right, top-left, bottom-right, bottom-left
        public bool $glass = false,
    ) {
    }

    public function ribbonClasses(): string
    {
        $classes = ['ribbon'];

        // Color
        $classes[] = "ribbon-{$this->type}";

        // Position
        if (str_contains($this->position, 'bottom')) {
            $classes[] = 'ribbon-bottom';
        }
        if (str_contains($this->position, 'left')) {
            $classes[] = 'ribbon-left';
        }

        // Glass effect
        if ($this->glass) {
            $classes[] = 'ribbon-glass';
        }

        return implode(' ', $classes);
    }

    public function render(): View
    {
        return view('oneui::components.ribbon');
    }
}

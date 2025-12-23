<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

/**
 * Offcanvas 组件（侧边抽屉面板）
 *
 * Usage:
 * <x-oneui::offcanvas id="cart" title="Shopping Cart">
 *     Cart items...
 * </x-oneui::offcanvas>
 *
 * Trigger button:
 * <button data-bs-toggle="offcanvas" data-bs-target="#cart">Open</button>
 */
class Offcanvas extends Component
{
    public function __construct(
        public string $id,
        public ?string $title = null,
        public string $position = 'end',
        public bool $backdrop = true,
        public bool $scroll = false,
        public bool $keyboard = true,
    ) {
    }

    public function offcanvasClasses(): string
    {
        $classes = ['offcanvas', 'bg-body-extra-light'];

        $classes[] = match ($this->position) {
            'start', 'left' => 'offcanvas-start',
            'top' => 'offcanvas-top',
            'bottom' => 'offcanvas-bottom',
            default => 'offcanvas-end',
        };

        return implode(' ', $classes);
    }

    public function dataAttributes(): string
    {
        $attrs = [];

        if ($this->scroll) {
            $attrs[] = 'data-bs-scroll="true"';
        }

        if (!$this->backdrop) {
            $attrs[] = 'data-bs-backdrop="false"';
        }

        if (!$this->keyboard) {
            $attrs[] = 'data-bs-keyboard="false"';
        }

        return implode(' ', $attrs);
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('oneui::components.offcanvas');
    }
}

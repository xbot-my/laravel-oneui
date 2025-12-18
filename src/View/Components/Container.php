<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

/**
 * Container 组件
 *
 * Usage:
 * <x-oneui::container>Content...</x-oneui::container>
 * <x-oneui::container fluid>Full width content</x-oneui::container>
 */
class Container extends Component
{
    public function __construct(
        public bool $fluid = false,
        public ?string $breakpoint = null,
    ) {
    }

    public function containerClasses(): string
    {
        if ($this->fluid) {
            return 'container-fluid';
        }

        if ($this->breakpoint) {
            return 'container-' . $this->breakpoint;
        }

        return 'container';
    }

    public function render()
    {
        return view('oneui::components.container');
    }
}

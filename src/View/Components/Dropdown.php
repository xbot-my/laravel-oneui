<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Dropdown Component
 *
 * Usage:
 * <x-oneui::dropdown>
 *     <x-slot:trigger>
 *         <button class="btn btn-primary dropdown-toggle">Menu</button>
 *     </x-slot>
 *     <a class="dropdown-item" href="#">Action 1</a>
 *     <a class="dropdown-item" href="#">Action 2</a>
 * </x-oneui::dropdown>
 */
class Dropdown extends Component
{
    public function __construct(
        public string $align = 'start',
        public bool $up = false,
    ) {
    }

    public function dropdownClasses(): string
    {
        $classes = [];

        if ($this->up) {
            $classes[] = 'dropup';
        } else {
            $classes[] = 'dropdown';
        }

        return implode(' ', $classes);
    }

    public function menuClasses(): string
    {
        $classes = ['dropdown-menu'];

        if ($this->align === 'end') {
            $classes[] = 'dropdown-menu-end';
        }

        return implode(' ', $classes);
    }

    public function render(): View
    {
        return view('oneui::components.dropdown');
    }
}

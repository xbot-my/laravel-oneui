<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * MegaMenu Component - Enhanced dropdown with large content area
 *
 * Usage:
 * <x-oneui::mega-menu id="mega-menu" title="My Projects" color="primary">
 *     <x-slot:trigger>
 *         <button class="btn btn-secondary">Projects</button>
 *     </x-slot>
 *     <x-slot:header>
 *         <h3 class="h5">My Projects</h3>
 *     </x-slot>
 *     Mega menu content here
 * </x-oneui::mega-menu>
 */
class MegaMenu extends Component
{
    public function __construct(
        public string $id,
        public string $size = 'xl', // sm, md, lg, xl, xxl
        public ?string $title = null,
        public string $headerColor = 'primary', // primary, success, info, warning, danger, dark
        public bool $fullWidth = false,
        public bool $clickToClose = true,
    ) {
    }

    public function menuClasses(): string
    {
        $classes = ['dropdown-menu', 'dropdown-menu-mega', 'p-0', 'border-0'];

        // Size
        $classes[] = "dropdown-menu-{$this->size}";

        // Full width
        if ($this->fullWidth) {
            $classes[] = 'w-100';
        }

        return implode(' ', $classes);
    }

    public function headerClasses(): string
    {
        return "px-3 py-3 bg-{$this->headerColor} rounded-top d-flex align-items-center justify-content-between";
    }

    public function triggerAttributes(): string
    {
        $attrs = [
            'id' => $this->id,
            'data-bs-toggle' => 'dropdown',
            'aria-expanded' => 'false',
        ];

        if (!$this->clickToClose) {
            $attrs['data-bs-auto-close'] = 'outside';
        }

        $parts = [];
        foreach ($attrs as $key => $value) {
            $parts[] = sprintf('%s="%s"', $key, $value);
        }

        return implode(' ', $parts);
    }

    public function render(): View
    {
        return view('oneui::components.mega-menu');
    }
}

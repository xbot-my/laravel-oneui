<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * NavItem Component - Sidebar navigation item
 *
 * Usage:
 * <x-oneui::nav-item href="/dashboard" icon="si-speedometer" :active="true">
 *     Dashboard
 * </x-oneui::nav-item>
 */
class NavItem extends Component
{
    public function __construct(
        public string $href = '#',
        public ?string $icon = null,
        public bool $active = false,
        public bool $submenu = false,
    ) {
    }

    public function linkClasses(): string
    {
        $classes = ['nav-main-link'];

        if ($this->active) {
            $classes[] = 'active';
        }

        if ($this->submenu) {
            $classes[] = 'nav-main-link-submenu';
        }

        return implode(' ', $classes);
    }

    public function render(): View
    {
        return view('oneui::components.nav-item');
    }
}

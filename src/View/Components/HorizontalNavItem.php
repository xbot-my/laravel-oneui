<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * HorizontalNavItem Component - Item for HorizontalNav
 *
 * Usage:
 * <x-oneui::horizontal-nav-item href="#" icon="fa-home">Home</x-oneui::horizontal-nav-item>
 * <x-oneui::horizontal-nav-item href="#" icon="fa-briefcase" :active="true">Products</x-oneui::horizontal-nav-item>
 */
class HorizontalNavItem extends Component
{
    public function __construct(
        public ?string $href = null,
        public ?string $icon = null,
        public bool $active = false,
        public ?string $badge = null,
        public string $badgeColor = 'primary',
        public bool $submenu = false,
        public ?string $heading = null,
    ) {
    }

    public function render(): View
    {
        return view('oneui::components.horizontal-nav-item');
    }
}

<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * HorizontalNav Component - Horizontal navigation menu
 *
 * Usage:
 * <x-oneui::horizontal-nav>
 *     <x-oneui::horizontal-nav-item href="#" icon="fa-home">Home</x-oneui::horizontal-nav-item>
 *     <x-oneui::horizontal-nav-item href="#" icon="fa-briefcase">Products</x-oneui::horizontal-nav-item>
 * </x-oneui::horizontal-nav>
 */
class HorizontalNav extends Component
{
    public function __construct(
        public string $id = 'horizontal-nav',
        public string $mode = 'hover', // hover, click
        public bool $responsive = true,
    ) {
    }

    public function navClasses(): string
    {
        $classes = ['nav-main', 'nav-main-horizontal'];

        // Mode
        $classes[] = $this->mode === 'hover' ? 'nav-main-hover' : 'nav-main-click';

        return implode(' ', $classes);
    }

    public function containerClasses(): string
    {
        $classes = [];

        if ($this->responsive) {
            $classes[] = 'd-none';
            $classes[] = 'd-lg-block';
            $classes[] = 'mt-2';
            $classes[] = 'mt-lg-0';
        }

        return implode(' ', $classes);
    }

    public function render(): View
    {
        return view('oneui::components.horizontal-nav');
    }
}

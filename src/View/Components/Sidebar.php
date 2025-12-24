<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Sidebar Component - OneUI Sidebar Navigation
 *
 * Usage:
 * <x-oneui::sidebar dark mini>
 *     <x-oneui::sidebar-menu>
 *         ...menu items...
 *     </x-oneui::sidebar-menu>
 * </x-oneui::sidebar>
 */
class Sidebar extends Component
{
    public function __construct(
        public bool $dark = true,
        public bool $mini = false,
        public bool $visible = true,
        public bool $visibleXs = false,
        public bool $right = false,
        public ?string $logo = null,
        public ?string $logoUrl = null,
        public bool $showThemeSwitcher = true,
        public bool $showColorThemes = true,
        public bool $showCloseButton = true,
    ) {
        $this->logoUrl = $logoUrl ?? url('/');
    }

    /**
     * Get sidebar container classes based on settings.
     */
    public function containerClasses(): string
    {
        $classes = [];

        if ($this->dark) {
            $classes[] = 'sidebar-dark';
        }

        if ($this->mini) {
            $classes[] = 'sidebar-mini';
        }

        if ($this->visible) {
            $classes[] = 'sidebar-o';
        }

        if ($this->visibleXs) {
            $classes[] = 'sidebar-o-xs';
        }

        if ($this->right) {
            $classes[] = 'sidebar-r';
        }

        return implode(' ', array_filter($classes));
    }

    /**
     * Get the application name for the sidebar logo.
     */
    public function appName(): string
    {
        return $this->logo ?? config('app.name', 'OneUI');
    }

    public function render(): View
    {
        return view('oneui::components.sidebar');
    }
}

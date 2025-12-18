<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Page Component - Main layout wrapper for OneUI
 *
 * Usage:
 * <x-oneui::page>
 *     <x-slot:title>Dashboard</x-slot>
 *     <x-slot:content>
 *         Your page content here
 *     </x-slot>
 * </x-oneui::page>
 */
class Page extends Component
{
    public function __construct(
        public string $title = '',
        public bool $sidebarDark = true,
        public bool $sidebarOpen = true,
        public bool $headerFixed = true,
        public string $contentWidth = 'narrow',
    ) {
    }

    /**
     * Get page container classes based on settings.
     */
    public function containerClasses(): string
    {
        $classes = [];

        // Sidebar
        if ($this->sidebarOpen) {
            $classes[] = 'sidebar-o';
        }
        if ($this->sidebarDark) {
            $classes[] = 'sidebar-dark';
        }

        // Header
        if ($this->headerFixed) {
            $classes[] = 'page-header-fixed';
        }

        // Content width
        $classes[] = match ($this->contentWidth) {
            'boxed' => 'main-content-boxed',
            'narrow' => 'main-content-narrow',
            'full' => '',
            default => 'main-content-narrow',
        };

        // Common classes
        $classes[] = 'enable-page-overlay';
        $classes[] = 'side-scroll';

        return implode(' ', array_filter($classes));
    }

    public function render(): View
    {
        return view('oneui::components.page');
    }
}

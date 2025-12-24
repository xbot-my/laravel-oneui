<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Header Component - OneUI Page Header
 *
 * Usage:
 * <x-oneui::header fixed dark>
 *     <x-slot:headerLeft>
 *         Custom left content
 *     </x-slot>
 *     <x-slot:headerRight>
 *         Custom right content
 *     </x-slot>
 * </x-oneui::header>
 */
class Header extends Component
{
    public function __construct(
        public bool $fixed = true,
        public bool $dark = false,
        public ?string $title = null,
        public bool $showLogo = true,
        public bool $showSearch = false,
        public bool $showToggle = true,
        public bool $showNotifications = true,
        public bool $showUserDropdown = true,
        public bool $showSideOverlayToggle = true,
        public ?string $userAvatar = null,
        public ?string $userName = null,
    ) {
        $this->userAvatar = $userAvatar ?? asset('vendor/oneui/media/avatars/avatar10.jpg');
        $this->userName = $userName ?? (auth()->check() ? auth()->user()->name : 'Guest');
    }

    /**
     * Get header container classes based on settings.
     */
    public function containerClasses(): string
    {
        $classes = [];

        if ($this->fixed) {
            $classes[] = 'page-header-fixed';
        }

        if ($this->dark) {
            $classes[] = 'page-header-dark';
        }

        return implode(' ', array_filter($classes));
    }

    /**
     * Get the user name for display.
     */
    public function displayName(): string
    {
        return $this->userName;
    }

    /**
     * Get the user email for display.
     */
    public function displayEmail(): ?string
    {
        return auth()->check() ? auth()->user()->email ?? null : null;
    }

    public function render(): View
    {
        return view('oneui::components.header');
    }
}

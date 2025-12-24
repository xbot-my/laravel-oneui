<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * SideOverlay Component - OneUI Side Overlay Panel
 *
 * Usage:
 * <x-oneui::side-overlay hover visible>
 *     <x-oneui::side-overlay-tab name="overview" icon="coffee" active>
 *         Tab content...
 *     </x-oneui::side-overlay-tab>
 * </x-oneui::side-overlay>
 */
class SideOverlay extends Component
{
    public function __construct(
        public bool $hover = false,
        public bool $visible = false,
        public bool $showCloseButton = true,
        public ?string $userAvatar = null,
        public ?string $userName = null,
        public ?string $userEmail = null,
    ) {
        $this->userAvatar = $userAvatar ?? asset('vendor/oneui/media/avatars/avatar10.jpg');
        $this->userName = $userName ?? (auth()->check() ? auth()->user()->name : 'Guest');
    }

    /**
     * Get side overlay container classes based on settings.
     */
    public function containerClasses(): string
    {
        $classes = [];

        if ($this->hover) {
            $classes[] = 'side-overlay-hover';
        }

        if ($this->visible) {
            $classes[] = 'side-overlay-o';
        }

        return implode(' ', array_filter($classes));
    }

    public function render(): View
    {
        return view('oneui::components.side-overlay');
    }
}

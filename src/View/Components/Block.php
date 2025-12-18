<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Block Component - Content block wrapper
 *
 * Usage:
 * <x-oneui::block title="Block Title">
 *     Block content here
 * </x-oneui::block>
 */
class Block extends Component
{
    public function __construct(
        public ?string $title = null,
        public bool $rounded = true,
        public bool $bordered = false,
        public ?string $mode = null, // 'loading', 'hide', 'pinned', 'fullscreen'
    ) {
    }

    public function blockClasses(): string
    {
        $classes = ['block'];

        if ($this->rounded) {
            $classes[] = 'block-rounded';
        }

        if ($this->bordered) {
            $classes[] = 'block-bordered';
        }

        if ($this->mode) {
            $classes[] = 'block-mode-' . $this->mode;
        }

        return implode(' ', $classes);
    }

    public function render(): View
    {
        return view('oneui::components.block');
    }
}

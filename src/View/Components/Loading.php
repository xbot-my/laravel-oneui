<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

/**
 * Loading Component (Full-screen loading overlay)
 *
 * Usage:
 * <x-oneui::loading />
 * <x-oneui::loading message="Please wait..." />
 */
class Loading extends Component
{
    public function __construct(
        public string $message = 'Loading...',
        public string $color = 'primary',
        public bool $show = true,
    ) {
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('oneui::components.loading');
    }
}

<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

/**
 * Loading 组件（全屏加载遮罩）
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

    public function render()
    {
        return view('oneui::components.loading');
    }
}

<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

/**
 * Toast 组件
 *
 * Usage:
 * <x-oneui::toast type="success" title="Success" message="Operation completed!" />
 */
class Toast extends Component
{
    public function __construct(
        public string $type = 'primary',
        public string $title = '',
        public string $message = '',
        public bool $autohide = true,
        public int $delay = 5000,
    ) {
    }

    public function iconClass(): string
    {
        return match ($this->type) {
            'success' => 'fa fa-check-circle text-success',
            'danger', 'error' => 'fa fa-times-circle text-danger',
            'warning' => 'fa fa-exclamation-circle text-warning',
            'info' => 'fa fa-info-circle text-info',
            default => 'fa fa-bell text-primary',
        };
    }

    public function render()
    {
        return view('oneui::components.toast');
    }
}

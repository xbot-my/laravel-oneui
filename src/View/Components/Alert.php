<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Alert Component
 *
 * Usage:
 * <x-oneui::alert type="success">Operation completed!</x-oneui::alert>
 * <x-oneui::alert type="danger" :dismissible="true">Error occurred</x-oneui::alert>
 * <x-oneui::alert type="warning" title="Warning" icon="fa fa-exclamation">Message</x-oneui::alert>
 */
class Alert extends Component
{
    public function __construct(
        public string $type = 'primary',
        public bool $dismissible = false,
        public ?string $icon = null,
        public ?string $title = null,
        public string $iconPosition = 'left',
    ) {
    }

    public function defaultIcon(): ?string
    {
        return match ($this->type) {
            'success' => 'fa fa-fw fa-check',
            'danger' => 'fa fa-fw fa-times-circle',
            'warning' => 'fa fa-fw fa-exclamation-circle',
            'info' => 'fa fa-fw fa-info-circle',
            default => null,
        };
    }

    public function render(): View
    {
        return view('oneui::components.alert');
    }
}

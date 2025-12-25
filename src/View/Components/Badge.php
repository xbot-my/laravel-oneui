<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

/**
 * Badge Component
 *
 * Small status indicator or label with customizable colors and shapes.
 *
 * Usage:
 * <x-oneui::badge type="primary">New</x-oneui::badge>
 * <x-oneui::badge type="success" :pill="true">Active</x-oneui::badge>
 * <x-oneui::badge type="danger" :light="false">Alert</x-oneui::badge>
 */
class Badge extends Component
{
    public function __construct(
        public string $type = 'primary',
        public bool $pill = false,
        public bool $light = true,
    ) {
    }

    public function classes(): string
    {
        $base = 'fs-xs fw-semibold d-inline-block py-1 px-3';

        if ($this->pill) {
            $base .= ' rounded-pill';
        } else {
            $base .= ' rounded';
        }

        if ($this->light) {
            $base .= " bg-{$this->type}-light text-{$this->type}";
        } else {
            $base .= " bg-{$this->type} text-white";
        }

        return $base;
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('oneui::components.badge');
    }
}

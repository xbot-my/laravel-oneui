<?php

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

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

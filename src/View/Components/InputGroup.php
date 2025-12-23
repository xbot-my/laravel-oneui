<?php

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

class InputGroup extends Component
{
    public function __construct(
        public string $size = '',
        public bool $alt = false,
    ) {
    }

    public function sizeClass(): string
    {
        return match ($this->size) {
            'sm' => 'input-group-sm',
            'lg' => 'input-group-lg',
            default => '',
        };
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('oneui::components.input-group');
    }
}

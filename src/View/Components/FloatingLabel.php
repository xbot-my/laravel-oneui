<?php

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

class FloatingLabel extends Component
{
    public function __construct(
        public string $label,
        public string $name = '',
        public string $type = 'text',
        public string $placeholder = '',
        public string $value = '',
        public string $error = '',
    ) {
    }

    public function render()
    {
        return view('oneui::components.floating-label');
    }
}

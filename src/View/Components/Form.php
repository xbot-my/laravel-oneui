<?php

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

class Form extends Component
{
    public function __construct(
        public string $action = '',
        public string $method = 'POST',
        public bool $hasFiles = false,
    ) {
    }

    public function render()
    {
        return view('oneui::components.form');
    }
}

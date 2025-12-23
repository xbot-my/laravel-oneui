<?php

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

class FileInput extends Component
{
    public function __construct(
        public string $name,
        public string $label = '',
        public bool $multiple = false,
        public string $accept = '',
        public string $error = '',
    ) {
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('oneui::components.file-input');
    }
}

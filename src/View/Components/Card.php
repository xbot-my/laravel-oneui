<?php

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

class Card extends Component
{
    public function __construct(
        public string $title = '',
        public bool $rounded = true,
    ) {
    }

    public function render()
    {
        return view('oneui::components.card');
    }
}

<?php

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

class Pagination extends Component
{
    public function __construct(
        public LengthAwarePaginator $paginator,
        public string $size = '',
    ) {
    }

    public function sizeClass(): string
    {
        return match ($this->size) {
            'sm' => 'pagination-sm',
            'lg' => 'pagination-lg',
            default => '',
        };
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('oneui::components.pagination');
    }
}

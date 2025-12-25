<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

/**
 * Input Group Component
 *
 * Wrapper for grouping text, buttons, or other content with form inputs.
 *
 * Usage:
 * <x-oneui::input-group>
 *   <span class="input-group-text">@</span>
 *   <input type="text" class="form-control" />
 * </x-oneui::input-group>
 * <x-oneui::input-group size="lg">
 *   <input type="text" class="form-control" />
 *   <button class="btn btn-primary">Search</button>
 * </x-oneui::input-group>
 */
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

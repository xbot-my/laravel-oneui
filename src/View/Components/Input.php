<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Input Component
 *
 * Usage:
 * <x-oneui::input name="email" label="Email" type="email" />
 * <x-oneui::input name="password" label="Password" type="password" :alt="true" />
 */
class Input extends Component
{
    public function __construct(
        public string $name,
        public ?string $id = null,
        public string $type = 'text',
        public ?string $label = null,
        public ?string $placeholder = null,
        public ?string $value = null,
        public ?string $size = null,
        public bool $alt = false,
        public bool $disabled = false,
        public bool $readonly = false,
        public ?string $error = null,
        public bool $valid = false,
    ) {
        $this->id = $id ?? $name;
    }

    public function render(): View
    {
        return view('oneui::components.input');
    }
}

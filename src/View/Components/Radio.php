<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Radio Component
 *
 * Usage:
 * <x-oneui::radio name="gender" value="male" label="Male" />
 * <x-oneui::radio name="gender" value="female" label="Female" :inline="true" />
 */
class Radio extends Component
{
    public function __construct(
        public string $name,
        public $value,
        public ?string $id = null,
        public ?string $label = null,
        public bool $checked = false,
        public bool $inline = false,
        public bool $disabled = false,
    ) {
        $this->id = $id ?? $name . '-' . $value;
    }

    public function render(): View
    {
        return view('oneui::components.radio');
    }
}

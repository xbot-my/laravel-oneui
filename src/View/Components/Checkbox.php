<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Checkbox Component
 *
 * Usage:
 * <x-oneui::checkbox name="agree" label="I agree to terms" />
 * <x-oneui::checkbox name="status" label="Active" :switch="true" />
 */
class Checkbox extends Component
{
    public function __construct(
        public string $name,
        public ?string $id = null,
        public ?string $label = null,
        public $value = '1',
        public bool $checked = false,
        public bool $switch = false,
        public bool $inline = false,
        public bool $disabled = false,
    ) {
        $this->id = $id ?? $name;
    }

    public function render(): View
    {
        return view('oneui::components.checkbox');
    }
}

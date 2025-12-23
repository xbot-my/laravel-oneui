<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

/**
 * Select2 Enhanced Dropdown Component
 *
 * Usage:
 * <x-oneui::select2 name="country" :options="$countries" />
 * <x-oneui::select2 name="tags" :options="$tags" :multiple="true" />
 */
class Select2 extends Component
{
    public function __construct(
        public string $name,
        public ?string $id = null,
        public array $options = [],
        public mixed $value = null,
        public ?string $label = null,
        public ?string $placeholder = null,
        public bool $multiple = false,
        public bool $allowClear = true,
        public bool $tags = false,
        public ?string $ajax = null,
    ) {
        $this->id = $id ?? $name;
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('oneui::components.select2');
    }
}

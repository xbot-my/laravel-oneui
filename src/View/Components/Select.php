<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Select Component
 *
 * Usage:
 * <x-oneui::select name="country" label="Country" :options="['us' => 'USA', 'my' => 'Malaysia']" />
 */
class Select extends Component
{
    public function __construct(
        public string $name,
        public ?string $id = null,
        public ?string $label = null,
        public array $options = [],
        public $selected = null,
        public ?string $size = null,
        public bool $alt = false,
        public bool $multiple = false,
        public bool $disabled = false,
        public ?string $error = null,
    ) {
        $this->id = $id ?? $name;
    }

    public function render(): View
    {
        return view('oneui::components.select');
    }
}

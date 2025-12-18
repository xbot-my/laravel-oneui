<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Textarea Component
 *
 * Usage:
 * <x-oneui::textarea name="content" label="Content" rows="4" />
 */
class Textarea extends Component
{
    public function __construct(
        public string $name,
        public ?string $id = null,
        public ?string $label = null,
        public ?string $placeholder = null,
        public ?string $value = null,
        public int $rows = 4,
        public bool $alt = false,
        public bool $disabled = false,
        public bool $readonly = false,
        public ?string $error = null,
    ) {
        $this->id = $id ?? $name;
    }

    public function render(): View
    {
        return view('oneui::components.textarea');
    }
}

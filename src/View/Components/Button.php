<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Button Component
 *
 * Usage:
 * <x-oneui::button type="primary">Save</x-oneui::button>
 * <x-oneui::button type="success" size="lg" :outline="true">Submit</x-oneui::button>
 */
class Button extends Component
{
    public function __construct(
        public string $type = 'primary',
        public string $size = '',
        public bool $outline = false,
        public bool $alt = false,
        public string $tag = 'button',
        public ?string $href = null,
        public bool $disabled = false,
        public bool $block = false,
    ) {
        if ($this->href) {
            $this->tag = 'a';
        }
    }

    public function buttonClasses(): string
    {
        $classes = ['btn'];

        // Type/color
        if ($this->outline) {
            $classes[] = "btn-outline-{$this->type}";
        } elseif ($this->alt) {
            $classes[] = "btn-alt-{$this->type}";
        } else {
            $classes[] = "btn-{$this->type}";
        }

        // Size
        if ($this->size) {
            $classes[] = "btn-{$this->size}";
        }

        // Block
        if ($this->block) {
            $classes[] = 'w-100';
        }

        return implode(' ', $classes);
    }

    public function render(): View
    {
        return view('oneui::components.button');
    }
}

<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

/**
 * Floating Label Component
 *
 * Bootstrap 5 floating label input that animates the label when focused or has content.
 *
 * Usage:
 * <x-oneui::floating-label name="email" label="Email Address" type="email" />
 * <x-oneui::floating-label name="username" label="Username" value="john_doe" />
 * <x-oneui::floating-label name="password" label="Password" type="password" />
 */
class FloatingLabel extends Component
{
    public function __construct(
        public string $label,
        public string $name = '',
        public string $type = 'text',
        public string $placeholder = '',
        public string $value = '',
        public string $error = '',
    ) {
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('oneui::components.floating-label');
    }
}

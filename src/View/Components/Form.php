<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

/**
 * Form Component
 *
 * Form wrapper with automatic CSRF token and file upload support.
 *
 * Usage:
 * <x-oneui::form action="/submit" method="POST">
 *   <!-- Form fields -->
 * </x-oneui::form>
 * <x-oneui::form action="/upload" :has-files="true">
 *   <!-- File upload fields -->
 * </x-oneui::form>
 */
class Form extends Component
{
    public function __construct(
        public string $action = '',
        public string $method = 'POST',
        public bool $hasFiles = false,
    ) {
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('oneui::components.form');
    }
}

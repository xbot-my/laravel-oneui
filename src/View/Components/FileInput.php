<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

/**
 * File Input Component
 *
 * Styled file input component with drag-and-drop support and validation display.
 *
 * Usage:
 * <x-oneui::file-input name="avatar" label="Profile Picture" />
 * <x-oneui::file-input name="documents" :multiple="true" accept=".pdf,.doc" />
 * <x-oneui::file-input name="photo" error="File is required" />
 */
class FileInput extends Component
{
    public function __construct(
        public string $name,
        public string $label = '',
        public bool $multiple = false,
        public string $accept = '',
        public string $error = '',
    ) {
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('oneui::components.file-input');
    }
}

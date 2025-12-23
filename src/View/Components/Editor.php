<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

/**
 * Editor Rich Text Editor Component
 *
 * Usage:
 * <x-oneui::editor name="content" />
 * <x-oneui::editor name="content" :toolbar="['bold', 'italic', 'link']" />
 */
class Editor extends Component
{
    public function __construct(
        public string $name,
        public ?string $id = null,
        public ?string $value = null,
        public ?string $label = null,
        public ?string $placeholder = null,
        public string $height = '300px',
        public string $type = 'ckeditor',
    ) {
        $this->id = $id ?? $name;
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('oneui::components.editor');
    }
}

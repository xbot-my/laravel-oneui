<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Modal Component
 *
 * Usage:
 * <x-oneui::modal id="my-modal" title="Modal Title">
 *     Modal content here
 *     <x-slot:footer>
 *         <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
 *     </x-slot>
 * </x-oneui::modal>
 */
class Modal extends Component
{
    public function __construct(
        public string $id,
        public ?string $title = null,
        public string $size = '',
        public bool $centered = false,
        public bool $scrollable = false,
        public bool $static = false,
    ) {
    }

    public function modalDialogClasses(): string
    {
        $classes = ['modal-dialog'];

        if ($this->size) {
            $classes[] = "modal-{$this->size}";
        }

        if ($this->centered) {
            $classes[] = 'modal-dialog-centered';
        }

        if ($this->scrollable) {
            $classes[] = 'modal-dialog-scrollable';
        }

        return implode(' ', $classes);
    }

    public function render(): View
    {
        return view('oneui::components.modal');
    }
}

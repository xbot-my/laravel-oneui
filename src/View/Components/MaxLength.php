<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * MaxLength Component - Bootstrap Maxlength wrapper
 *
 * Shows a character counter/progress bar for text inputs
 *
 * Usage:
 * <x-oneui::max-length name="title" :limit="55" label="Title" />
 * <x-oneui::max-length name="bio" :limit="200" :always-show="true" placement="bottom" />
 * <x-oneui::max-length name="description" :limit="500" :show-text="true" />
 */
class MaxLength extends Component
{
    public function __construct(
        public string $name,
        public ?string $id = null,
        public ?string $label = null,
        public int $limit = 100,
        public bool $alwaysShow = true,
        public string $placement = 'top', // top, bottom, left, right
        public bool $showText = false,
        public bool $textarea = false,
        public ?string $value = null,
        public ?string $placeholder = null,
        public int $rows = 3,
        public bool $disabled = false,
        public bool $readonly = false,
    ) {
        $this->id = $id ?? $name;
    }

    public function render(): View
    {
        return view('oneui::components.max-length');
    }
}

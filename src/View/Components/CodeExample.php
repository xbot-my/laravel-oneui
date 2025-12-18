<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * CodeExample Component - Display component preview with code tab
 *
 * Usage:
 * <x-oneui::code-example title="Primary Button" :code="$buttonCode">
 *     <x-oneui::button type="primary">Primary</x-oneui::button>
 * </x-oneui::code-example>
 */
class CodeExample extends Component
{
    public function __construct(
        public ?string $title = null,
        public ?string $code = null,
    ) {
    }

    public function render(): View
    {
        return view('oneui::components.code-example');
    }
}

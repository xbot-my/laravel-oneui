<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Tabs Component
 *
 * Usage:
 * <x-oneui::tabs id="my-tabs">
 *     <x-slot:tabs>
 *         <li class="nav-item"><button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab1">Tab 1</button></li>
 *     </x-slot>
 *     <div class="tab-pane active" id="tab1">Content 1</div>
 * </x-oneui::tabs>
 */
class Tabs extends Component
{
    public function __construct(
        public string $id = '',
        public string $style = 'default',
        public bool $block = false,
        public bool $justified = false,
    ) {
    }

    public function navClasses(): string
    {
        $classes = ['nav', 'nav-tabs'];

        if ($this->style === 'block') {
            $classes[] = 'nav-tabs-block';
        } elseif ($this->style === 'alt') {
            $classes[] = 'nav-tabs-alt';
        }

        if ($this->justified) {
            $classes[] = 'nav-justified';
        }

        return implode(' ', $classes);
    }

    public function render(): View
    {
        return view('oneui::components.tabs');
    }
}

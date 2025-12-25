<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

/**
 * Card Component
 *
 * Versatile content container with optional title and configurable styling.
 *
 * Usage:
 * <x-oneui::card title="Welcome">
 *   <p>Card content goes here.</p>
 * </x-oneui::card>
 * <x-oneui::card :rounded="false">
 *   <p>Sharp corner card.</p>
 * </x-oneui::card>
 */
class Card extends Component
{
    public function __construct(
        public string $title = '',
        public bool $rounded = true,
    ) {
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('oneui::components.card');
    }
}

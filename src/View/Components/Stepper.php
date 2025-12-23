<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

/**
 * Stepper Component
 *
 * Usage:
 * <x-oneui::stepper :steps="[
 *     ['title' => 'Step 1', 'description' => 'Details'],
 *     ['title' => 'Step 2', 'description' => 'Details'],
 * ]" :current="1" />
 */
class Stepper extends Component
{
    public function __construct(
        public array $steps = [],
        public int $current = 0,
        public bool $vertical = false,
    ) {
    }

    public function stepperClasses(): string
    {
        $classes = ['nav', 'nav-pills', 'nav-justified'];

        if ($this->vertical) {
            $classes = ['nav', 'flex-column'];
        }

        return implode(' ', $classes);
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('oneui::components.stepper');
    }
}

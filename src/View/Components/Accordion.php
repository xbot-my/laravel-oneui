<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

/**
 * Accordion Component
 *
 * Usage:
 * <x-oneui::accordion id="faq" :items="[
 *     ['title' => 'Question 1', 'content' => 'Answer 1'],
 *     ['title' => 'Question 2', 'content' => 'Answer 2'],
 * ]" />
 */
class Accordion extends Component
{
    public function __construct(
        public string $id = 'accordion',
        public array $items = [],
        public bool $flush = false,
        public ?int $open = 0,
    ) {
    }

    public function accordionClasses(): string
    {
        $classes = ['accordion'];

        if ($this->flush) {
            $classes[] = 'accordion-flush';
        }

        return implode(' ', $classes);
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('oneui::components.accordion');
    }
}

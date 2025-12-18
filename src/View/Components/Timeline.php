<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

/**
 * Timeline 时间线组件
 *
 * Usage:
 * <x-oneui::timeline :items="[
 *     ['title' => 'Event 1', 'content' => 'Description', 'time' => '2024-01-01'],
 *     ['title' => 'Event 2', 'content' => 'Description', 'time' => '2024-01-02'],
 * ]" />
 */
class Timeline extends Component
{
    public function __construct(
        public array $items = [],
        public bool $centered = false,
        public bool $alt = false,
    ) {
    }

    public function timelineClasses(): string
    {
        $classes = ['timeline'];

        if ($this->centered) {
            $classes[] = 'timeline-centered';
        }

        if ($this->alt) {
            $classes[] = 'timeline-alt';
        }

        return implode(' ', $classes);
    }

    public function render()
    {
        return view('oneui::components.timeline');
    }
}

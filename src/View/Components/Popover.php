<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Popover Component - Bootstrap 5 Popover wrapper
 *
 * Usage:
 * <x-oneui::popover title="Popover Title" content="Popover content">
 *     <button class="btn btn-primary">Hover me</button>
 * </x-oneui::popover>
 *
 * <x-oneui::popover title="Click Popover" content="Content here" trigger="click">
 *     <button class="btn btn-primary">Click me</button>
 * </x-oneui::popover>
 */
class Popover extends Component
{
    public function __construct(
        public string $title,
        public string $content,
        public string $placement = 'top', // top, right, bottom, left
        public string $trigger = 'hover', // hover, click, focus, manual
        public bool $html = false,
        public bool $animation = true,
        public ?string $delay = null, // delay in ms (e.g., "100" or "0,100" for show/hide)
    ) {
    }

    public function popoverAttributes(): string
    {
        $attrs = [
            'data-bs-toggle' => 'popover',
            'data-bs-placement' => $this->placement,
            'data-bs-trigger' => $this->trigger,
            'data-bs-animation' => $this->animation ? 'true' : 'false',
            'data-bs-html' => $this->html ? 'true' : 'false',
            'data-bs-content' => $this->content,
            'title' => $this->title,
        ];

        if ($this->delay !== null) {
            $attrs['data-bs-delay'] = $this->delay;
        }

        $parts = [];
        foreach ($attrs as $key => $value) {
            $parts[] = sprintf('%s="%s"', $key, htmlspecialchars($value, ENT_QUOTES, 'UTF-8'));
        }

        return implode(' ', $parts);
    }

    public function render(): View
    {
        return view('oneui::components.popover');
    }
}

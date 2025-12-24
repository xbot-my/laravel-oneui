<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * DataList Component - Display key-value pairs
 *
 * Creates styled data lists for displaying information
 *
 * Usage:
 * <x-oneui::data-list :items="['Name' => 'John', 'Email' => 'john@example.com']" />
 * <x-oneui::data-list :items="$data" orientation="horizontal" />
 */
class DataList extends Component
{
    public function __construct(
        public array $items = [],
        public string $orientation = 'vertical', // vertical, horizontal
        public string $variant = 'default', // default, bordered, striped
        public bool $hover = false,
        public ?string $labelClass = null,
        public ?string $valueClass = null,
        public array $options = [],
    ) {
    }

    /**
     * Check if orientation is horizontal
     */
    public function isHorizontal(): bool
    {
        return $this->orientation === 'horizontal';
    }

    /**
     * Get item label class
     */
    public function getLabelClass(string $key): string
    {
        $classes = ['data-list-label'];

        if ($this->labelClass) {
            $classes[] = $this->labelClass;
        }

        return implode(' ', $classes);
    }

    /**
     * Get item value class
     */
    public function getValueClass(): string
    {
        $classes = ['data-list-value'];

        if ($this->valueClass) {
            $classes[] = $this->valueClass;
        }

        return implode(' ', $classes);
    }

    /**
     * Get container classes
     */
    public function getContainerClasses(): string
    {
        $classes = ['data-list'];

        if ($this->variant) {
            $classes[] = 'data-list-' . $this->variant;
        }

        if ($this->hover) {
            $classes[] = 'data-list-hover';
        }

        if ($this->isHorizontal()) {
            $classes[] = 'data-list-horizontal';
        }

        return implode(' ', $classes);
    }

    public function render(): View
    {
        return view('oneui::components.data-list');
    }
}

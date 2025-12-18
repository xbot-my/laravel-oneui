<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

/**
 * Row 组件
 *
 * Usage:
 * <x-oneui::row>
 *     <x-oneui::col>...</x-oneui::col>
 * </x-oneui::row>
 *
 * <x-oneui::row cols="3" gap="4">...</x-oneui::row>
 */
class Row extends Component
{
    public function __construct(
        public ?string $cols = null,
        public ?string $colsMd = null,
        public ?string $colsLg = null,
        public ?string $gap = null,
        public ?string $gapX = null,
        public ?string $gapY = null,
        public bool $items = false,
    ) {
    }

    public function rowClasses(): string
    {
        $classes = ['row'];

        if ($this->cols) {
            $classes[] = 'row-cols-' . $this->cols;
        }

        if ($this->colsMd) {
            $classes[] = 'row-cols-md-' . $this->colsMd;
        }

        if ($this->colsLg) {
            $classes[] = 'row-cols-lg-' . $this->colsLg;
        }

        if ($this->gap) {
            $classes[] = 'g-' . $this->gap;
        }

        if ($this->gapX) {
            $classes[] = 'gx-' . $this->gapX;
        }

        if ($this->gapY) {
            $classes[] = 'gy-' . $this->gapY;
        }

        if ($this->items) {
            $classes[] = 'items-push';
        }

        return implode(' ', $classes);
    }

    public function render()
    {
        return view('oneui::components.row');
    }
}

<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

/**
 * Col 组件
 *
 * Usage:
 * <x-oneui::col>Auto width</x-oneui::col>
 * <x-oneui::col cols="6">Half width</x-oneui::col>
 * <x-oneui::col md="4" lg="3">Responsive</x-oneui::col>
 */
class Col extends Component
{
    public function __construct(
        public ?string $cols = null,
        public ?string $sm = null,
        public ?string $md = null,
        public ?string $lg = null,
        public ?string $xl = null,
        public ?string $offset = null,
        public ?string $offsetMd = null,
        public ?string $order = null,
    ) {
    }

    public function colClasses(): string
    {
        $classes = [];

        // 基础列宽
        if ($this->cols) {
            $classes[] = 'col-' . $this->cols;
        } elseif (!$this->sm && !$this->md && !$this->lg && !$this->xl) {
            $classes[] = 'col';
        }

        // 响应式列宽
        if ($this->sm) {
            $classes[] = 'col-sm-' . $this->sm;
        }

        if ($this->md) {
            $classes[] = 'col-md-' . $this->md;
        }

        if ($this->lg) {
            $classes[] = 'col-lg-' . $this->lg;
        }

        if ($this->xl) {
            $classes[] = 'col-xl-' . $this->xl;
        }

        // 偏移
        if ($this->offset) {
            $classes[] = 'offset-' . $this->offset;
        }

        if ($this->offsetMd) {
            $classes[] = 'offset-md-' . $this->offsetMd;
        }

        // 排序
        if ($this->order) {
            $classes[] = 'order-' . $this->order;
        }

        return implode(' ', $classes);
    }

    public function render()
    {
        return view('oneui::components.col');
    }
}

<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

/**
 * Spinner 组件
 *
 * Usage:
 * <x-oneui::spinner />
 * <x-oneui::spinner type="grow" color="success" />
 */
class Spinner extends Component
{
    public function __construct(
        public string $type = 'border',
        public string $color = 'primary',
        public string $size = '',
    ) {
    }

    public function spinnerClasses(): string
    {
        $typeClass = $this->type === 'grow' ? 'spinner-grow' : 'spinner-border';
        $classes = [$typeClass];

        if ($this->size === 'sm') {
            $classes[] = $typeClass . '-sm';
        }

        $classes[] = "text-{$this->color}";

        return implode(' ', $classes);
    }

    public function render()
    {
        return view('oneui::components.spinner');
    }
}

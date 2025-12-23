<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

/**
 * Hero 组件（页头大图区域）
 *
 * Usage:
 * <x-oneui::hero title="Welcome" subtitle="Dashboard overview">
 *     <x-slot:actions>
 *         <a class="btn btn-primary" href="#">Get Started</a>
 *     </x-slot>
 * </x-oneui::hero>
 *
 * With background image:
 * <x-oneui::hero title="Profile" image="photos/profile.jpg" overlay="primary" />
 */
class Hero extends Component
{
    public function __construct(
        public ?string $title = null,
        public ?string $subtitle = null,
        public ?string $image = null,
        public ?string $overlay = null,
        public string $size = '',
        public bool $dark = false,
    ) {
    }

    public function heroClasses(): string
    {
        $classes = ['bg-body-light'];

        if ($this->image) {
            $classes = ['bg-image'];
        }

        return implode(' ', $classes);
    }

    public function contentClasses(): string
    {
        $classes = ['content', 'content-full'];

        if ($this->size === 'sm') {
            $classes[] = 'py-4';
        } elseif ($this->size === 'lg') {
            $classes[] = 'py-7';
        } else {
            $classes[] = 'py-5';
        }

        return implode(' ', $classes);
    }

    public function overlayClasses(): string
    {
        if (!$this->overlay) {
            return '';
        }

        $classes = ['bg-' . $this->overlay];
        $classes[] = $this->dark ? '' : 'bg-black-50';

        return implode(' ', array_filter($classes));
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('oneui::components.hero');
    }
}

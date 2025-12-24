<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Tiles Component - Dashboard tile widgets
 *
 * Usage:
 * <x-oneui::tiles title="Accounts" value="15" />
 * <x-oneui::tiles title="Users" value="98" color="modern" />
 * <x-oneui::tiles icon="fa-bookmark" label="Bookmarks" image="..." />
 */
class Tiles extends Component
{
    public function __construct(
        public string $title,
        public ?string $value = null,
        public ?string $label = null,
        public ?string $icon = null,
        public ?string $image = null,
        public string $ratio = '1x1', // 1x1, 4x3, 16x9
        public string $color = 'default', // default, modern, amethyst, city, flat, smooth, primary, etc.
        public bool $dark = false,
        public bool $link = true,
        public ?string $url = null,
        public string $size = 'md', // sm, md, lg
        public array $options = [],
    ) {
        $this->label = $label ?: $title;
        $this->url = $url ?: 'javascript:void(0)';
    }

    /**
     * Get tile container classes
     */
    public function tileClasses(): string
    {
        $classes = [
            'block',
            'block-rounded',
            'text-center',
        ];

        if ($this->color !== 'default') {
            $classes[] = 'bg-' . $this->color;
        }

        if ($this->dark) {
            $classes[] = 'text-white';
        }

        return implode(' ', $classes);
    }

    /**
     * Get content classes for overlay
     */
    public function contentClasses(): string
    {
        $classes = ['block-content', 'block-content-full'];

        if ($this->image) {
            $classes[] = 'bg-' . $this->color . '-op';
        }

        $classes[] = 'ratio';
        $classes[] = 'ratio-' . $this->ratio;

        return implode(' ', $classes);
    }

    /**
     * Get column classes based on size
     */
    public function colClasses(): string
    {
        return match ($this->size) {
            'sm' => 'col-6 col-md-3',
            'md' => 'col-6 col-md-4',
            'lg' => 'col-4 col-md-3',
            default => 'col-6 col-md-4',
        };
    }

    /**
     * Get icon classes
     */
    public function iconClasses(): string
    {
        $classes = ['fa'];

        if (str_starts_with($this->icon, 'fa-')) {
            $classes[] = substr($this->icon, 3);
        } else {
            $classes[] = $this->icon;
        }

        if (str_starts_with($this->icon, 'far')) {
            $classes[] = 'far';
        } elseif (str_starts_with($this->icon, 'fas')) {
            $classes[] = 'fas';
        } elseif (str_starts_with($this->icon, 'fab')) {
            $classes[] = 'fab';
        } elseif (str_starts_with($this->icon, 'si')) {
            $classes = ['si', substr($this->icon, 3)];
        }

        $classes[] = 'fa-2x';

        if ($this->dark || $this->image) {
            $classes[] = 'text-white';
        }

        return implode(' ', array_filter($classes));
    }

    public function render(): View
    {
        return view('oneui::components.tiles');
    }
}

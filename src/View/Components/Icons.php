<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Icons Component - Font Awesome icon wrapper
 *
 * Displays Font Awesome icons with various options
 *
 * Usage:
 * <x-oneui::icons icon="fa-user" />
 * <x-oneui::icons icon="fa-envelope" size="2x" type="solid" />
 */
class Icons extends Component
{
    public function __construct(
        public string $icon,
        public ?string $title = null,
        public string $size = '', // '', lg, 2x, 3x, 4x, 5x
        public bool $fixedWidth = false,
        public string $type = 'solid', // solid, regular, light, duotone, brands
        public bool $spin = false,
        public bool $pulse = false,
        public string $border = '', // normal type border
        public bool $pull = false, // left or right
        public string $rotate = '', // 90, 180, 270
        public bool $flip = false, // horizontal, vertical, both
        public string $animation = '', // bounce, fade, beat, etc.
        public array $stack = [], // For stacked icons
        public bool $inverse = false,
        public string $color = '',
        public ?string $class = null,
    ) {
    }

    /**
     * Get icon CSS classes
     */
    public function getIconClasses(): string
    {
        $classes = [$this->icon];

        // Add size class
        if ($this->size) {
            if ($this->size === 'lg') {
                $classes[] = 'fa-lg';
            } else {
                $classes[] = 'fa-' . $this->size;
            }
        }

        // Add fixed width
        if ($this->fixedWidth) {
            $classes[] = 'fa-fw';
        }

        // Add spin
        if ($this->spin) {
            $classes[] = 'fa-spin';
        }

        // Add pulse
        if ($this->pulse) {
            $classes[] = 'fa-pulse';
        }

        // Add border type
        if ($this->border) {
            $classes[] = 'fa-border';
        }

        // Add pull
        if ($this->pull) {
            $classes[] = 'fa-pull-' . $this->pull;
        }

        // Add rotate
        if ($this->rotate) {
            $classes[] = 'fa-rotate-' . $this->rotate;
        }

        // Add flip
        if ($this->flip) {
            $classes[] = 'fa-flip-' . $this->flip;
        }

        // Add animation
        if ($this->animation) {
            $classes[] = 'fa-' . $this->animation;
        }

        // Add inverse
        if ($this->inverse) {
            $classes[] = 'fa-inverse';
        }

        // Add custom class
        if ($this->class) {
            $classes[] = $this->class;
        }

        return implode(' ', $classes);
    }

    /**
     * Get inline styles
     */
    public function getStyles(): string
    {
        $styles = [];

        if ($this->color) {
            $styles[] = 'color: ' . $this->color;
        }

        return implode('; ', $styles);
    }

    public function render(): View
    {
        return view('oneui::components.icons');
    }
}

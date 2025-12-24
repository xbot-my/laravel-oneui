<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Image Component - Responsive image wrapper
 *
 * Usage:
 * <x-oneui::image src="path/to/image.jpg" alt="Description" />
 * <x-oneui::image src="path/to/image.jpg" rounded thumbnail />
 * <x-oneui::image src="path/to/image.jpg" circle size="md" />
 */
class Image extends Component
{
    public function __construct(
        public string $src,
        public ?string $alt = null,
        public string $size = 'md', // xs, sm, md, lg, xl, or custom (e.g., '64px')
        public bool $fluid = true,
        public bool $rounded = false,
        public bool $circle = false,
        public bool $thumbnail = false,
        public bool $shadow = false,
        public ?string $fit = null, // cover, contain, fill, none, scale-down
        public bool $lazy = true,
        public ?string $url = null, // Optional link wrapper
        public ?string $class = null,
    ) {
        $this->alt = $alt ?: pathinfo($this->src, PATHINFO_FILENAME);
    }

    /**
     * Get image classes
     */
    public function imageClasses(): string
    {
        $classes = [];

        if ($this->fluid) {
            $classes[] = 'img-fluid';
        }

        if ($this->thumbnail) {
            $classes[] = 'img-thumbnail';
        }

        if ($this->rounded && !$this->circle) {
            $classes[] = 'rounded';
        }

        if ($this->circle) {
            $classes[] = 'rounded-circle';
        }

        if ($this->shadow) {
            $classes[] = 'shadow';
        }

        // Size classes
        if (!$this->fluid && in_array($this->size, ['xs', 'sm', 'md', 'lg', 'xl'])) {
            $sizeMap = [
                'xs' => ['width' => '16px', 'height' => '16px'],
                'sm' => ['width' => '32px', 'height' => '32px'],
                'md' => ['width' => '64px', 'height' => '64px'],
                'lg' => ['width' => '96px', 'height' => '96px'],
                'xl' => ['width' => '128px', 'height' => '128px'],
            ];
            // Size will be applied via style attribute
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return implode(' ', array_filter($classes));
    }

    /**
     * Get inline styles
     */
    public function style(): string
    {
        $styles = [];

        if (!$this->fluid) {
            $sizeMap = [
                'xs' => ['width' => '16px', 'height' => '16px'],
                'sm' => ['width' => '32px', 'height' => '32px'],
                'md' => ['width' => '64px', 'height' => '64px'],
                'lg' => ['width' => '96px', 'height' => '96px'],
                'xl' => ['width' => '128px', 'height' => '128px'],
            ];

            if (isset($sizeMap[$this->size])) {
                $styles[] = 'width: ' . $sizeMap[$this->size]['width'];
                $styles[] = 'height: ' . $sizeMap[$this->size]['height'];
            } elseif (is_numeric($this->size) || str_ends_with($this->size, 'px')) {
                $styles[] = 'width: ' . $this->size;
                $styles[] = 'height: ' . $this->size;
            }
        }

        if ($this->fit) {
            $styles[] = 'object-fit: ' . $this->fit;
        }

        // For circle images, ensure proper aspect ratio
        if ($this->circle && $this->fluid) {
            $styles[] = 'aspect-ratio: 1/1';
        }

        return implode('; ', $styles);
    }

    /**
     * Get loading attribute
     */
    public function loading(): string
    {
        return $this->lazy ? 'lazy' : 'eager';
    }

    public function render(): View
    {
        return view('oneui::components.image');
    }
}

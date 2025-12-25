<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Animations Component - CSS Animation wrapper
 *
 * Applies CSS animations to content
 *
 * Usage:
 * <x-oneui::animations animation="fadeIn">Content to animate</x-oneui::animations>
 * <x-oneui::animations animation="bounce" :delay="200" :duration="1000">Bouncing content</x-oneui::animations>
 */
class Animations extends Component
{
    // Available animations
    public const FADE_IN = 'fadeIn';
    public const FADE_IN_UP = 'fadeInUp';
    public const FADE_IN_DOWN = 'fadeInDown';
    public const FADE_IN_LEFT = 'fadeInLeft';
    public const FADE_IN_RIGHT = 'fadeInRight';
    public const FADE_OUT = 'fadeOut';
    public const FADE_OUT_UP = 'fadeOutUp';
    public const FADE_OUT_DOWN = 'fadeOutDown';
    public const FADE_OUT_LEFT = 'fadeOutLeft';
    public const FADE_OUT_RIGHT = 'fadeOutRight';

    public const BOUNCE_IN = 'bounceIn';
    public const BOUNCE_OUT = 'bounceOut';
    public const BOUNCE = 'bounce';

    public const FLIP_IN_X = 'flipInX';
    public const FLIP_IN_Y = 'flipInY';
    public const FLIP_OUT_X = 'flipOutX';
    public const FLIP_OUT_Y = 'flipOutY';

    public const SLIDE_IN_UP = 'slideInUp';
    public const SLIDE_IN_DOWN = 'slideInDown';
    public const SLIDE_IN_LEFT = 'slideInLeft';
    public const SLIDE_IN_RIGHT = 'slideInRight';
    public const SLIDE_OUT_UP = 'slideOutUp';
    public const SLIDE_OUT_DOWN = 'slideOutDown';
    public const SLIDE_OUT_LEFT = 'slideOutLeft';
    public const SLIDE_OUT_RIGHT = 'slideOutRight';

    public const ZOOM_IN = 'zoomIn';
    public const ZOOM_OUT = 'zoomOut';

    public const ROTATE_IN = 'rotateIn';
    public const ROTATE_OUT = 'rotateOut';

    public const HINGE = 'hinge';
    public const ROLL_IN = 'rollIn';
    public const ROLL_OUT = 'rollOut';
    public const LIGHTSPEED_IN = 'lightSpeedIn';
    public const LIGHTSPEED_OUT = 'lightSpeedOut';

    public function __construct(
        public string $animation = 'fadeIn',
        public int $delay = 0,
        public int $duration = 0,
        public int $iteration = 1,
        public bool $infinite = false,
        public string $timing = 'ease', // linear, ease, ease-in, ease-out, ease-in-out
        public string $direction = 'normal', // normal, reverse, alternate, alternate-reverse
        public string $fillMode = 'both', // none, forwards, backwards, both
        public string $trigger = 'load', // load, hover, click, manual
        public ?string $class = null,
    ) {
    }

    /**
     * Get animation CSS classes
     */
    public function getAnimationClasses(): string
    {
        $classes = ['animated'];

        if ($this->infinite) {
            $classes[] = 'infinite';
        }

        if ($this->delay > 0) {
            $classes[] = 'delay-' . $this->delay . 'ms';
        }

        if ($this->duration > 0) {
            $classes[] = 'duration-' . $this->duration . 'ms';
        }

        if ($this->iteration > 0 || $this->infinite) {
            if ($this->infinite) {
                $classes[] = 'iteration-infinite';
            } else {
                $classes[] = 'iteration-' . $this->iteration;
            }
        }

        if ($this->class) {
            $classes[] = $this->class;
        }

        return implode(' ', $classes);
    }

    /**
     * Get inline animation styles
     */
    public function getAnimationStyles(): string
    {
        $styles = [];

        if ($this->delay > 0 && !str_contains($this->getAnimationClasses(), 'delay-')) {
            $styles[] = 'animation-delay: ' . ($this->delay / 1000) . 's';
        }

        if ($this->duration > 0 && !str_contains($this->getAnimationClasses(), 'duration-')) {
            $styles[] = 'animation-duration: ' . ($this->duration / 1000) . 's';
        }

        if ($this->iteration > 0 && !str_contains($this->getAnimationClasses(), 'iteration-')) {
            $styles[] = 'animation-iteration-count: ' . ($this->infinite ? 'infinite' : $this->iteration);
        }

        if ($this->timing !== 'ease') {
            $styles[] = 'animation-timing-function: ' . $this->timing;
        }

        if ($this->direction !== 'normal') {
            $styles[] = 'animation-direction: ' . $this->direction;
        }

        if ($this->fillMode !== 'both') {
            $styles[] = 'animation-fill-mode: ' . $this->fillMode;
        }

        return implode('; ', $styles);
    }

    /**
     * Get the animation name for inline style
     */
    public function getAnimationName(): string
    {
        return match($this->animation) {
            'fadeIn' => 'fadeIn',
            'fadeInUp' => 'fadeInUp',
            'fadeInDown' => 'fadeInDown',
            'fadeInLeft' => 'fadeInLeft',
            'fadeInRight' => 'fadeInRight',
            'fadeOut' => 'fadeOut',
            'bounce' => 'bounce',
            'bounceIn' => 'bounceIn',
            'bounceOut' => 'bounceOut',
            'flipInX' => 'flipInX',
            'flipInY' => 'flipInY',
            'slideInUp' => 'slideInUp',
            'slideInDown' => 'slideInDown',
            'zoomIn' => 'zoomIn',
            'zoomOut' => 'zoomOut',
            default => $this->animation,
        };
    }

    public function render(): View
    {
        return view('oneui::components.animations');
    }
}

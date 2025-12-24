<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Carousel Component - Slick Carousel wrapper
 *
 * Creates responsive carousels/sliders with touch support
 *
 * Usage:
 * <x-oneui::carousel>
 *   <x-slot:items>
 *     <img src="image1.jpg" />
 *     <img src="image2.jpg" />
 *   </x-slot:items>
 * </x-oneui::carousel>
 *
 * <x-oneui::carousel slides-to-show="3" dots="false" arrows="false">
 *   <x-slot:items>
 *     <!-- content -->
 *   </x-slot:items>
 * </x-oneui::carousel>
 */
class Carousel extends Component
{
    public function __construct(
        public string $id,
        public int $slidesToShow = 1,
        public int $slidesToScroll = 1,
        public bool $infinite = true,
        public bool $dots = true,
        public bool $arrows = true,
        public bool $autoplay = false,
        public int $autoplaySpeed = 3000,
        public int $speed = 300,
        public bool $fade = false,
        public bool $draggable = true,
        public bool $swipe = true,
        public bool $touchMove = true,
        public bool $vertical = false,
        public bool $verticalSwiping = false,
        public bool $adaptiveHeight = false,
        public bool $centerMode = false,
        public string|bool $centerPadding = '50px',
        public int $rows = 1,
        public int $slidesPerRow = 1,
        public bool $variableWidth = false,
        public bool $responsive = true,
        public ?string $prevArrow = null, // Custom HTML for prev arrow
        public ?string $nextArrow = null, // Custom HTML for next arrow
        public ?string $appendDots = null, // Selector to append dots
        public array $breakpoints = [], // Responsive breakpoints [[breakpoint, settings]]
        public array $options = [],
    ) {
    }

    /**
     * Get Slick Carousel configuration as JavaScript object
     */
    public function slickOptions(): string
    {
        $options = [
            'slidesToShow' => $this->slidesToShow,
            'slidesToScroll' => $this->slidesToScroll,
            'infinite' => $this->infinite,
            'dots' => $this->dots,
            'arrows' => $this->arrows,
            'autoplay' => $this->autoplay,
            'autoplaySpeed' => $this->autoplaySpeed,
            'speed' => $this->speed,
            'fade' => $this->fade,
            'draggable' => $this->draggable,
            'swipe' => $this->swipe,
            'touchMove' => $this->touchMove,
            'vertical' => $this->vertical,
            'verticalSwiping' => $this->verticalSwiping,
            'adaptiveHeight' => $this->adaptiveHeight,
            'centerMode' => $this->centerMode,
            'centerPadding' => $this->centerPadding,
            'rows' => $this->rows,
            'slidesPerRow' => $this->slidesPerRow,
            'variableWidth' => $this->variableWidth,
        ];

        // Custom arrows
        if ($this->prevArrow) {
            $options['prevArrow'] = $this->prevArrow;
        }
        if ($this->nextArrow) {
            $options['nextArrow'] = $this->nextArrow;
        }
        if ($this->appendDots) {
            $options['appendDots'] = $this->appendDots;
        }

        // Responsive breakpoints
        if (!empty($this->breakpoints)) {
            $options['responsive'] = $this->breakpoints;
        }

        // Merge with custom options
        $options = array_merge($options, $this->options);

        return json_encode($options, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    public function render(): View
    {
        return view('oneui::components.carousel');
    }
}

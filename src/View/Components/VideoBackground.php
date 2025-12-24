<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * VideoBackground Component - Vide.js wrapper
 *
 * Creates video backgrounds for sections
 *
 * Usage:
 * <x-oneui::video-background src="path/to/video.mp4" poster="path/to/poster.jpg">
 *   <h1>Content over video</h1>
 * </x-oneui::video-background>
 */
class VideoBackground extends Component
{
    public function __construct(
        public string $id,
        public string $src,
        public ?string $poster = null,
        public string|bool $muted = true,
        public bool $loop = true,
        public bool $autoplay = true,
        public string|bool $playsinline = true,
        public string $position = 'center center', // CSS background-position style
        public string $fit = 'cover', // cover, contain
        public int $volume = 0, // 0-100
        public array $options = [],
    ) {
    }

    /**
     * Get Vide.js configuration as JavaScript object
     */
    public function videoOptions(): string
    {
        $options = [
            'poster' => $this->poster,
            'muted' => $this->muted === true || $this->muted === 'true',
            'loop' => $this->loop,
            'autoplay' => $this->autoplay,
            'playsinline' => $this->playsinline === true || $this->playsinline === 'true',
            'position' => $this->position,
            'fit' => $this->fit,
            'volume' => $this->volume / 100,
        ];

        // Merge with custom options
        $options = array_merge($options, $this->options);

        return json_encode($options, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    public function render(): View
    {
        return view('oneui::components.video-background');
    }
}

<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * MagnificPopup Component - Magnific Popup wrapper
 *
 * Creates lightbox popups for images, galleries, and inline content
 *
 * Usage:
 * <x-oneui::magnific-popup type="image" :src="imageSrc" />
 * <x-oneui::magnific-popup-gallery :items="$galleryItems" />
 */
class MagnificPopup extends Component
{
    public function __construct(
        public string $id,
        public string $type = 'image', // image, gallery, inline, iframe, ajax
        public ?string $src = null,
        public ?string $title = null,
        public ?string $alt = null,
        public array $items = [], // For gallery type
        public string $delegate = 'a', // Selector for gallery items
        public bool $gallery = false,
        public bool $navigateByImgClick = true,
        public bool $arrowMarkup = true,
        public array $preload = [1, 1],
        public string $mainClass = '',
        public bool $fixedContentPos = false,
        public bool $fixedBgPos = true,
        public string $overflowY = 'auto',
        public bool $closeOnContentClick = false,
        public bool $closeOnBgClick = true,
        public bool $closeBtnInside = true,
        public bool $showCloseBtn = true,
        public bool $enableEscapeKey = true,
        public bool $modal = false,
        public ?string $alignTop = null,
        public ?string $removalDelay = null,
        public ?string $preloader = null,
        public ?string $callbacks = null,
        public array $options = [],
    ) {
    }

    /**
     * Get Magnific Popup configuration as JavaScript object
     */
    public function popupOptions(): string
    {
        $options = [
            'type' => $this->type,
            'navigateByImgClick' => $this->navigateByImgClick,
            'closeOnContentClick' => $this->closeOnContentClick,
            'closeOnBgClick' => $this->closeOnBgClick,
            'closeBtnInside' => $this->closeBtnInside,
            'showCloseBtn' => $this->showCloseBtn,
            'enableEscapeKey' => $this->enableEscapeKey,
            'mainClass' => $this->mainClass,
            'fixedContentPos' => $this->fixedContentPos,
            'fixedBgPos' => $this->fixedBgPos,
            'overflowY' => $this->overflowY,
        ];

        if ($this->alignTop !== null) {
            $options['alignTop'] = $this->alignTop === 'true' || $this->alignTop === true;
        }

        if ($this->removalDelay !== null) {
            $options['removalDelay'] = (int) $this->removalDelay;
        }

        if ($this->preloader !== null) {
            $options['preloader'] = $this->preloader;
        }

        if ($this->gallery) {
            $options['gallery'] = [
                'enabled' => true,
                'navigateByImgClick' => $this->navigateByImgClick,
            ];
            if ($this->arrowMarkup) {
                $options['arrowMarkup'] = '<button title="%title%" type="button" class="mfp-arrow mfp-arrow-%dir%"></button>';
            }
        }

        if ($this->preload) {
            $options['preload'] = $this->preload;
        }

        if ($this->modal) {
            $options['modal'] = true;
        }

        // Merge with custom options
        $options = array_merge($options, $this->options);

        return json_encode($options, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    public function render(): View
    {
        return view('oneui::components.magnific-popup');
    }
}

<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * ImageCropper Component - Cropper.js wrapper
 *
 * Creates image cropping interface with preview
 *
 * Usage:
 * <x-oneui::image-cropper name="avatar" :src="imageSrc" aspect-ratio="1" />
 * <x-oneui::image-cropper name="banner" :src="imageUrl" :circular="true" :options="$cropperOptions" />
 */
class ImageCropper extends Component
{
    public function __construct(
        public string $name,
        public ?string $id = null,
        public ?string $src = null,
        public int $viewMode = 1, // 0, 1, 2, 3
        public int|float|null $aspectRatio = null,
        public bool $circular = false,
        public int $minCropBoxWidth = 0,
        public int $minCropBoxHeight = 0,
        public int $minContainerWidth = 200,
        public int $minContainerHeight = 100,
        public string $dragMode = 'move', // 'move', 'crop', or 'none'
        public float $autoCropArea = 0.8,
        public bool $restore = true,
        public bool $guides = true,
        public bool $center = true,
        public bool $highlight = true,
        public bool $cropBoxMovable = true,
        public bool $cropBoxResizable = true,
        public bool $toggleDragModeOnDblclick = true,
        public array $options = [],
        public ?string $onCropEnd = null, // JS callback
        public ?string $onCrop = null, // JS callback
    ) {
        $this->id = $id ?? $name;
    }

    /**
     * Get Cropper.js configuration as JavaScript object
     */
    public function cropperOptions(): string
    {
        $options = [
            'viewMode' => $this->viewMode,
            'dragMode' => $this->dragMode === true ? 'move' : ($this->dragMode === false ? 'none' : $this->dragMode),
            'autoCropArea' => $this->autoCropArea,
            'restore' => $this->restore,
            'guides' => $this->guides,
            'center' => $this->center,
            'highlight' => $this->highlight,
            'cropBoxMovable' => $this->cropBoxMovable,
            'cropBoxResizable' => $this->cropBoxResizable,
            'toggleDragModeOnDblclick' => $this->toggleDragModeOnDblclick,
        ];

        if ($this->aspectRatio !== null) {
            $options['aspectRatio'] = $this->aspectRatio;
        }

        if ($this->minCropBoxWidth > 0) {
            $options['minCropBoxWidth'] = $this->minCropBoxWidth;
        }

        if ($this->minCropBoxHeight > 0) {
            $options['minCropBoxHeight'] = $this->minCropBoxHeight;
        }

        if ($this->minContainerWidth > 0) {
            $options['minContainerWidth'] = $this->minContainerWidth;
        }

        if ($this->minContainerHeight > 0) {
            $options['minContainerHeight'] = $this->minContainerHeight;
        }

        // Add event handlers
        if ($this->onCropEnd) {
            $options['cropend'] = $this->onCropEnd;
        }
        if ($this->onCrop) {
            $options['crop'] = $this->onCrop;
        }

        // Merge with custom options
        $options = array_merge($options, $this->options);

        return $this->arrayToJs($options);
    }

    /**
     * Convert PHP array to JavaScript object (with function support)
     */
    protected function arrayToJs(array $data): string
    {
        $js = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        // Handle function strings
        $js = preg_replace(
            '/"function\((.*?)\) {(.*?)\}"/s',
            'function($1) {$2}',
            $js
        );

        return $js;
    }

    public function render(): View
    {
        return view('oneui::components.image-cropper');
    }
}

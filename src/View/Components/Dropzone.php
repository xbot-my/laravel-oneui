<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Dropzone Component - Dropzone.js wrapper
 *
 * Creates drag-and-drop file upload zones with preview
 *
 * Usage:
 * <x-oneui::dropzone name="files" url="/upload" max-files="5" />
 * <x-oneui::dropzone name="images" url="/upload/images" :accepted-files="['image/jpeg', 'image/png']" />
 */
class Dropzone extends Component
{
    public function __construct(
        public string $name,
        public ?string $id = null,
        public string $url = '',
        public string $method = 'post',
        public int $maxFilesize = 256, // MB
        public ?int $maxFiles = null,
        public int $minFiles = 0,
        public int $thumbnailWidth = 120,
        public int $thumbnailHeight = 120,
        public bool $addRemoveLinks = true,
        public array $acceptedFiles = [], // MIME types or extensions
        public ?string $dictDefaultMessage = null,
        public ?string $dictFallbackMessage = null,
        public ?string $dictFallbackText = null,
        public ?string $dictFileTooBig = null,
        public ?string $dictInvalidFileType = null,
        public ?string = $dictResponseError = null,
        public ?string $dictCancelUpload = null,
        public ?string $dictCancelConfirmation = null,
        public ?string $dictRemoveFile = null,
        public ?string $dictMaxFilesExceeded = null,
        public bool $autoProcessQueue = true,
        public bool $uploadMultiple = false,
        public bool = $parallelUploads = 2,
        public bool $clickable = true,
        public bool $createImageThumbnails = true,
        public int $thumbnailMethod = 0, // 0=crop, 1=contain, 2=scale
        public bool $resizeWidth = null,
        public ?int $resizeHeight = null,
        public string $resizeMethod = 'contain', // contain, crop
        public bool $resizeQuality = 0.8,
        public array $options = [],
        public ?string $onSuccess = null, // JS callback
        public ?string $onError = null, // JS callback
        public ?string $onComplete = null, // JS callback
    ) {
        $this->id = $id ?? 'dropzone_' . str_replace('.', '_', uniqid('', true));
    }

    /**
     * Get Dropzone configuration as JavaScript object
     */
    public function dropzoneOptions(): string
    {
        $options = [
            'url' => $this->url,
            'method' => $this->method,
            'maxFilesize' => $this->maxFilesize,
            'thumbnailWidth' => $this->thumbnailWidth,
            'thumbnailHeight' => $this->thumbnailHeight,
            'addRemoveLinks' => $this->addRemoveLinks,
            'autoProcessQueue' => $this->autoProcessQueue,
            'parallelUploads' => $this->parallelUploads,
            'createImageThumbnails' => $this->createImageThumbnails,
        ];

        if ($this->maxFiles !== null) {
            $options['maxFiles'] = $this->maxFiles;
        }

        if ($this->minFiles > 0) {
            $options['minFiles'] = $this->minFiles;
        }

        if ($this->uploadMultiple) {
            $options['uploadMultiple'] = true;
            $options['paramName'] = $this->name . '[]';
        } else {
            $options['paramName'] = $this->name;
        }

        if (!$this->clickable) {
            $options['clickable'] = false;
        }

        if (!empty($this->acceptedFiles)) {
            $options['acceptedFiles'] = implode(',', $this->acceptedFiles);
        }

        if ($this->thumbnailMethod !== 0) {
            $methods = ['crop', 'contain', 'scale'];
            $options['thumbnailMethod'] = $methods[$this->thumbnailMethod] ?? 'contain';
        }

        // Resize options
        if ($this->resizeWidth !== null) {
            $options['resizeWidth'] = $this->resizeWidth;
        }

        if ($this->resizeHeight !== null) {
            $options['resizeHeight'] = $this->resizeHeight;
        }

        if ($this->resizeMethod !== 'contain') {
            $options['resizeMethod'] = $this->resizeMethod;
        }

        $options['resizeQuality'] = $this->resizeQuality;

        // Custom messages
        if ($this->dictDefaultMessage) {
            $options['dictDefaultMessage'] = $this->dictDefaultMessage;
        }

        if ($this->dictFallbackMessage) {
            $options['dictFallbackMessage'] = $this->dictFallbackMessage;
        }

        if ($this->dictFallbackText) {
            $options['dictFallbackText'] = $this->dictFallbackText;
        }

        if ($this->dictFileTooBig) {
            $options['dictFileTooBig'] = $this->dictFileTooBig;
        }

        if ($this->dictInvalidFileType) {
            $options['dictInvalidFileType'] = $this->dictInvalidFileType;
        }

        if ($this->dictResponseError) {
            $options['dictResponseError'] = $this->dictResponseError;
        }

        if ($this->dictCancelUpload) {
            $options['dictCancelUpload'] = $this->dictCancelUpload;
        }

        if ($this->dictCancelConfirmation) {
            $options['dictCancelConfirmation'] = $this->dictCancelConfirmation;
        }

        if ($this->dictRemoveFile) {
            $options['dictRemoveFile'] = $this->dictRemoveFile;
        }

        if ($this->dictMaxFilesExceeded) {
            $options['dictMaxFilesExceeded'] = $this->dictMaxFilesExceeded;
        }

        // Merge with custom options
        $options = array_merge($options, $this->options);

        return json_encode($options, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    public function render(): View
    {
        return view('oneui::components.dropzone');
    }
}

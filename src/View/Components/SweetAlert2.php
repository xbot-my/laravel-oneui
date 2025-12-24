<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * SweetAlert2 Component - SweetAlert2 wrapper
 *
 * Creates beautiful, responsive, customizable alert dialogs
 *
 * Usage:
 * <x-oneui::sweet-alert2 title="Are you sure?" text="You won't be able to revert this!" confirm="Yes, delete it!" />
 * <x-oneui::sweet-alert2 type="success" title="Deleted!" text="Your file has been deleted." timer="3000" />
 */
class SweetAlert2 extends Component
{
    public function __construct(
        public ?string $id = null,
        public ?string $title = null,
        public ?string $text = null,
        public ?string $html = null,
        public string $type = 'warning', // success, error, warning, info, question
        public ?string $icon = null, // Custom icon URL or HTML
        public ?string $confirmButtonText = null,
        public ?string $confirmButtonColor = null,
        public ?string $cancelButtonText = null,
        public ?string $cancelButtonColor = null,
        public bool $showConfirmButton = true,
        public bool $showCancelButton = false,
        public ?string $footer = null,
        public int|float|null $timer = null,
        public string $timerProgressBar = 'false', // 'true' or 'false' as string
        public ?string $position = null, // top, top-start, top-end, center, center-start, center-end, bottom, bottom-start, bottom-end
        public bool $allowOutsideClick = true,
        public bool $allowEscapeKey = true,
        public bool $allowEnterKey = true,
        public bool $stopKeydownPropagation = false,
        public ?string $imageUrl = null,
        public ?int $imageWidth = null,
        public ?int $imageHeight = null,
        public ?string $imageAlt = null,
        public bool $toast = false,
        public string $backdrop = 'true',
        public array $options = [],
    ) {
        if (!$this->id) {
            $this->id = 'swal_' . str_replace('.', '_', uniqid('', true));
        }
    }

    /**
     * Get SweetAlert2 configuration as JavaScript object
     */
    public function swalOptions(): string
    {
        $options = [];

        if ($this->title) {
            $options['title'] = $this->title;
        }

        if ($this->text) {
            $options['text'] = $this->text;
        }

        if ($this->html) {
            $options['html'] = $this->html;
        }

        if ($this->icon) {
            $options['icon'] = $this->icon;
        } elseif ($this->type) {
            $options['icon'] = $this->type;
        }

        if ($this->confirmButtonText) {
            $options['confirmButtonText'] = $this->confirmButtonText;
        }

        if ($this->confirmButtonColor) {
            $options['confirmButtonColor'] = $this->confirmButtonColor;
        }

        if ($this->showCancelButton) {
            $options['showCancelButton'] = true;
        }

        if ($this->cancelButtonText) {
            $options['cancelButtonText'] = $this->cancelButtonText;
        }

        if ($this->cancelButtonColor) {
            $options['cancelButtonColor'] = $this->cancelButtonColor;
        }

        if (!$this->showConfirmButton) {
            $options['showConfirmButton'] = false;
        }

        if ($this->footer) {
            $options['footer'] = $this->footer;
        }

        if ($this->timer) {
            $options['timer'] = $this->timer;
        }

        if ($this->timerProgressBar === 'true') {
            $options['timerProgressBar'] = true;
        }

        if ($this->position) {
            $options['position'] = $this->position;
        }

        if (!$this->allowOutsideClick) {
            $options['allowOutsideClick'] = false;
        }

        if (!$this->allowEscapeKey) {
            $options['allowEscapeKey'] = false;
        }

        if (!$this->allowEnterKey) {
            $options['allowEnterKey'] = false;
        }

        if ($this->stopKeydownPropagation) {
            $options['stopKeydownPropagation'] = true;
        }

        if ($this->imageUrl) {
            $options['imageUrl'] = $this->imageUrl;
        }

        if ($this->imageWidth) {
            $options['imageWidth'] = $this->imageWidth;
        }

        if ($this->imageHeight) {
            $options['imageHeight'] = $this->imageHeight;
        }

        if ($this->imageAlt) {
            $options['imageAlt'] = $this->imageAlt;
        }

        if ($this->toast) {
            $options['toast'] = true;
        }

        if ($this->backdrop !== 'true') {
            $options['backdrop'] = $this->backdrop === 'false' ? false : $this->backdrop;
        }

        // Merge with custom options
        $options = array_merge($options, $this->options);

        return json_encode($options, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    public function render(): View
    {
        return view('oneui::components.sweet-alert2');
    }
}

<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * CKEditor5Inline Component - CKEditor5 Inline wrapper
 *
 * Creates inline rich text editor with CKEditor5
 *
 * Usage:
 * <x-oneui::c-k-editor5-inline name="content" />
 * <x-oneui::c-k-editor5-inline name="description" :toolbar="['bold', 'italic', 'link']" />
 */
class CKEditor5Inline extends Component
{
    public function __construct(
        public string $name,
        public ?string $id = null,
        public ?string $label = null,
        public ?string $value = null,
        public ?string $placeholder = null,
        public int $height = 200,
        public array $toolbar = [],
        public bool $heading = false,
        public bool $bold = true,
        public bool $italic = true,
        public bool $link = true,
        public bool $bulletedList = true,
        public bool $numberedList = true,
        public string $language = 'en',
        public array $options = [],
    ) {
        $this->id = $id ?? 'ckeditor5-inline-' . $name;
    }

    /**
     * Get default toolbar configuration
     */
    public function getDefaultToolbar(): array
    {
        if (!empty($this->toolbar)) {
            return $this->toolbar;
        }

        $toolbar = [];

        if ($this->heading) {
            $toolbar[] = 'heading';
        }

        $toolbar[] = '|';

        if ($this->bold) {
            $toolbar[] = 'bold';
        }

        if ($this->italic) {
            $toolbar[] = 'italic';
        }

        $toolbar[] = '|';

        if ($this->link) {
            $toolbar[] = 'link';
        }

        if ($this->bulletedList) {
            $toolbar[] = 'bulletedList';
        }

        if ($this->numberedList) {
            $toolbar[] = 'numberedList';
        }

        return $toolbar;
    }

    /**
     * Get CKEditor5 plugins configuration as JavaScript array
     */
    public function getPlugins(): string
    {
        $plugins = [
            'Essentials',
            'Paragraph',
            'Autoformat',
        ];

        if ($this->heading) {
            $plugins[] = 'Heading';
        }

        if ($this->bold || $this->italic) {
            $plugins[] = 'BasicTexts';
        }

        if ($this->link) {
            $plugins[] = 'Link';
        }

        if ($this->bulletedList || $this->numberedList) {
            $plugins[] = 'List';
        }

        return json_encode($plugins);
    }

    /**
     * Get CKEditor5 configuration as JavaScript object
     */
    public function editorConfig(): string
    {
        $config = [
            'toolbar' => $this->getDefaultToolbar(),
            'language' => $this->language,
            'placeholder' => $this->placeholder ?? 'Click to edit...',
        ];

        // Merge with custom options
        $config = array_merge($config, $this->options);

        return json_encode($config, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    public function render(): View
    {
        return view('oneui::components.c-k-editor5-inline');
    }
}

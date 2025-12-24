<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * CKEditor5 Component - CKEditor5 Classic wrapper
 *
 * Creates rich text editor with CKEditor5
 *
 * Usage:
 * <x-oneui::c-k-editor5 name="content" :toolbar="['bold', 'italic', 'link']" />
 * <x-oneui::c-k-editor5 name="description" height="300" :options="$editorOptions" />
 */
class CKEditor5 extends Component
{
    public function __construct(
        public string $name,
        public ?string $id = null,
        public ?string $label = null,
        public ?string $value = null,
        public ?string $placeholder = null,
        public int $height = 200,
        public string $mode = 'classic', // classic, inline
        public array $toolbar = [],
        public bool $heading = false,
        public bool $bold = true,
        public bool $italic = true,
        public bool $link = true,
        public bool $bulletedList = true,
        public bool $numberedList = true,
        public bool $indent = false,
        public bool $outdent = false,
        public bool $blockQuote = false,
        public bool $imageUpload = false,
        public ?string $imageUploadUrl = null,
        public bool $code = false,
        public bool $codeBlock = false,
        public bool $strikethrough = false,
        public bool $underline = false,
        public bool $subscript = false,
        public bool $superscript = false,
        public bool $highlight = false,
        public bool $horizontalLine = false,
        public bool $table = false,
        public bool $tableToolbar = false,
        public bool $mediaEmbed = false,
        public bool $alignment = false,
        public bool $fontSize = false,
        public bool $fontFamily = false,
        public bool $fontColor = false,
        public bool $fontBackgroundColor = false,
        public bool $listStyle = false,
        public bool $todoList = false,
        public bool $mention = false,
        public bool $mergeFields = false,
        public bool $removeFormat = true,
        public bool $undo = true,
        public bool $redo = true,
        public string $language = 'en',
        public array $options = [],
    ) {
        $this->id = $id ?? $name;
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

        if ($this->undo) {
            $toolbar[] = 'undo';
            $toolbar[] = 'redo';
        }

        $toolbar[] = '|';

        if ($this->heading) {
            $toolbar[] = 'heading';
        }

        if ($this->fontSize) {
            $toolbar[] = 'fontSize';
        }

        if ($this->fontFamily) {
            $toolbar[] = 'fontFamily';
        }

        $toolbar[] = '|';

        if ($this->bold) {
            $toolbar[] = 'bold';
        }

        if ($this->italic) {
            $toolbar[] = 'italic';
        }

        if ($this->strikethrough) {
            $toolbar[] = 'strikethrough';
        }

        if ($this->underline) {
            $toolbar[] = 'underline';
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

        if ($this->todoList) {
            $toolbar[] = 'todoList';
        }

        $toolbar[] = '|';

        if ($this->indent) {
            $toolbar[] = 'outdent';
            $toolbar[] = 'indent';
        }

        if ($this->blockQuote) {
            $toolbar[] = 'blockQuote';
        }

        if ($this->alignment) {
            $toolbar[] = 'alignment';
        }

        $toolbar[] = '|';

        if ($this->imageUpload) {
            $toolbar[] = 'imageUpload';
        }

        if ($this->mediaEmbed) {
            $toolbar[] = 'mediaEmbed';
        }

        if ($this->code) {
            $toolbar[] = 'code';
        }

        if ($this->codeBlock) {
            $toolbar[] = 'codeBlock';
        }

        if ($this->horizontalLine) {
            $toolbar[] = 'horizontalLine';
        }

        if ($this->table) {
            $toolbar[] = 'insertTable';
        }

        $toolbar[] = '|';

        if ($this->fontColor) {
            $toolbar[] = 'fontColor';
        }

        if ($this->fontBackgroundColor) {
            $toolbar[] = 'fontBackgroundColor';
        }

        if ($this->highlight) {
            $toolbar[] = 'highlight';
        }

        if ($this->removeFormat) {
            $toolbar[] = 'removeFormat';
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

        if ($this->bold || $this->italic || $this->strikethrough || $this->underline || $this->subscript || $this->superscript) {
            $plugins[] = 'BasicTexts';
        }

        if ($this->link) {
            $plugins[] = 'Link';
            $plugins[] = 'LinkImage';
        }

        if ($this->bulletedList || $this->numberedList || $this->todoList) {
            $plugins[] = 'List';
            $plugins[] = 'ListProperties';
        }

        if ($this->indent || $this->outdent) {
            $plugins[] = 'Indent';
            $plugins[] = 'IndentBlock';
        }

        if ($this->blockQuote) {
            $plugins[] = 'BlockQuote';
        }

        if ($this->imageUpload) {
            $plugins[] = 'Image';
            $plugins[] = 'ImageUpload';
            $plugins[] = 'ImageToolbar';
        }

        if ($this->code) {
            $plugins[] = 'Code';
        }

        if ($this->codeBlock) {
            $plugins[] = 'CodeBlock';
        }

        if ($this->horizontalLine) {
            $plugins[] = 'HorizontalLine';
        }

        if ($this->table) {
            $plugins[] = 'Table';
            $plugins[] = 'TableToolbar';
        }

        if ($this->mediaEmbed) {
            $plugins[] = 'MediaEmbed';
        }

        if ($this->alignment) {
            $plugins[] = 'Alignment';
        }

        if ($this->fontSize || $this->fontFamily || $this->fontColor || $this->fontBackgroundColor) {
            $plugins[] = 'Font';
        }

        if ($this->highlight) {
            $plugins[] = 'Highlight';
        }

        if ($this->removeFormat) {
            $plugins[] = 'RemoveFormat';
        }

        if ($this->undo && $this->redo) {
            $plugins[] = 'Undo';
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
            'placeholder' => $this->placeholder ?? 'Type your content here...',
        ];

        // Image upload configuration
        if ($this->imageUpload && $this->imageUploadUrl) {
            $config['simpleUpload'] = [
                'uploadUrl' => $this->imageUploadUrl,
            ];
        }

        // Merge with custom options
        $config = array_merge($config, $this->options);

        return json_encode($config, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    public function render(): View
    {
        return view('oneui::components.c-k-editor5');
    }
}

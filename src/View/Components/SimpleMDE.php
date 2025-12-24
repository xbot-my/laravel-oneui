<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * SimpleMDE Component - SimpleMDE Markdown Editor wrapper
 *
 * Creates a simple and beautiful Markdown editor
 *
 * Usage:
 * <x-oneui::simple-mde name="content" />
 * <x-oneui::simple-mde name="description" :options="['spellChecker' => false]" />
 */
class SimpleMDE extends Component
{
    public function __construct(
        public string $name,
        public ?string $id = null,
        public ?string $label = null,
        public ?string $value = null,
        public ?string $placeholder = null,
        public bool $autofocus = false,
        public bool $spellChecker = true,
        public string $initialStatus = 'preview', // pristine, changed, sync
        public bool = $autosave = false,
        public ?string $autosaveUniqueId = null,
        public int $autosaveDelay = 10000,
        public bool $forceSync = false,
        public string $indentWithTabs = false,
        public int $tabSize = 4,
        public bool = $lineWrapping = true,
        public string $theme = 'easymde', // easymde, dark
        public string $direction = 'ltr', // ltr, rtl
        public array $toolbar = [], // Custom toolbar buttons
        public bool $hideIcons = [], // Icons to hide
        public bool $showIcons = [], // Icons to show
        public string $status = ['autosave', 'lines', 'words', 'cursor'],
        public array $options = [],
        public string $minHeight = '300px',
        public bool = $shortcuts = true,
    ) {
        $this->id = $id ?? $name;
    }

    /**
     * Get default toolbar configuration
     */
    public function getToolbar(): string
    {
        if (!empty($this->toolbar)) {
            return json_encode($this->toolbar);
        }

        // Default toolbar
        return json_encode([
            ['name' => 'bold', 'action' => 'toggleBold', 'className' => 'fa fa-bold', 'title' => 'Bold'],
            ['name' => 'italic', 'action' => 'toggleItalic', 'className' => 'fa fa-italic', 'title' => 'Italic'],
            ['name' => 'heading', 'action' => 'toggleHeadingSmaller', 'className' => 'fa fa-header', 'title' => 'Heading'],
            '|',
            ['name' => 'quote', 'action' => 'toggleBlockquote', 'className' => 'fa fa-quote-left', 'title' => 'Quote'],
            ['name' => 'unordered-list', 'action' => 'toggleUnorderedList', 'className' => 'fa fa-list-ul', 'title' => 'Generic List'],
            ['name' => 'ordered-list', 'action' => 'toggleOrderedList', 'className' => 'fa fa-list-ol', 'title' => 'Numbered List'],
            '|',
            ['name' => 'link', 'action' => 'drawLink', 'className' => 'fa fa-link', 'title' => 'Create Link'],
            ['name' => 'image', 'action' => 'drawImage', 'className' => 'fa fa-picture-o', 'title' => 'Insert Image'],
            '|',
            ['name' => 'preview', 'action' => 'togglePreview', 'className' => 'fa fa-eye no-disable', 'title' => 'Toggle Preview'],
            ['name' => 'side-by-side', 'action' => 'toggleSideBySide', 'className' => 'fa fa-columns no-disable no-mobile', 'title' => 'Toggle Side by Side'],
            ['name' => 'fullscreen', 'action' => 'toggleFullScreen', 'className' => 'fa fa-arrows-alt no-disable no-mobile', 'title' => 'Toggle Fullscreen'],
            '|',
            ['name' => 'guide', 'action' => 'https://www.markdownguide.org/basic-syntax/', 'className' => 'fa fa-question-circle', 'title' => 'Markdown Guide'],
        ]);
    }

    /**
     * Get SimpleMDE configuration as JavaScript object
     */
    public function editorOptions(): string
    {
        $options = [
            'element' => $this->id,
            'spellChecker' => $this->spellChecker,
            'initialStatus' => $this->initialStatus,
            'autofocus' => $this->autofocus,
            'placeholder' => $this->placeholder ?? 'Write markdown here...',
            'lineWrapping' => $this->lineWrapping,
            'indentWithTabs' => $this->indentWithTabs,
            'tabSize' => $this->tabSize,
            'theme' => $this->theme,
            'direction' => $this->direction,
            'minHeight' => $this->minHeight,
            'shortcuts' => $this->shortcuts,
        ];

        if ($this->autosave && $this->autosaveUniqueId) {
            $options['autosave'] = [
                'enabled' => true,
                'uniqueId' => $this->autosaveUniqueId,
                'delay' => $this->autosaveDelay,
            ];
        }

        if (!empty($this->toolbar)) {
            $options['toolbar'] = $this->toolbar;
        }

        if (!empty($this->hideIcons)) {
            $options['hideIcons'] = $this->hideIcons;
        }

        if (!empty($this->showIcons)) {
            $options['showIcons'] = $this->showIcons;
        }

        if (!empty($this->status)) {
            $options['status'] = $this->status;
        }

        if ($this->forceSync) {
            $options['forceSync'] = true;
        }

        // Merge with custom options
        $options = array_merge($options, $this->options);

        return json_encode($options, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    public function render(): View
    {
        return view('oneui::components.simple-mde');
    }
}

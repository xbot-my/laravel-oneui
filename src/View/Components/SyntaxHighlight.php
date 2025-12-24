<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * SyntaxHighlight Component - highlight.js wrapper
 *
 * Creates syntax-highlighted code blocks
 *
 * Usage:
 * <x-oneui::syntax-highlight language="php">echo "Hello World";</x-oneui::syntax-highlight>
 * <x-oneui::syntax-highlight language="javascript" :code="$jsCode" />
 */
class SyntaxHighlight extends Component
{
    public function __construct(
        public string $language = 'auto',
        public ?string $code = null,
        public string $theme = 'atom-one-dark', // atom-one-dark, atom-one-light, github, etc.
        public bool $showLineNumbers = true,
        public int $startFrom = 1,
        public bool $wrapLines = false,
        public bool $autoDetect = true,
        public array $options = [],
    ) {
    }

    /**
     * Get the highlighted code
     */
    public function getCode(): string
    {
        return $this->code ?? $this->slot ?? '';
    }

    /**
     * Get CSS classes for the code block
     */
    public function getCodeClasses(): string
    {
        $classes = ['hljs'];

        if ($this->language !== 'auto') {
            $classes[] = 'language-' . $this->language;
        }

        return implode(' ', $classes);
    }

    public function render(): View
    {
        return view('oneui::components.syntax-highlight');
    }
}

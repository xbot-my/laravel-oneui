<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * TagsInput Component - Tag input field (based on Select2)
 *
 * Usage:
 * <x-oneui::tags-input name="tags" :options="['php', 'laravel', 'vue']" />
 * <x-oneui::tags-input name="categories" :value="['news', 'tech']" placeholder="Select tags..." />
 */
class TagsInput extends Component
{
    public function __construct(
        public string $name,
        public ?string $id = null,
        public ?string $label = null,
        public array $value = [],
        public array $options = [],
        public ?string $placeholder = null,
        public bool $allowCustom = false,
        public int $maxTags = 0,
        public bool $disabled = false,
        public array $select2Options = [],
    ) {
        $this->id = $id ?? 'tags-' . $name;
        $this->placeholder = $placeholder ?? 'Select tags...';
    }

    /**
     * Get Select2 configuration as JavaScript object
     */
    public function select2Config(): string
    {
        $config = [
            'tags' => $this->allowCustom,
            'multiple' => true,
            'placeholder' => $this->placeholder,
            'maximumSelectionLength' => $this->maxTags > 0 ? $this->maxTags : -1,
            'closeOnSelect' => false,
        ];

        // Add data options if provided
        if (!empty($this->options)) {
            $config['data'] = array_map(function($value, $key) {
                return ['id' => is_int($key) ? $value : $key, 'text' => $value];
            }, $this->options, array_keys($this->options));
        }

        // Merge with custom Select2 options
        $config = array_merge($config, $this->select2Options);

        return json_encode($config, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    public function render(): View
    {
        return view('oneui::components.tags-input');
    }
}

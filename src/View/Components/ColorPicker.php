<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * ColorPicker Component - HTML5 Color input
 *
 * Usage:
 * <x-oneui::color-picker name="color" />
 * <x-oneui::color-picker name="background" value="#3b82f6" label="Background Color" />
 */
class ColorPicker extends Component
{
    public function __construct(
        public string $name,
        public ?string $id = null,
        public ?string $label = null,
        public ?string $value = null,
        public ?string $default = '#000000',
        public bool $inline = false,
        public bool $showPreview = true,
        public bool $showHexInput = true,
        public array $presets = [],
        public bool $disabled = false,
    ) {
        $this->id = $id ?? 'color-' . $name;
        $this->value = $value ?? $default;
    }

    /**
     * Get common presets if none provided
     */
    public function getPresets(): array
    {
        if (empty($this->presets)) {
            return [
                '#000000', '#ffffff', '#ef4444', '#f97316',
                '#f59e0b', '#84cc16', '#10b981', '#06b6d4',
                '#0ea5e9', '#3b82f6', '#6366f1', '#8b5cf6',
                '#a855f7', '#d946ef', '#ec4899', '#f43f5e',
            ];
        }

        return $this->presets;
    }

    public function render(): View
    {
        return view('oneui::components.color-picker');
    }
}

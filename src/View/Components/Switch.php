<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Switch Component - Toggle switch input
 *
 * Usage:
 * <x-oneui::switch name="active" label="Active Status" />
 * <x-oneui::switch name="notifications" label="Enable Notifications" :checked="true" />
 * <x-oneui::switch name="mode" label="Dark Mode" description="Enable dark theme" />
 */
class Switch extends Component
{
    public function __construct(
        public string $name,
        public ?string $id = null,
        public ?string $label = null,
        public ?string $description = null,
        public $value = '1',
        public bool $checked = false,
        public bool $disabled = false,
        public string $size = '', // 'sm', 'lg'
        public string $color = '', // 'primary', 'success', 'danger', 'warning', 'info'
    ) {
        $this->id = $id ?? $name;
    }

    public function wrapperClasses(): string
    {
        $classes = ['form-check', 'form-switch'];

        if ($this->size === 'sm') {
            $classes[] = 'form-switch-sm';
        } elseif ($this->size === 'lg') {
            $classes[] = 'form-switch-lg';
        }

        return implode(' ', $classes);
    }

    public function inputClasses(): string
    {
        $classes = ['form-check-input'];

        if ($this->color) {
            $classes[] = "form-check-input-{$this->color}";
        }

        return implode(' ', $classes);
    }

    public function render(): View
    {
        return view('oneui::components.switch');
    }
}

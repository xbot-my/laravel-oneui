<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

/**
 * StatWidget Component
 *
 * Usage:
 * <x-oneui::stat-widget value="$12,682" label="Earnings" icon="fa fa-arrow-up" />
 * <x-oneui::stat-widget value="3,585" label="Users" icon="far fa-user-circle" color="primary" />
 */
class StatWidget extends Component
{
    public function __construct(
        public string|int|float $value,
        public string $label,
        public ?string $icon = null,
        public ?string $color = null,
        public string $iconPosition = 'left',
        public ?string $href = null,
        public bool $link = true,
    ) {
    }

    public function blockClasses(): string
    {
        $classes = ['block', 'block-rounded'];

        if ($this->link) {
            $classes[] = $this->color ? 'block-link-shadow' : 'block-link-pop';
        }

        if ($this->color) {
            $classes[] = 'bg-' . $this->color;
        }

        return implode(' ', $classes);
    }

    public function textClasses(): string
    {
        return $this->color ? 'text-white' : '';
    }

    public function iconClasses(): string
    {
        return $this->color ? 'text-white-50' : 'text-muted';
    }

    public function tag(): string
    {
        return $this->href ? 'a' : 'div';
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('oneui::components.stat-widget');
    }
}

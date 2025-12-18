<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

/**
 * Avatar 头像组件
 *
 * Usage:
 * <x-oneui::avatar src="/path/to/image.jpg" />
 * <x-oneui::avatar src="/path/to/image.jpg" size="lg" />
 * <x-oneui::avatar initials="JD" />
 */
class Avatar extends Component
{
    public function __construct(
        public ?string $src = null,
        public ?string $initials = null,
        public string $size = '',
        public bool $rounded = true,
        public ?string $status = null,
        public ?string $alt = null,
    ) {
    }

    public function avatarClasses(): string
    {
        $classes = ['img-avatar'];

        if ($this->size) {
            $classes[] = 'img-avatar' . $this->size;
        }

        return implode(' ', $classes);
    }

    public function statusClasses(): string
    {
        return match ($this->status) {
            'online' => 'bg-success',
            'offline' => 'bg-danger',
            'away' => 'bg-warning',
            'busy' => 'bg-danger',
            default => 'bg-secondary',
        };
    }

    public function render()
    {
        return view('oneui::components.avatar');
    }
}

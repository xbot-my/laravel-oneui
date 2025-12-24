<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * UserCard Component - User profile card widget
 *
 * Usage:
 * <x-oneui::user-card
 *     name="John Doe"
 *     email="john@example.com"
 *     avatar="path/to/avatar.jpg"
 *     role="Administrator"
 * />
 * <x-oneui::user-card :user="$user" />
 */
class UserCard extends Component
{
    public function __construct(
        public ?string $name = null,
        public ?string $email = null,
        public ?string $avatar = null,
        public ?string $role = null,
        public ?string $status = null, // active, inactive, pending
        public ?string $phone = null,
        public ?string $location = null,
        public ?string $joined = null,
        public bool $showEmail = true,
        public bool $showRole = true,
        public bool $showStatus = false,
        public bool $showMeta = false,
        public string $layout = 'vertical', // vertical, horizontal, compact
        public string $size = 'md', // sm, md, lg
        public ?string $profileUrl = null,
        public bool $showActions = false,
        public ?object $user = null, // Alternative: pass user object
    ) {
        // If user object is provided, extract properties
        if ($user && !$name) {
            $this->name = $user->name ?? $user->username ?? null;
            $this->email = $user->email ?? null;
            $this->avatar = $user->avatar ?? $user->avatar_url ?? $user->profile_image ?? null;
            $this->role = $user->role?->name ?? $user->role_name ?? $user->role ?? null;
            $this->status = $this->status ?? $user->status ?? null;
            $this->phone = $this->phone ?? $user->phone ?? $user->phone_number ?? null;
            $this->location = $this->location ?? $user->location ?? $user->city ?? null;
            $this->joined = $this->joined ?? $user->created_at?->format('M Y') ?? $user->joined_at ?? null;
        }

        // Default avatar placeholder
        if (!$this->avatar) {
            $this->avatar = 'https://ui-avatars.com/api/?name=' . urlencode($this->name ?: 'User') . '&background=random';
        }
    }

    /**
     * Get container classes
     */
    public function containerClasses(): string
    {
        $classes = ['block', 'block-rounded'];

        if ($this->layout === 'compact') {
            $classes[] = 'block-mode-loading';
        }

        return implode(' ', $classes);
    }

    /**
     * Get status badge color
     */
    public function statusColor(): string
    {
        return match ($this->status) {
            'active', 'online', 'verified' => 'success',
            'inactive', 'offline' => 'secondary',
            'pending', 'waiting' => 'warning',
            'banned', 'blocked', 'suspended' => 'danger',
            default => 'primary',
        };
    }

    /**
     * Get avatar size
     */
    public function avatarSize(): string
    {
        return match ($this->size) {
            'sm' => '48px',
            'lg' => '96px',
            default => '64px',
        };
    }

    public function render(): View
    {
        return view('oneui::components.user-card');
    }
}

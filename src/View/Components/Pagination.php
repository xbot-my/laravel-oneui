<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;

/**
 * Pagination Component
 *
 * Bootstrap 5 styled pagination for Laravel LengthAwarePaginator.
 *
 * Usage:
 * <x-oneui::pagination :paginator="$users" />
 * <x-oneui::pagination :paginator="$items" size="sm" />
 * <x-oneui::pagination :paginator="$posts" size="lg" />
 */
class Pagination extends Component
{
    public function __construct(
        public LengthAwarePaginator $paginator,
        public string $size = '',
    ) {
    }

    public function sizeClass(): string
    {
        return match ($this->size) {
            'sm' => 'pagination-sm',
            'lg' => 'pagination-lg',
            default => '',
        };
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('oneui::components.pagination');
    }
}

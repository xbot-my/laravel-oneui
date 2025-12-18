<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

/**
 * StatGroup 多列统计组件
 *
 * Usage:
 * <x-oneui::stat-group :items="[
 *     ['value' => 85, 'label' => 'Projects', 'icon' => 'fa fa-briefcase', 'color' => 'primary'],
 *     ['value' => 459, 'label' => 'Clients', 'icon' => 'fa fa-users', 'color' => 'success'],
 *     ['value' => 258, 'label' => 'Orders', 'icon' => 'fa fa-shopping-cart', 'color' => 'danger'],
 * ]" />
 */
class StatGroup extends Component
{
    public function __construct(
        public array $items = [],
        public ?string $href = null,
    ) {
    }

    public function render()
    {
        return view('oneui::components.stat-group');
    }
}

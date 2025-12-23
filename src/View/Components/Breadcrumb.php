<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;
use XBot\OneUI\Support\DataAdapter;
use XBot\OneUI\Support\ItemCollection;

/**
 * Breadcrumb 组件
 *
 * Usage:
 * <x-oneui::breadcrumb :items="[
 *     ['label' => 'Home', 'url' => '/'],
 *     ['label' => 'Products', 'url' => '/products'],
 *     ['label' => 'Details'],
 * ]" />
 */
class Breadcrumb extends Component
{
    public ItemCollection $items;

    public function __construct(
        public array $data = [],
        public bool $alt = true,
    ) {
        $adapter = new DataAdapter($this->data);
        $this->items = $adapter->toItems();
    }

    public function breadcrumbClasses(): string
    {
        $classes = ['breadcrumb'];

        if ($this->alt) {
            $classes[] = 'breadcrumb-alt';
        }

        return implode(' ', $classes);
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('oneui::components.breadcrumb');
    }
}

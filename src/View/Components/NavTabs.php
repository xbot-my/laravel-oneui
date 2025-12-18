<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;
use XBot\OneUI\Support\DataAdapter;
use XBot\OneUI\Support\ItemCollection;

/**
 * NavTabs 组件
 *
 * Usage:
 * <x-oneui::nav-tabs :items="[
 *     ['id' => 'tab1', 'label' => 'Tab 1', 'active' => true],
 *     ['id' => 'tab2', 'label' => 'Tab 2'],
 * ]" />
 */
class NavTabs extends Component
{
    public ItemCollection $items;

    public function __construct(
        public array $data = [],
        public bool $block = true,
        public bool $justified = false,
        public bool $alt = false,
    ) {
        $adapter = new DataAdapter($this->data);
        $this->items = $adapter->toItems();
    }

    public function navClasses(): string
    {
        $classes = ['nav', 'nav-tabs'];

        if ($this->block) {
            $classes[] = 'nav-tabs-block';
        }

        if ($this->alt) {
            $classes[] = 'nav-tabs-alt';
        }

        if ($this->justified) {
            $classes[] = 'nav-justified';
        }

        return implode(' ', $classes);
    }

    public function render()
    {
        return view('oneui::components.nav-tabs');
    }
}

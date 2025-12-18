<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;
use XBot\OneUI\Support\DataAdapter;
use XBot\OneUI\Support\DataItem;
use XBot\OneUI\Support\ItemCollection;

/**
 * SidebarMenu 组件
 *
 * Usage:
 * <x-oneui::sidebar-menu :items="[
 *     ['label' => 'Dashboard', 'route' => 'dashboard', 'icon' => 'si si-speedometer', 'order' => 1],
 *     ['label' => 'Users', 'route' => 'users.index', 'icon' => 'si si-users', 'badge' => '5'],
 *     ['label' => 'Google', 'url' => 'https://google.com', 'target' => '_blank'],
 *     ['label' => 'Help', 'modal' => '#helpModal', 'icon' => 'si si-question'],
 *     ['label' => 'Settings', 'icon' => 'si si-settings', 'children' => [
 *         ['label' => 'Profile', 'route' => 'settings.profile'],
 *         ['label' => 'Security', 'route' => 'settings.security'],
 *     ]],
 * ]" />
 */
class SidebarMenu extends Component
{
    public ItemCollection $items;

    public function __construct(
        public array $data = [],
        public bool $sortByOrder = true,
    ) {
        $this->processItems();
    }

    protected function processItems(): void
    {
        $items = $this->data;

        // 排序
        if ($this->sortByOrder) {
            usort($items, fn($a, $b) => ($a['order'] ?? 999) <=> ($b['order'] ?? 999));
        }

        $adapter = new DataAdapter($items);
        $this->items = $adapter->toItems();
    }

    /**
     * 生成菜单项 URL
     */
    public function getItemUrl(DataItem $item): string
    {
        // 优先使用 route
        if ($route = $item->getValue('route')) {
            $params = $item->getValue('routeParams', []);
            try {
                return route($route, $params);
            } catch (\Exception $e) {
                return '#';
            }
        }

        // 使用 url
        if ($url = $item->getValue('url')) {
            return $url;
        }

        // Modal 或其他
        return '#';
    }

    /**
     * 获取链接属性
     */
    public function getLinkAttributes(DataItem $item): string
    {
        $attrs = [];

        // 新标签页打开
        if ($target = $item->getValue('target')) {
            $attrs[] = 'target="' . e($target) . '"';
            if ($target === '_blank') {
                $attrs[] = 'rel="noopener noreferrer"';
            }
        }

        // Modal 弹出
        if ($modal = $item->getValue('modal')) {
            $attrs[] = 'data-bs-toggle="modal"';
            $attrs[] = 'data-bs-target="' . e($modal) . '"';
        }

        return implode(' ', $attrs);
    }

    /**
     * 获取子菜单项 URL
     */
    public function getChildUrl(array $child): string
    {
        if (isset($child['route'])) {
            $params = $child['routeParams'] ?? [];
            try {
                return route($child['route'], $params);
            } catch (\Exception $e) {
                return '#';
            }
        }

        return $child['url'] ?? '#';
    }

    /**
     * 获取子菜单链接属性
     */
    public function getChildLinkAttributes(array $child): string
    {
        $attrs = [];

        if (isset($child['target'])) {
            $attrs[] = 'target="' . e($child['target']) . '"';
            if ($child['target'] === '_blank') {
                $attrs[] = 'rel="noopener noreferrer"';
            }
        }

        if (isset($child['modal'])) {
            $attrs[] = 'data-bs-toggle="modal"';
            $attrs[] = 'data-bs-target="' . e($child['modal']) . '"';
        }

        return implode(' ', $attrs);
    }

    public function render()
    {
        return view('oneui::components.sidebar-menu');
    }
}

<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Support\Facades\Request;
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
        $currentUrl = Request::url();
        $currentRoute = Request::route()?->getName();

        // 自动检测 active 状态
        $items = $this->markActiveItems($items, $currentUrl, $currentRoute);

        // 排序
        if ($this->sortByOrder) {
            usort($items, fn($a, $b) => ($a['order'] ?? 999) <=> ($b['order'] ?? 999));
        }

        $adapter = new DataAdapter($items);
        $this->items = $adapter->toItems();
    }

    /**
     * 标记当前活动的菜单项
     */
    protected function markActiveItems(array $items, string $currentUrl, ?string $currentRoute): array
    {
        foreach ($items as &$item) {
            // 检查当前项是否激活
            $isActive = $this->isItemActive($item, $currentUrl, $currentRoute);
            if ($isActive) {
                $item['active'] = true;
            }

            // 递归检查子项
            if (isset($item['children']) && is_array($item['children'])) {
                $item['children'] = $this->markActiveItems($item['children'], $currentUrl, $currentRoute);

                // 如果有子项激活，父项也标记为 open
                foreach ($item['children'] as $child) {
                    if (isset($child['active']) && $child['active']) {
                        $item['open'] = true;
                        break;
                    }
                }
            }
        }

        return $items;
    }

    /**
     * 检查菜单项是否是当前活动页面
     */
    protected function isItemActive(array $item, string $currentUrl, ?string $currentRoute): bool
    {
        // 如果已经手动设置了 active，使用它
        if (isset($item['active']) && $item['active'] === true) {
            return true;
        }

        // 检查路由名称匹配
        if (isset($item['route']) && $currentRoute) {
            if ($item['route'] === $currentRoute) {
                return true;
            }
        }

        // 检查 URL 匹配
        if (isset($item['url'])) {
            if ($item['url'] === $currentUrl) {
                return true;
            }
            // 检查是否是当前路径的前缀（用于匹配 /oneui/examples 匹配 /oneui/examples/forms）
            if (str_starts_with($currentUrl, rtrim($item['url'], '/'))) {
                return true;
            }
        }

        return false;
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

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('oneui::components.sidebar-menu');
    }
}

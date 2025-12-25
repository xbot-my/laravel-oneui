@php
    $menuItems = [
        [
            'label' => '基础组件',
            'icon' => 'fa fa-th-large',
            'order' => 1,
            'children' => [
                ['label' => '布局', 'route' => 'oneui.examples.layout'],
                ['label' => '表单', 'route' => 'oneui.examples.forms'],
                ['label' => '高级表单', 'route' => 'oneui.examples.forms-advanced'],
                ['label' => '表格', 'route' => 'oneui.examples.tables'],
            ],
        ],
        [
            'label' => '数据展示',
            'icon' => 'fa fa-bar-chart',
            'order' => 2,
            'children' => [
                ['label' => '卡片', 'route' => 'oneui.examples.cards'],
                ['label' => '统计', 'route' => 'oneui.examples.metrics'],
                ['label' => '图表', 'route' => 'oneui.examples.charts'],
                ['label' => '列表', 'route' => 'oneui.examples.lists'],
            ],
        ],
        [
            'label' => '导航与交互',
            'icon' => 'fa fa-sitemap',
            'order' => 3,
            'children' => [
                ['label' => '导航', 'route' => 'oneui.examples.navigation'],
                ['label' => '弹窗', 'route' => 'oneui.examples.modals'],
            ],
        ],
        [
            'label' => '反馈与通知',
            'icon' => 'fa fa-bell',
            'order' => 4,
            'children' => [
                ['label' => '警告', 'route' => 'oneui.examples.alerts'],
                ['label' => '通知', 'route' => 'oneui.examples.notifications'],
            ],
        ],
        [
            'label' => '其他组件',
            'icon' => 'fa fa-puzzle-piece',
            'order' => 5,
            'children' => [
                ['label' => '日历', 'route' => 'oneui.examples.calendar'],
                ['label' => '编辑器', 'route' => 'oneui.examples.editors'],
                ['label' => '上传', 'route' => 'oneui.examples.upload'],
                ['label' => '媒体', 'route' => 'oneui.examples.media'],
                ['label' => '工具', 'route' => 'oneui.examples.utilities'],
            ],
        ],
        [
            'label' => '首页',
            'route' => 'oneui.examples.index',
            'icon' => 'fa fa-home',
            'order' => 99,
        ],
    ];
@endphp

<x-oneui::sidebar-menu :data="$menuItems" />

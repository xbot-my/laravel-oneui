@php
    $menuItems = [
        [
            'label' => 'Basic Components',
            'icon' => 'fa fa-th-large',
            'order' => 1,
            'children' => [
                ['label' => 'Layout', 'route' => 'oneui.examples.layout'],
                ['label' => 'Forms', 'route' => 'oneui.examples.forms'],
                ['label' => 'Advanced Forms', 'route' => 'oneui.examples.forms-advanced'],
                ['label' => 'Tables', 'route' => 'oneui.examples.tables'],
            ],
        ],
        [
            'label' => 'Data Display',
            'icon' => 'fa fa-bar-chart',
            'order' => 2,
            'children' => [
                ['label' => 'Cards', 'route' => 'oneui.examples.cards'],
                ['label' => 'Metrics', 'route' => 'oneui.examples.metrics'],
                ['label' => 'Charts', 'route' => 'oneui.examples.charts'],
                ['label' => 'Lists', 'route' => 'oneui.examples.lists'],
            ],
        ],
        [
            'label' => 'Navigation & Interaction',
            'icon' => 'fa fa-sitemap',
            'order' => 3,
            'children' => [
                ['label' => 'Navigation', 'route' => 'oneui.examples.navigation'],
                ['label' => 'Modals', 'route' => 'oneui.examples.modals'],
            ],
        ],
        [
            'label' => 'Feedback & Notifications',
            'icon' => 'fa fa-bell',
            'order' => 4,
            'children' => [
                ['label' => 'Alerts', 'route' => 'oneui.examples.alerts'],
                ['label' => 'Notifications', 'route' => 'oneui.examples.notifications'],
            ],
        ],
        [
            'label' => 'Other Components',
            'icon' => 'fa fa-puzzle-piece',
            'order' => 5,
            'children' => [
                ['label' => 'Calendar', 'route' => 'oneui.examples.calendar'],
                ['label' => 'Editors', 'route' => 'oneui.examples.editors'],
                ['label' => 'Upload', 'route' => 'oneui.examples.upload'],
                ['label' => 'Media', 'route' => 'oneui.examples.media'],
                ['label' => 'Utilities', 'route' => 'oneui.examples.utilities'],
            ],
        ],
        [
            'label' => 'Home',
            'route' => 'oneui.examples.index',
            'icon' => 'fa fa-home',
            'order' => 99,
        ],
    ];
@endphp

<x-oneui::sidebar-menu :data="$menuItems" />

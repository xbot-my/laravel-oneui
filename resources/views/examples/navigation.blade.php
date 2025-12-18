<x-oneui::page>
    <x-slot:title>Navigation Examples</x-slot>
    <x-slot:head>
        <link rel="stylesheet" href="{{ asset('vendor/oneui/js/plugins/highlightjs/styles/atom-one-dark.css') }}">
    </x-slot>

    <x-slot:sidebar>
        @include('oneui.partials.sidebar')
    </x-slot>

    <x-slot:content>
        <div class="content">
            <h2 class="content-heading">Breadcrumb</h2>

            @php
            $breadcrumbCode = <<<'CODE'
<x-oneui::breadcrumb :data="[
    ['label' => 'Home', 'url' => '/'],
    ['label' => 'Products', 'url' => '/products'],
    ['label' => 'Details'],
]" />
CODE;
            @endphp
            <x-oneui::code-example title="Basic Breadcrumb" :code="$breadcrumbCode">
                <x-oneui::breadcrumb :data="[
                    ['label' => 'Home', 'url' => '/'],
                    ['label' => 'Products', 'url' => '/products'],
                    ['label' => 'Details'],
                ]" />
            </x-oneui::code-example>

            <h2 class="content-heading">Nav Tabs</h2>

            @php
            $tabsCode = <<<'CODE'
<x-oneui::nav-tabs :data="[
    ['id' => 'home', 'label' => 'Home', 'icon' => 'fa fa-home', 'active' => true],
    ['id' => 'profile', 'label' => 'Profile', 'icon' => 'fa fa-user'],
    ['id' => 'settings', 'label' => 'Settings', 'icon' => 'fa fa-cog'],
]" />
CODE;
            @endphp
            <x-oneui::code-example title="Block Tabs with Icons" :code="$tabsCode">
                <x-oneui::nav-tabs :data="[
                    ['id' => 'home', 'label' => 'Home', 'icon' => 'fa fa-home', 'active' => true],
                    ['id' => 'profile', 'label' => 'Profile', 'icon' => 'fa fa-user'],
                    ['id' => 'settings', 'label' => 'Settings', 'icon' => 'fa fa-cog'],
                ]" />
            </x-oneui::code-example>

            <h2 class="content-heading">Sidebar Menu</h2>

            @php
            $menuCode = <<<'CODE'
<x-oneui::sidebar-menu :data="[
    ['label' => 'Dashboard', 'url' => '#', 'icon' => 'si si-speedometer', 'active' => true],
    ['label' => 'Users', 'url' => '#', 'icon' => 'si si-users', 'badge' => '5'],
    ['label' => 'Settings', 'icon' => 'si si-settings', 'children' => [
        ['label' => 'Profile', 'url' => '#'],
        ['label' => 'Security', 'url' => '#'],
    ]],
]" />
CODE;
            @endphp
            <x-oneui::code-example title="Sidebar Menu with Submenu" :code="$menuCode">
                <div style="max-width: 280px;">
                    <x-oneui::sidebar-menu :data="[
                        ['label' => 'Dashboard', 'url' => '#', 'icon' => 'si si-speedometer', 'active' => true],
                        ['label' => 'Users', 'url' => '#', 'icon' => 'si si-users', 'badge' => '5'],
                        ['label' => 'Settings', 'icon' => 'si si-settings', 'children' => [
                            ['label' => 'Profile', 'url' => '#'],
                            ['label' => 'Security', 'url' => '#'],
                        ]],
                    ]" />
                </div>
            </x-oneui::code-example>
        </div>
    </x-slot>

    <x-slot:scripts>
        <script src="{{ asset('vendor/oneui/js/plugins/highlightjs/highlight.pack.min.js') }}"></script>
        <script>One.helpersOnLoad('js-highlightjs');</script>
    </x-slot>
</x-oneui::page>

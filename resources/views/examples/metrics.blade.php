<x-oneui::page>
    <x-slot:title>Metric Components</x-slot:title>
    <x-slot:head>
        <link rel="stylesheet" href="{{ asset('vendor/oneui/js/plugins/highlightjs/styles/atom-one-dark.css') }}">
    </x-slot>

    <x-slot:sidebar>
        @include('oneui.partials.sidebar')
    </x-slot:sidebar>

    <x-slot:content>
        <div class="content">
            <h2 class="content-heading">Metrics & Statistics</h2>

            {{-- StatWidget --}}
            @php
            $statWidgetCode = '<x-oneui::stat-widget
    title="Total Users"
    value="1,234"
    icon="fa-users"
    color="primary"
    trend="+12%"
    trend-direction="up"
/>';
            @endphp
            <x-oneui::code-example title="Stat Widget" :code="$statWidgetCode">
                <div class="row">
                    <div class="col-md-3">
                        <x-oneui::stat-widget
                            title="Total Users"
                            value="1,234"
                            icon="fa-users"
                            color="primary"
                            trend="+12%"
                            trend-direction="up"
                        />
                    </div>
                    <div class="col-md-3">
                        <x-oneui::stat-widget
                            title="Revenue"
                            value="$45,678"
                            icon="fa-dollar-sign"
                            color="success"
                            trend="+23%"
                            trend-direction="up"
                        />
                    </div>
                    <div class="col-md-3">
                        <x-oneui::stat-widget
                            title="Orders"
                            value="856"
                            icon="fa-shopping-cart"
                            color="warning"
                            trend="-5%"
                            trend-direction="down"
                        />
                    </div>
                    <div class="col-md-3">
                        <x-oneui::stat-widget
                            title="Conversion"
                            value="3.2%"
                            icon="fa-chart-line"
                            color="info"
                        />
                    </div>
                </div>
            </x-oneui::code-example>

            {{-- StatGroup --}}
            @php
            $statGroupCode = '<x-oneui::stat-group title="Overview">
    <x-oneui::stat-widget title="Users" value="1,234" />
    <x-oneui::stat-widget title="Sales" value="$5,678" />
    <x-oneui::stat-widget title="Orders" value="89" />
</x-oneui::stat-group>';
            @endphp
            <x-oneui::code-example title="Stat Group" :code="$statGroupCode">
                <x-oneui::stat-group title="Weekly Overview">
                    <x-oneui::stat-widget title="Users" value="1,234" color="primary" />
                    <x-oneui::stat-widget title="Sales" value="$5,678" color="success" />
                    <x-oneui::stat-widget title="Orders" value="89" color="warning" />
                </x-oneui::stat-group>
            </x-oneui::code-example>

            {{-- Tiles --}}
            @php
            $tilesCode = '<x-oneui::tiles
    title="Projects"
    value="24"
    color="modern"
    size="md"
/>';
            @endphp
            <x-oneui::code-example title="Tiles" :code="$tilesCode">
                <div class="row">
                    <div class="col-6 col-md-3">
                        <x-oneui::tiles title="Accounts" value="15" color="modern" />
                    </div>
                    <div class="col-6 col-md-3">
                        <x-oneui::tiles title="Users" value="98" color="amethyst" />
                    </div>
                    <div class="col-6 col-md-3">
                        <x-oneui::tiles title="Sales" value="$12K" color="city" />
                    </div>
                    <div class="col-6 col-md-3">
                        <x-oneui::tiles title="Orders" value="256" color="smooth" />
                    </div>
                </div>
            </x-oneui::code-example>
        </div>
    </x-slot:content>

    <x-slot:scripts>
        <script src="{{ asset('vendor/oneui/js/plugins/highlightjs/highlight.pack.min.js') }}"></script>
        <script>One.helpersOnLoad('js-highlightjs');</script>
    </x-slot:scripts>
</x-oneui::page>

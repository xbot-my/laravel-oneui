<x-oneui::page>
    <x-slot:title>Alert Examples</x-slot>
    <x-slot:head>
        <link rel="stylesheet" href="{{ asset('vendor/oneui/js/plugins/highlightjs/styles/atom-one-dark.css') }}">
    </x-slot>

    <x-slot:sidebar>
        @include('oneui.partials.sidebar')
    </x-slot>

    <x-slot:content>
        <div class="content">
            <h2 class="content-heading">Alerts</h2>

            {{-- Simple Alerts --}}
            @php
            $simpleCode = '<x-oneui::alert type="primary">Primary alert message</x-oneui::alert>
<x-oneui::alert type="secondary">Secondary alert message</x-oneui::alert>
<x-oneui::alert type="success">Success alert message</x-oneui::alert>
<x-oneui::alert type="info">Info alert message</x-oneui::alert>
<x-oneui::alert type="warning">Warning alert message</x-oneui::alert>
<x-oneui::alert type="danger">Danger alert message</x-oneui::alert>';
            @endphp
            <x-oneui::code-example title="Simple Alerts" :code="$simpleCode">
                <x-oneui::alert type="primary">Primary alert message</x-oneui::alert>
                <x-oneui::alert type="secondary">Secondary alert message</x-oneui::alert>
                <x-oneui::alert type="success">Success alert message</x-oneui::alert>
                <x-oneui::alert type="info">Info alert message</x-oneui::alert>
                <x-oneui::alert type="warning">Warning alert message</x-oneui::alert>
                <x-oneui::alert type="danger">Danger alert message</x-oneui::alert>
            </x-oneui::code-example>

            {{-- Dismissible Alerts --}}
            @php
            $dismissCode = '<x-oneui::alert type="success" :dismissible="true">Success! You can dismiss me.</x-oneui::alert>
<x-oneui::alert type="danger" :dismissible="true">Error! Click X to close.</x-oneui::alert>';
            @endphp
            <x-oneui::code-example title="Dismissible Alerts" :code="$dismissCode">
                <x-oneui::alert type="success" :dismissible="true">Success! You can dismiss me.</x-oneui::alert>
                <x-oneui::alert type="danger" :dismissible="true">Error! Click X to close.</x-oneui::alert>
            </x-oneui::code-example>

            {{-- Alerts with Icons --}}
            @php
            $iconCode = '<x-oneui::alert type="success" icon="fa fa-fw fa-check">Success with left icon</x-oneui::alert>
<x-oneui::alert type="info" icon="fa fa-fw fa-info-circle">Info with left icon</x-oneui::alert>
<x-oneui::alert type="warning" icon="fa fa-fw fa-exclamation-circle" iconPosition="right">Warning with right icon</x-oneui::alert>';
            @endphp
            <x-oneui::code-example title="Alerts with Icons" :code="$iconCode">
                <x-oneui::alert type="success" icon="fa fa-fw fa-check">Success with left icon</x-oneui::alert>
                <x-oneui::alert type="info" icon="fa fa-fw fa-info-circle">Info with left icon</x-oneui::alert>
                <x-oneui::alert type="warning" icon="fa fa-fw fa-exclamation-circle" iconPosition="right">Warning with right icon</x-oneui::alert>
            </x-oneui::code-example>

            {{-- Alerts with Titles --}}
            @php
            $titleCode = '<x-oneui::alert type="success" title="Success" :dismissible="true">This is a success message!</x-oneui::alert>
<x-oneui::alert type="danger" title="Error" :dismissible="true">This is an error message!</x-oneui::alert>';
            @endphp
            <x-oneui::code-example title="Alerts with Titles" :code="$titleCode">
                <x-oneui::alert type="success" title="Success" :dismissible="true">This is a success message!</x-oneui::alert>
                <x-oneui::alert type="danger" title="Error" :dismissible="true">This is an error message!</x-oneui::alert>
            </x-oneui::code-example>
        </div>
    </x-slot>

    <x-slot:scripts>
        <script src="{{ asset('vendor/oneui/js/plugins/highlightjs/highlight.pack.min.js') }}"></script>
        <script>One.helpersOnLoad('js-highlightjs');</script>
    </x-slot>
</x-oneui::page>
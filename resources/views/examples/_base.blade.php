<x-oneui::page>
    <x-slot:title>{{ $title ?? 'Component Examples' }}</x-slot>
    <x-slot:head>
        <link rel="stylesheet" href="{{ asset('vendor/oneui/js/plugins/highlightjs/styles/atom-one-dark.css') }}">
    </x-slot>

    <x-slot:sidebar>
        @include('oneui::examples._sidebar')
    </x-slot>

    <x-slot:content>
        <div class="content">
            {{ $heading ?? '' }}
            {{ $slot }}
        </div>
    </x-slot>

    <x-slot:scripts>
        <script src="{{ asset('vendor/oneui/js/plugins/highlightjs/highlight.pack.min.js') }}"></script>
        <script>One.helpersOnLoad('js-highlightjs');</script>
    </x-slot>
</x-oneui::page>

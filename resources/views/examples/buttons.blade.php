<x-oneui::page>
    <x-slot:title>Button Examples</x-slot>
    <x-slot:head>
        <link rel="stylesheet" href="{{ asset('vendor/oneui/js/plugins/highlightjs/styles/atom-one-dark.css') }}">
    </x-slot>

    <x-slot:sidebar>
        @include('oneui.partials.sidebar')
    </x-slot>

    <x-slot:content>
        <div class="content">
            <h2 class="content-heading">Buttons</h2>

            {{-- Basic Buttons --}}
            @php
            $basicCode = '<x-oneui::button type="primary">Primary</x-oneui::button>
<x-oneui::button type="secondary">Secondary</x-oneui::button>
<x-oneui::button type="success">Success</x-oneui::button>
<x-oneui::button type="info">Info</x-oneui::button>
<x-oneui::button type="warning">Warning</x-oneui::button>
<x-oneui::button type="danger">Danger</x-oneui::button>';
            @endphp
            <x-oneui::code-example title="Basic Buttons" :code="$basicCode">
                <x-oneui::button type="primary">Primary</x-oneui::button>
                <x-oneui::button type="secondary">Secondary</x-oneui::button>
                <x-oneui::button type="success">Success</x-oneui::button>
                <x-oneui::button type="info">Info</x-oneui::button>
                <x-oneui::button type="warning">Warning</x-oneui::button>
                <x-oneui::button type="danger">Danger</x-oneui::button>
            </x-oneui::code-example>

            {{-- Outline Buttons --}}
            @php
            $outlineCode = '<x-oneui::button type="primary" :outline="true">Primary</x-oneui::button>
<x-oneui::button type="success" :outline="true">Success</x-oneui::button>
<x-oneui::button type="danger" :outline="true">Danger</x-oneui::button>';
            @endphp
            <x-oneui::code-example title="Outline Buttons" :code="$outlineCode">
                <x-oneui::button type="primary" :outline="true">Primary</x-oneui::button>
                <x-oneui::button type="success" :outline="true">Success</x-oneui::button>
                <x-oneui::button type="danger" :outline="true">Danger</x-oneui::button>
            </x-oneui::code-example>

            {{-- Alt Buttons --}}
            @php
            $altCode = '<x-oneui::button type="primary" :alt="true">Primary</x-oneui::button>
<x-oneui::button type="success" :alt="true">Success</x-oneui::button>
<x-oneui::button type="danger" :alt="true">Danger</x-oneui::button>';
            @endphp
            <x-oneui::code-example title="Alt Buttons" :code="$altCode">
                <x-oneui::button type="primary" :alt="true">Primary</x-oneui::button>
                <x-oneui::button type="success" :alt="true">Success</x-oneui::button>
                <x-oneui::button type="danger" :alt="true">Danger</x-oneui::button>
            </x-oneui::code-example>

            {{-- Button Sizes --}}
            @php
            $sizeCode = '<x-oneui::button type="primary" size="lg">Large</x-oneui::button>
<x-oneui::button type="primary">Normal</x-oneui::button>
<x-oneui::button type="primary" size="sm">Small</x-oneui::button>';
            @endphp
            <x-oneui::code-example title="Button Sizes" :code="$sizeCode">
                <x-oneui::button type="primary" size="lg">Large</x-oneui::button>
                <x-oneui::button type="primary">Normal</x-oneui::button>
                <x-oneui::button type="primary" size="sm">Small</x-oneui::button>
            </x-oneui::code-example>

            {{-- Link Buttons --}}
            @php
            $linkCode = '<x-oneui::button type="primary" tag="a" href="#">Link Button</x-oneui::button>
<x-oneui::button type="success" tag="a" href="#" :disabled="true">Disabled Link</x-oneui::button>';
            @endphp
            <x-oneui::code-example title="Link Buttons" :code="$linkCode">
                <x-oneui::button type="primary" tag="a" href="#">Link Button</x-oneui::button>
                <x-oneui::button type="success" tag="a" href="#" :disabled="true">Disabled Link</x-oneui::button>
            </x-oneui::code-example>

            {{-- Square Buttons --}}
            @php
            $squareCode = '<x-oneui::button type="primary" :square="true">Primary</x-oneui::button>
<x-oneui::button type="success" :square="true">Success</x-oneui::button>
<x-oneui::button type="danger" :square="true">Danger</x-oneui::button>';
            @endphp
            <x-oneui::code-example title="Square Buttons" :code="$squareCode">
                <x-oneui::button type="primary" :square="true">Primary</x-oneui::button>
                <x-oneui::button type="success" :square="true">Success</x-oneui::button>
                <x-oneui::button type="danger" :square="true">Danger</x-oneui::button>
            </x-oneui::code-example>

            {{-- Pill Buttons --}}
            @php
            $pillCode = '<x-oneui::button type="primary" :pill="true">Primary</x-oneui::button>
<x-oneui::button type="success" :pill="true">Success</x-oneui::button>
<x-oneui::button type="danger" :pill="true">Danger</x-oneui::button>';
            @endphp
            <x-oneui::code-example title="Pill Buttons" :code="$pillCode">
                <x-oneui::button type="primary" :pill="true">Primary</x-oneui::button>
                <x-oneui::button type="success" :pill="true">Success</x-oneui::button>
                <x-oneui::button type="danger" :pill="true">Danger</x-oneui::button>
            </x-oneui::code-example>
        </div>
    </x-slot>

    <x-slot:scripts>
        <script src="{{ asset('vendor/oneui/js/plugins/highlightjs/highlight.pack.min.js') }}"></script>
        <script>One.helpersOnLoad('js-highlightjs');</script>
    </x-slot>
</x-oneui::page>
<x-oneui::page>
    <x-slot:title>Utility Components</x-slot:title>
    <x-slot:head>
        <link rel="stylesheet" href="{{ asset('vendor/oneui/js/plugins/highlightjs/styles/atom-one-dark.css') }}">
    </x-slot>

    <x-slot:sidebar>
        @include('oneui.partials.sidebar')
    </x-slot:sidebar>

    <x-slot:content>
        <div class="content">
            <h2 class="content-heading">Utility Components</h2>

            {{-- Icons --}}
            @php
            $iconsCode = '<x-oneui::icons>
    <i class="fa fa-home fa-2x"></i>
    <i class="fa fa-user fa-2x"></i>
    <i class="fa fa-cog fa-2x"></i>
</x-oneui::icons>';
            @endphp
            <x-oneui::code-example title="Icons" :code="$iconsCode">
                <x-oneui::icons>
                    <i class="fa fa-home fa-2x me-3"></i>
                    <i class="fa fa-user fa-2x me-3"></i>
                    <i class="fa fa-cog fa-2x me-3"></i>
                    <i class="fa fa-envelope fa-2x me-3"></i>
                    <i class="fa fa-bell fa-2x me-3"></i>
                    <i class="fa fa-star fa-2x"></i>
                </x-oneui::icons>
            </x-oneui::code-example>

            {{-- Avatar --}}
            @php
            $avatarCode = '<x-oneui::avatar name="John Doe" />
<x-oneui::avatar image="path/to/avatar.jpg" size="lg" />';
            @endphp
            <x-oneui::code-example title="Avatar" :code="$avatarCode">
                <div class="row align-items-center">
                    <div class="col-auto">
                        <x-oneui::avatar name="John Doe" size="sm" />
                        <div class="small text-muted mt-1 text-center">Small</div>
                    </div>
                    <div class="col-auto">
                        <x-oneui::avatar name="Jane Smith" />
                        <div class="small text-muted mt-1 text-center">Medium</div>
                    </div>
                    <div class="col-auto">
                        <x-oneui::avatar name="Bob Wilson" size="lg" />
                        <div class="small text-muted mt-1 text-center">Large</div>
                    </div>
                    <div class="col-auto">
                        <x-oneui::avatar image="https://i.pravatar.cc/150?img=1" size="lg" />
                        <div class="small text-muted mt-1 text-center">Image</div>
                    </div>
                </div>
            </x-oneui::code-example>

            {{-- Badge --}}
            @php
            $badgeCode = '<span class="badge bg-primary">Primary</span>
<span class="badge bg-success">Success</span>
<span class="badge bg-warning">Warning</span>';
            @endphp
            <x-oneui::code-example title="Badge" :code="$badgeCode">
                <x-oneui::badge type="primary">Primary</x-oneui::badge>
                <x-oneui::badge type="success">Success</x-oneui::badge>
                <x-oneui::badge type="warning">Warning</x-oneui::badge>
                <x-oneui::badge type="danger">Danger</x-oneui::badge>
                <x-oneui::badge type="info">Info</x-oneui::badge>
                <x-oneui::badge :pill="true">Pill</x-oneui::badge>
            </x-oneui::code-example>

            {{-- Code Example --}}
            @php
            $codeExampleCode = '<x-oneui::code-example title="Example" :code="$code">
    <!-- Your content here -->
</x-oneui::code-example>';
            @endphp
            <x-oneui::code-example title="Code Example" :code="$codeExampleCode">
                <p>This is the <code>code-example</code> component you're looking at!</p>
                <p class="text-muted">Use it to display code with syntax highlighting and a live preview.</p>
            </x-oneui::code-example>

            {{-- Animations --}}
            @php
            $animationsCode = '<x-oneui::animations>
    <div class="animate-fade-in">Fade In</div>
    <div class="animate-slide-up">Slide Up</div>
</x-oneui::animations>';
            @endphp
            <x-oneui::code-example title="Animations" :code="$animationsCode">
                <x-oneui::animations>
                    <div class="row text-center">
                        <div class="col-md-3">
                            <div class="p-3 bg-light rounded animate-fade-in">Fade In</div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-3 bg-light rounded animate-slide-up">Slide Up</div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-3 bg-light rounded animate-bounce">Bounce</div>
                        </div>
                        <div class="col-md-3">
                            <div class="p-3 bg-light rounded animate-pulse">Pulse</div>
                        </div>
                    </div>
                </x-oneui::animations>
            </x-oneui::code-example>
        </div>
    </x-slot:content>

    <x-slot:scripts>
        <script src="{{ asset('vendor/oneui/js/plugins/highlightjs/highlight.pack.min.js') }}"></script>
        <script>One.helpersOnLoad('js-highlightjs');</script>
    </x-slot:scripts>
</x-oneui::page>

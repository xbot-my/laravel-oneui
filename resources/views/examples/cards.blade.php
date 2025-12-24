<x-oneui::page>
    <x-slot:title>Card Components</x-slot:title>
    <x-slot:head>
        <link rel="stylesheet" href="{{ asset('vendor/oneui/js/plugins/highlightjs/styles/atom-one-dark.css') }}">
    </x-slot>

    <x-slot:sidebar>
        @include('oneui.partials.sidebar')
    </x-slot:sidebar>

    <x-slot:content>
        <div class="content">
            <h2 class="content-heading">Cards</h2>

            {{-- Basic Card --}}
            @php
            $cardCode = '<x-oneui::card title="Card Title">
    <p class="text-muted">Card content goes here...</p>
</x-oneui::card>';
            @endphp
            <x-oneui::code-example title="Basic Card" :code="$cardCode">
                <x-oneui::card title="Card Title">
                    <p class="text-muted">Card content goes here...</p>
                </x-oneui::card>
            </x-oneui::code-example>

            {{-- UserCard --}}
            @php
            $userCardCode = '<x-oneui::user-card
    name="John Doe"
    email="john@example.com"
    role="Administrator"
    :show-status="true"
    status="active"
/>';
            @endphp
            <x-oneui::code-example title="User Card" :code="$userCardCode">
                <div class="row">
                    <div class="col-md-6">
                        <x-oneui::user-card
                            name="John Doe"
                            email="john@example.com"
                            role="Administrator"
                            :show-status="true"
                            status="active"
                        />
                    </div>
                    <div class="col-md-6">
                        <x-oneui::user-card
                            name="Jane Smith"
                            email="jane@example.com"
                            role="Editor"
                            :show-status="true"
                            status="pending"
                            layout="horizontal"
                        />
                    </div>
                </div>
            </x-oneui::code-example>

            {{-- PostCard --}}
            @php
            $postCardCode = '<x-oneui::post-card
    title="Blog Post Title"
    excerpt="This is a brief excerpt of the blog post..."
    category="Technology"
    author="John Doe"
    date="Dec 24, 2024"
    :read-time="5"
    url="#"
/>';
            @endphp
            <x-oneui::code-example title="Post Card" :code="$postCardCode">
                <div class="row">
                    <div class="col-md-6">
                        <x-oneui::post-card
                            title="Getting Started with Laravel"
                            excerpt="Learn the basics of Laravel framework and build your first application..."
                            category="Tutorial"
                            author="John Doe"
                            date="Dec 24, 2024"
                            :read-time="5"
                        />
                    </div>
                    <div class="col-md-6">
                        <x-oneui::post-card
                            title="Advanced Blade Components"
                            excerpt="Discover advanced techniques for building reusable Blade components..."
                            category="Advanced"
                            author="Jane Smith"
                            date="Dec 23, 2024"
                            :read-time="8"
                            layout="compact"
                        />
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

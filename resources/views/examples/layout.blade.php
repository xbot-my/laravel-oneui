<x-oneui::page>
    <x-slot:title>Layout Examples</x-slot>
    <x-slot:head>
        <link rel="stylesheet" href="{{ asset('vendor/oneui/js/plugins/highlightjs/styles/atom-one-dark.css') }}">
    </x-slot>

    <x-slot:sidebar>
        @include('oneui.partials.sidebar')
    </x-slot>

    <x-slot:content>
        <div class="content">
            <h2 class="content-heading">Hero Section</h2>

            @php
            $heroCode = <<<'CODE'
<x-oneui::hero title="Dashboard" subtitle="Overview of your data">
    <x-slot:actions>
        <a class="btn btn-primary" href="#">Get Started</a>
    </x-slot>
</x-oneui::hero>
CODE;
            @endphp
            <x-oneui::code-example title="Basic Hero" :code="$heroCode">
                <x-oneui::hero title="Dashboard" subtitle="Overview of your data">
                    <x-slot:actions>
                        <a class="btn btn-primary" href="#">Get Started</a>
                    </x-slot>
                </x-oneui::hero>
            </x-oneui::code-example>

            <h2 class="content-heading">Block</h2>

            @php
            $blockCode = <<<'CODE'
<x-oneui::block title="Settings">
    <x-slot:options>
        <button class="btn-block-option"><i class="si si-settings"></i></button>
    </x-slot>
    Your content here...
</x-oneui::block>
CODE;
            @endphp
            <x-oneui::code-example title="Block with Options" :code="$blockCode">
                <x-oneui::block title="Settings">
                    <x-slot:options>
                        <button class="btn-block-option" type="button"><i class="si si-settings"></i></button>
                        <button class="btn-block-option" type="button"><i class="si si-refresh"></i></button>
                    </x-slot>
                    <p>This is a block component with header options.</p>
                    <p class="mb-0">You can add any content here.</p>
                </x-oneui::block>
            </x-oneui::code-example>

            @php
            $blockStylesCode = <<<'CODE'
<x-oneui::block title="Rounded" :rounded="true">...</x-oneui::block>
<x-oneui::block title="Bordered" :bordered="true">...</x-oneui::block>
CODE;
            @endphp
            <x-oneui::code-example title="Block Styles" :code="$blockStylesCode">
                <div class="row">
                    <div class="col-md-6">
                        <x-oneui::block title="Rounded Block" :rounded="true">
                            <p class="mb-0">A rounded block with soft corners.</p>
                        </x-oneui::block>
                    </div>
                    <div class="col-md-6">
                        <x-oneui::block title="Bordered Block" :bordered="true">
                            <p class="mb-0">A block with a visible border.</p>
                        </x-oneui::block>
                    </div>
                </div>
            </x-oneui::code-example>

            <h2 class="content-heading">Container & Grid</h2>

            @php
            $gridCode = <<<'CODE'
<x-oneui::container>
    <x-oneui::row gap="4">
        <x-oneui::col md="4">Column 1</x-oneui::col>
        <x-oneui::col md="4">Column 2</x-oneui::col>
        <x-oneui::col md="4">Column 3</x-oneui::col>
    </x-oneui::row>
</x-oneui::container>
CODE;
            @endphp
            <x-oneui::code-example title="Basic Grid" :code="$gridCode">
                <x-oneui::row gap="3">
                    <x-oneui::col md="4">
                        <div class="block block-rounded bg-body-light p-3 text-center">Col 1</div>
                    </x-oneui::col>
                    <x-oneui::col md="4">
                        <div class="block block-rounded bg-body-light p-3 text-center">Col 2</div>
                    </x-oneui::col>
                    <x-oneui::col md="4">
                        <div class="block block-rounded bg-body-light p-3 text-center">Col 3</div>
                    </x-oneui::col>
                </x-oneui::row>
            </x-oneui::code-example>

            @php
            $responsiveCode = <<<'CODE'
<x-oneui::row gap="3">
    <x-oneui::col cols="12" md="6" lg="3">Responsive</x-oneui::col>
    ...
</x-oneui::row>
CODE;
            @endphp
            <x-oneui::code-example title="Responsive Grid" :code="$responsiveCode">
                <x-oneui::row gap="3">
                    <x-oneui::col cols="12" md="6" lg="3">
                        <div class="block block-rounded bg-primary-light p-3 text-center">12 / 6 / 3</div>
                    </x-oneui::col>
                    <x-oneui::col cols="12" md="6" lg="3">
                        <div class="block block-rounded bg-success-light p-3 text-center">12 / 6 / 3</div>
                    </x-oneui::col>
                    <x-oneui::col cols="12" md="6" lg="3">
                        <div class="block block-rounded bg-warning-light p-3 text-center">12 / 6 / 3</div>
                    </x-oneui::col>
                    <x-oneui::col cols="12" md="6" lg="3">
                        <div class="block block-rounded bg-danger-light p-3 text-center">12 / 6 / 3</div>
                    </x-oneui::col>
                </x-oneui::row>
            </x-oneui::code-example>

            <h2 class="content-heading">Offcanvas</h2>

            @php
            $offcanvasCode = <<<'CODE'
<x-oneui::offcanvas id="cartPanel" title="Shopping Cart" position="end">
    Cart items...
    <x-slot:footer>
        <button class="btn btn-primary w-100">Checkout</button>
    </x-slot>
</x-oneui::offcanvas>

<button data-bs-toggle="offcanvas" data-bs-target="#cartPanel">
    Open Cart
</button>
CODE;
            @endphp
            <x-oneui::code-example title="Offcanvas Drawer" :code="$offcanvasCode">
                <div class="d-flex gap-2">
                    <button class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#demoOffcanvasEnd">
                        <i class="fa fa-shopping-cart me-1"></i> Open Right
                    </button>
                    <button class="btn btn-alt-primary" data-bs-toggle="offcanvas" data-bs-target="#demoOffcanvasStart">
                        <i class="fa fa-bars me-1"></i> Open Left
                    </button>
                </div>
            </x-oneui::code-example>
        </div>

        <!-- Offcanvas Components -->
        <x-oneui::offcanvas id="demoOffcanvasEnd" title="Shopping Cart" position="end">
            <div class="mb-4">
                <div class="d-flex align-items-center mb-3 pb-3 border-bottom">
                    <img class="img-avatar img-avatar48" src="{{ asset('vendor/oneui/media/avatars/avatar1.jpg') }}" alt="">
                    <div class="ms-3">
                        <p class="fw-semibold mb-0">Product 1</p>
                        <p class="text-muted mb-0">$99.00</p>
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <img class="img-avatar img-avatar48" src="{{ asset('vendor/oneui/media/avatars/avatar2.jpg') }}" alt="">
                    <div class="ms-3">
                        <p class="fw-semibold mb-0">Product 2</p>
                        <p class="text-muted mb-0">$149.00</p>
                    </div>
                </div>
            </div>
            <x-slot:footer>
                <button class="btn btn-primary w-100">Checkout ($248.00)</button>
            </x-slot>
        </x-oneui::offcanvas>

        <x-oneui::offcanvas id="demoOffcanvasStart" title="Menu" position="start">
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Products</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
            </ul>
        </x-oneui::offcanvas>
    </x-slot>

    <x-slot:scripts>
        <script src="{{ asset('vendor/oneui/js/plugins/highlightjs/highlight.pack.min.js') }}"></script>
        <script>One.helpersOnLoad('js-highlightjs');</script>
    </x-slot>
</x-oneui::page>

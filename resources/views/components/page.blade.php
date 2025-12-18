<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="remember-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('app.name') }}</title>

    {{-- OneUI CSS --}}
    <link rel="stylesheet" id="css-main" href="{{ asset('vendor/oneui/css/oneui.min.css') }}">
    <link rel="stylesheet" id="css-theme" href="">

    {{-- Theme color loader --}}
    <script src="{{ asset('vendor/oneui/js/setTheme.js') }}"></script>

    {{ $head ?? '' }}
</head>

<body>
    {{-- Page Container --}}
    <div id="page-container" class="{{ $containerClasses() }}">

        {{-- Side Overlay --}}
        <aside id="side-overlay">
            <div class="content-header border-bottom">
                <a class="img-link me-1" href="javascript:void(0)">
                    <img class="img-avatar img-avatar32" src="{{ asset('vendor/oneui/media/avatars/avatar10.jpg') }}"
                        alt="">
                </a>
                <div class="ms-2">
                    <a class="text-dark fw-semibold fs-sm"
                        href="javascript:void(0)">{{ Auth::user()->name ?? 'Guest' }}</a>
                </div>
                <a class="ms-auto btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="layout"
                    data-action="side_overlay_close">
                    <i class="fa fa-fw fa-times"></i>
                </a>
            </div>
            <div class="content-side">
                {{ $sideOverlay ?? '' }}
            </div>
        </aside>
        {{-- END Side Overlay --}}

        {{-- Sidebar --}}
        <nav id="sidebar" aria-label="Main Navigation">
            {{-- Side Header --}}
            <div class="content-header">
                <a class="fw-semibold text-dual" href="{{ url('/') }}">
                    <span class="smini-visible">
                        <i class="fa fa-circle-notch text-primary"></i>
                    </span>
                    <span class="smini-hide fs-5 tracking-wider">{{ config('app.name', 'OneUI') }}</span>
                </a>

                <div class="d-flex align-items-center gap-1">
                    {{-- Dark Mode Switcher --}}
                    <div class="dropdown">
                        <button type="button" class="btn btn-sm btn-alt-secondary" id="sidebar-dark-mode-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="far fa-fw fa-moon" data-dark-mode-icon></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end smini-hide border-0"
                            aria-labelledby="sidebar-dark-mode-dropdown">
                            <button type="button" class="dropdown-item d-flex align-items-center gap-2"
                                data-toggle="layout" data-action="dark_mode_off" data-dark-mode="off">
                                <i class="far fa-sun fa-fw opacity-50"></i>
                                <span class="fs-sm fw-medium">Light</span>
                            </button>
                            <button type="button" class="dropdown-item d-flex align-items-center gap-2"
                                data-toggle="layout" data-action="dark_mode_on" data-dark-mode="on">
                                <i class="far fa-moon fa-fw opacity-50"></i>
                                <span class="fs-sm fw-medium">Dark</span>
                            </button>
                            <button type="button" class="dropdown-item d-flex align-items-center gap-2"
                                data-toggle="layout" data-action="dark_mode_system" data-dark-mode="system">
                                <i class="fa fa-desktop fa-fw opacity-50"></i>
                                <span class="fs-sm fw-medium">System</span>
                            </button>
                        </div>
                    </div>

                    {{-- Theme Selector --}}
                    <div class="dropdown">
                        <button type="button" class="btn btn-sm btn-alt-secondary" id="sidebar-themes-dropdown"
                            data-bs-auto-close="outside" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fa fa-fw fa-brush"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-end fs-sm smini-hide border-0"
                            aria-labelledby="sidebar-themes-dropdown">
                            <button class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                                data-toggle="theme" data-theme="default">
                                <span>Default</span>
                                <i class="fa fa-circle text-default"></i>
                            </button>
                            <button class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                                data-toggle="theme"
                                data-theme="{{ asset('vendor/oneui/css/themes/amethyst.min.css') }}">
                                <span>Amethyst</span>
                                <i class="fa fa-circle text-amethyst"></i>
                            </button>
                            <button class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                                data-toggle="theme" data-theme="{{ asset('vendor/oneui/css/themes/city.min.css') }}">
                                <span>City</span>
                                <i class="fa fa-circle text-city"></i>
                            </button>
                            <button class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                                data-toggle="theme" data-theme="{{ asset('vendor/oneui/css/themes/flat.min.css') }}">
                                <span>Flat</span>
                                <i class="fa fa-circle text-flat"></i>
                            </button>
                            <button class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                                data-toggle="theme" data-theme="{{ asset('vendor/oneui/css/themes/modern.min.css') }}">
                                <span>Modern</span>
                                <i class="fa fa-circle text-modern"></i>
                            </button>
                            <button class="dropdown-item d-flex align-items-center justify-content-between fw-medium"
                                data-toggle="theme" data-theme="{{ asset('vendor/oneui/css/themes/smooth.min.css') }}">
                                <span>Smooth</span>
                                <i class="fa fa-circle text-smooth"></i>
                            </button>
                            <div class="dropdown-divider d-dark-none"></div>
                            <a class="dropdown-item fw-medium d-dark-none" data-toggle="layout"
                                data-action="sidebar_style_light" href="javascript:void(0)">Sidebar Light</a>
                            <a class="dropdown-item fw-medium d-dark-none" data-toggle="layout"
                                data-action="sidebar_style_dark" href="javascript:void(0)">Sidebar Dark</a>
                            <div class="dropdown-divider d-dark-none"></div>
                            <a class="dropdown-item fw-medium d-dark-none" data-toggle="layout"
                                data-action="header_style_light" href="javascript:void(0)">Header Light</a>
                            <a class="dropdown-item fw-medium d-dark-none" data-toggle="layout"
                                data-action="header_style_dark" href="javascript:void(0)">Header Dark</a>
                        </div>
                    </div>

                    {{-- Close Sidebar (mobile) --}}
                    <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout"
                        data-action="sidebar_close" href="javascript:void(0)">
                        <i class="fa fa-fw fa-times"></i>
                    </a>
                </div>
            </div>
            {{-- END Side Header --}}

            {{-- Sidebar Scrolling --}}
            <div class="js-sidebar-scroll">
                <div class="content-side">
                    <ul class="nav-main">
                        {{ $sidebar ?? '' }}
                    </ul>
                </div>
            </div>
        </nav>
        {{-- END Sidebar --}}

        {{-- Header --}}
        <header id="page-header">
            <div class="content-header">
                {{-- Left Section --}}
                <div class="d-flex align-items-center">
                    <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout"
                        data-action="sidebar_toggle">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                    <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-none d-lg-inline-block"
                        data-toggle="layout" data-action="sidebar_mini_toggle">
                        <i class="fa fa-fw fa-ellipsis-v"></i>
                    </button>
                    {{ $headerLeft ?? '' }}
                </div>

                {{-- Right Section --}}
                <div class="d-flex align-items-center">
                    {{-- Notifications --}}
                    <div class="dropdown d-inline-block ms-2">
                        <button type="button" class="btn btn-sm btn-alt-secondary"
                            id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <i class="fa fa-fw fa-bell"></i>
                            <span class="text-primary">•</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0 border-0 fs-sm"
                            aria-labelledby="page-header-notifications-dropdown">
                            <div class="p-2 bg-body-light border-bottom text-center rounded-top">
                                <h5 class="dropdown-header text-uppercase">Notifications</h5>
                            </div>
                            <ul class="nav-items mb-0">
                                {!! $notifications ?? '<li class="text-center py-3"><span class="text-muted">No notifications</span></li>' !!}
                            </ul>
                            <div class="p-2 border-top text-center">
                                <a class="d-inline-block fw-medium" href="javascript:void(0)">
                                    <i class="fa fa-fw fa-arrow-down me-1 opacity-50"></i> Load More..
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Side Overlay Toggle --}}
                    <button type="button" class="btn btn-sm btn-alt-secondary ms-2" data-toggle="layout"
                        data-action="side_overlay_toggle">
                        <i class="fa fa-fw fa-list-ul fa-flip-horizontal"></i>
                    </button>

                    {{-- User Dropdown --}}
                    <div class="dropdown d-inline-block ms-2">
                        <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center"
                            id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false">
                            <img class="rounded-circle" src="{{ asset('vendor/oneui/media/avatars/avatar10.jpg') }}"
                                alt="Header Avatar" style="width: 21px;">
                            <span class="d-none d-sm-inline-block ms-2">{{ Auth::user()->name ?? 'Guest' }}</span>
                            <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block opacity-50 ms-1 mt-1"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0"
                            aria-labelledby="page-header-user-dropdown">
                            <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                                <img class="img-avatar img-avatar48 img-avatar-thumb"
                                    src="{{ asset('vendor/oneui/media/avatars/avatar10.jpg') }}" alt="">
                                <p class="mt-2 mb-0 fw-medium">{{ Auth::user()->name ?? 'Guest' }}</p>
                                <p class="mb-0 text-muted fs-sm fw-medium">{{ Auth::user()->email ?? '' }}</p>
                            </div>
                            <div class="p-2">
                                {{ $userMenu ?? '' }}
                                @auth
                                    <a class="dropdown-item d-flex align-items-center justify-content-between"
                                        href="{{ route('profile.edit') ?? '#' }}">
                                        <span class="fs-sm fw-medium">Profile</span>
                                    </a>
                                @endauth
                                <div role="separator" class="dropdown-divider m-0"></div>
                                @auth
                                    <form method="POST" action="{{ route('logout') ?? '#' }}">
                                        @csrf
                                        <button type="submit"
                                            class="dropdown-item d-flex align-items-center justify-content-between">
                                            <span class="fs-sm fw-medium">Log Out</span>
                                        </button>
                                    </form>
                                @endauth
                            </div>
                        </div>
                    </div>
                    {{ $headerRight ?? '' }}
                </div>
            </div>

            {{-- Header Loader --}}
            <div id="page-header-loader" class="overlay-header bg-body-extra-light">
                <div class="content-header">
                    <div class="w-100 text-center">
                        <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                    </div>
                </div>
            </div>
        </header>
        {{-- END Header --}}

        {{-- Main Container --}}
        <main id="main-container">
            {{ $content ?? $slot }}
        </main>
        {{-- END Main Container --}}

        {{-- Footer --}}
        <footer id="page-footer" class="bg-body-light">
            <div class="content py-3">
                <div class="row fs-sm">
                    <div class="col-sm-6 order-sm-2 py-1 text-center text-sm-end">
                        Crafted with <i class="fa fa-heart text-danger"></i> by <a class="fw-semibold"
                            href="https://xbot.my" target="_blank">XBot</a>
                    </div>
                    <div class="col-sm-6 order-sm-1 py-1 text-center text-sm-start">
                        <a class="fw-semibold" href="{{ url('/') }}">{{ config('app.name') }}</a> &copy; <span
                            data-toggle="year-copy"></span>
                    </div>
                </div>
            </div>
        </footer>
        {{-- END Footer --}}

    </div>
    {{-- END Page Container --}}

    {{-- OneUI JS --}}
    <script src="{{ asset('vendor/oneui/js/oneui.app.min.js') }}"></script>

    {{-- Copy Code Helper --}}
    <script>
        function copyCode(exampleId, btn) {
            const codeEl = document.getElementById(exampleId + '-source');
            if (codeEl) {
                const text = codeEl.textContent;
                const textarea = document.createElement('textarea');
                textarea.value = text;
                textarea.style.position = 'fixed';
                textarea.style.opacity = '0';
                document.body.appendChild(textarea);
                textarea.select();
                try {
                    document.execCommand('copy');
                    // Visual feedback
                    const icon = btn.querySelector('i');
                    icon.className = 'fa fa-check text-success';
                    setTimeout(() => { icon.className = 'fa fa-copy'; }, 1500);
                } catch (err) {
                    console.error('Copy failed:', err);
                }
                document.body.removeChild(textarea);
            }
        }
    </script>

    {{ $scripts ?? '' }}
</body>

</html>
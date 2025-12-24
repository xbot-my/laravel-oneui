{{-- Sidebar --}}
<nav id="sidebar" aria-label="Main Navigation">
    {{-- Side Header --}}
    <div class="content-header">
        <a class="fw-semibold text-dual" href="{{ $logoUrl }}">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide fs-5 tracking-wider">{{ $appName() }}</span>
        </a>

        @if($showThemeSwitcher || $showColorThemes || $showCloseButton)
        <div class="d-flex align-items-center gap-1">
            {{-- Dark Mode Switcher --}}
            @if($showThemeSwitcher)
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
            @endif

            {{-- Theme Selector --}}
            @if($showColorThemes)
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
            @endif

            {{-- Close Sidebar (mobile) --}}
            @if($showCloseButton)
            <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout"
                data-action="sidebar_close" href="javascript:void(0)">
                <i class="fa fa-fw fa-times"></i>
            </a>
            @endif
        </div>
        @endif
    </div>
    {{-- END Side Header --}}

    {{-- Sidebar Scrolling --}}
    <div class="js-sidebar-scroll">
        <div class="content-side">
            {{ $slot }}
        </div>
    </div>
</nav>
{{-- END Sidebar --}}

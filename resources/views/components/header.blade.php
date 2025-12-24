{{-- Header --}}
<header id="page-header">
    <div class="content-header">
        {{-- Left Section --}}
        <div class="d-flex align-items-center">
            @if($showToggle)
            <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout"
                data-action="sidebar_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-none d-lg-inline-block"
                data-toggle="layout" data-action="sidebar_mini_toggle">
                <i class="fa fa-fw fa-ellipsis-v"></i>
            </button>
            @endif

            @if($title)
            <h1 class="page-header-item me-2">{{ $title }}</h1>
            @endif

            {{ $headerLeft ?? '' }}
        </div>

        {{-- Right Section --}}
        <div class="d-flex align-items-center">
            {{-- Search --}}
            @if($showSearch)
            <div class="dropdown d-inline-block ms-2">
                <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-search-dropdown"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-search"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0 border-0"
                    aria-labelledby="page-header-search-dropdown">
                    <div class="p-2 bg-body-light border-bottom rounded-top">
                        <h5 class="dropdown-header text-uppercase">Search</h5>
                    </div>
                    <div class="p-2">
                        <input type="text" class="form-control" placeholder="Search...">
                    </div>
                </div>
            </div>
            @endif

            {{-- Notifications --}}
            @if($showNotifications)
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
                        @isset($notifications)
                            {!! $notifications !!}
                        @else
                            <li class="text-center py-3">
                                <span class="text-muted">No notifications</span>
                            </li>
                        @endisset
                    </ul>
                    @if(isset($notifications) && !empty($notifications))
                    <div class="p-2 border-top text-center">
                        <a class="d-inline-block fw-medium" href="javascript:void(0)">
                            <i class="fa fa-fw fa-arrow-down me-1 opacity-50"></i> Load More..
                        </a>
                    </div>
                    @endif
                </div>
            </div>
            @endif

            {{-- Side Overlay Toggle --}}
            @if($showSideOverlayToggle)
            <button type="button" class="btn btn-sm btn-alt-secondary ms-2" data-toggle="layout"
                data-action="side_overlay_toggle">
                <i class="fa fa-fw fa-list-ul fa-flip-horizontal"></i>
            </button>
            @endif

            {{-- User Dropdown --}}
            @if($showUserDropdown)
            <div class="dropdown d-inline-block ms-2">
                <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center"
                    id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <img class="rounded-circle" src="{{ $userAvatar }}"
                        alt="Header Avatar" style="width: 21px;">
                    <span class="d-none d-sm-inline-block ms-2">{{ $displayName() }}</span>
                    <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block opacity-50 ms-1 mt-1"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0"
                    aria-labelledby="page-header-user-dropdown">
                    <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                        <img class="img-avatar img-avatar48 img-avatar-thumb"
                            src="{{ $userAvatar }}" alt="">
                        <p class="mt-2 mb-0 fw-medium">{{ $displayName() }}</p>
                        @if($displayEmail())
                        <p class="mb-0 text-muted fs-sm fw-medium">{{ $displayEmail() }}</p>
                        @endif
                    </div>
                    <div class="p-2">
                        {{ $userMenu ?? '' }}
                        <a class="dropdown-item d-flex align-items-center justify-content-between"
                            href="#">
                            <span class="fs-sm fw-medium">Profile</span>
                        </a>
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
            @endif

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

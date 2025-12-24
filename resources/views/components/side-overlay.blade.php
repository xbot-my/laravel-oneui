{{-- Side Overlay --}}
<aside id="side-overlay">
    {{-- Side Header --}}
    @if($userName || $showCloseButton)
    <div class="content-header border-bottom">
        {{-- User Avatar --}}
        <a class="img-link me-1" href="javascript:void(0)">
            <img class="img-avatar img-avatar32" src="{{ $userAvatar }}" alt="">
        </a>
        {{-- END User Avatar --}}

        {{-- User Info --}}
        @if($userName)
        <div class="ms-2">
            <a class="text-dark fw-semibold fs-sm" href="javascript:void(0)">{{ $userName }}</a>
            @if($userEmail)
            <p class="mb-0 text-muted fs-sm fw-medium">{{ $userEmail }}</p>
            @endif
        </div>
        @endif
        {{-- END User Info --}}

        {{-- Close Side Overlay --}}
        @if($showCloseButton)
        <a class="ms-auto btn btn-sm btn-alt-danger" href="javascript:void(0)" data-toggle="layout"
            data-action="side_overlay_close">
            <i class="fa fa-fw fa-times"></i>
        </a>
        @endif
        {{-- END Close Side Overlay --}}
    </div>
    @endif
    {{-- END Side Header --}}

    {{-- Side Content --}}
    <div class="content-side">
        {{ $slot }}
    </div>
</aside>
{{-- END Side Overlay --}}

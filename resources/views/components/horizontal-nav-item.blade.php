@if($heading)
    <li class="nav-main-heading">{{ $heading }}</li>
@else
    <li class="nav-main-item">
        @if($submenu)
            <a class="nav-main-link nav-main-link-submenu {{ $active ? 'active' : '' }}" href="{{ $href ?? '#' }}" data-toggle="submenu" aria-haspopup="true" aria-expanded="false">
                @if($icon)
                    <i class="nav-main-link-icon fa {{ $icon }}"></i>
                @endif
                <span class="nav-main-link-name">{{ $slot }}</span>
            </a>
        @else
            <a class="nav-main-link {{ $active ? 'active' : '' }}" href="{{ $href ?? '#' }}">
                @if($icon)
                    <i class="nav-main-link-icon fa {{ $icon }}"></i>
                @endif
                <span class="nav-main-link-name">{{ $slot }}</span>
                @if($badge)
                    <span class="nav-main-link-badge badge rounded-pill bg-{{ $badgeColor }}">{{ $badge }}</span>
                @endif
            </a>
        @endif
    </li>
@endif

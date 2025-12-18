<li class="nav-main-item">
    <a class="{{ $linkClasses() }}" href="{{ $href }}" @if($submenu) data-toggle="submenu" aria-haspopup="true"
    aria-expanded="false" @endif>
        @if($icon)
            <i class="nav-main-link-icon {{ $icon }}"></i>
        @endif
        <span class="nav-main-link-name">{{ $slot }}</span>
    </a>
    @if($submenu && isset($items))
        <ul class="nav-main-submenu">
            {{ $items }}
        </ul>
    @endif
</li>
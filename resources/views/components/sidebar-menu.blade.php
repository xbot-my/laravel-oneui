<ul class="nav-main" {{ $attributes }}>
    @foreach($items as $item)
        @if($item->getValue('children'))
            {{-- Menu item with children --}}
            @php
                $children = $item->getValue('children');
                if ($sortByOrder) {
                    usort($children, fn($a, $b) => ($a['order'] ?? 999) <=> ($b['order'] ?? 999));
                }
            @endphp
            <li class="nav-main-item {{ $item->getValue('open') ? 'open' : '' }}">
                <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true"
                    aria-expanded="{{ $item->getValue('open') ? 'true' : 'false' }}" href="#">
                    @if($item->getValue('icon'))
                        <i class="nav-main-link-icon {{ $item->getValue('icon') }}"></i>
                    @endif
                    <span class="nav-main-link-name">{{ $item->getValue('label') }}</span>
                </a>
                <ul class="nav-main-submenu">
                    @foreach($children as $child)
                        <li class="nav-main-item">
                            <a class="nav-main-link {{ ($child['active'] ?? false) ? 'active' : '' }}"
                                href="{{ $getChildUrl($child) }}"
                                {!! $getChildLinkAttributes($child) !!}>
                                @if(isset($child['icon']))
                                    <i class="nav-main-link-icon {{ $child['icon'] }}"></i>
                                @endif
                                <span class="nav-main-link-name">{{ $child['label'] }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </li>
        @else
            {{-- Simple menu item --}}
            <li class="nav-main-item">
                <a class="nav-main-link {{ $item->getValue('active') ? 'active' : '' }}"
                    href="{{ $getItemUrl($item) }}"
                    {!! $getLinkAttributes($item) !!}>
                    @if($item->getValue('icon'))
                        <i class="nav-main-link-icon {{ $item->getValue('icon') }}"></i>
                    @endif
                    <span class="nav-main-link-name">{{ $item->getValue('label') }}</span>
                    @if($item->getValue('badge'))
                        <span class="nav-main-link-badge badge rounded-pill bg-primary">{{ $item->getValue('badge') }}</span>
                    @endif
                </a>
            </li>
        @endif
    @endforeach
</ul>
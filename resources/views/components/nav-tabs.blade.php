<ul {{ $attributes->merge(['class' => $navClasses()]) }} role="tablist">
    @foreach($items as $item)
        <li class="nav-item" role="presentation">
            <button class="nav-link {{ $item->getValue('active') ? 'active' : '' }}" id="{{ $item->getValue('id') }}-tab"
                data-bs-toggle="tab" data-bs-target="#{{ $item->getValue('id') }}" type="button" role="tab"
                aria-controls="{{ $item->getValue('id') }}"
                aria-selected="{{ $item->getValue('active') ? 'true' : 'false' }}">
                @if($item->getValue('icon'))
                    <i class="{{ $item->getValue('icon') }} me-1"></i>
                @endif
                {{ $item->getValue('label') }}
            </button>
        </li>
    @endforeach
</ul>
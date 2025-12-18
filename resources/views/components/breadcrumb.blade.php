<nav aria-label="breadcrumb" {{ $attributes }}>
    <ol class="{{ $breadcrumbClasses() }}">
        @foreach($items as $item)
            @if($loop->last)
                <li class="breadcrumb-item active" aria-current="page">
                    {{ $item->getValue('label') }}
                </li>
            @else
                <li class="breadcrumb-item">
                    @if($item->getValue('url'))
                        <a href="{{ $item->getValue('url') }}">{{ $item->getValue('label') }}</a>
                    @else
                        {{ $item->getValue('label') }}
                    @endif
                </li>
            @endif
        @endforeach
    </ol>
</nav>
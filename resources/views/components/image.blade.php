@if($url)
<a href="{{ $url }}" @if($attributes->has('target')) target="{{ $attributes->get('target') }}" @endif>
@endif

<img
    src="{{ $src }}"
    alt="{{ $alt }}"
    class="{{ $imageClasses() }}"
    @if($style()) style="{{ $style() }}" @endif
    loading="{{ $loading }}"
    {{ $attributes->except(['class', 'style', 'loading']) }}
>

@if($url)
</a>
@endif

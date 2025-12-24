@if($type === 'image')
    @if($src)
        <a {{ $attributes->merge(['class' => 'js-magnific-popup-image']) }} href="{{ $src }}" title="{{ $title }}">
            {{ $slot ?? '<img src="' . $src . '" alt="' . ($alt ?? $title ?? 'Image') . '" class="img-fluid rounded">' }}
        </a>
    @endif
@elseif($type === 'gallery' && !empty($items))
    <div class="magnific-popup-gallery" id="{{ $id }}">
        @foreach($items as $item)
            <a class="js-magnific-popup-item" href="{{ $item['src'] }}" title="{{ $item['title'] ?? '' }}">
                <img src="{{ $item['thumb'] ?? $item['src'] }}" alt="{{ $item['alt'] ?? $item['title'] ?? 'Image' }}" class="img-thumbnail mb-2" style="max-width: 150px;">
            </a>
        @endforeach
    </div>
@elseif($type === 'inline')
    <a {{ $attributes->merge(['class' => 'js-magnific-popup-inline']) }} href="#{{ $id }}_content">
        {{ $slot ?? 'Open Popup' }}
    </a>
    <div id="{{ $id }}_content" class="mfp-hide white-popup-block">
        {{ $slot ?? '' }}
    </div>
@elseif($type === 'iframe')
    <a {{ $attributes->merge(['class' => 'js-magnific-popup-iframe']) }} href="{{ $src }}">
        {{ $slot ?? 'Open Iframe' }}
    </a>
@else
    <a {{ $attributes->merge(['class' => 'js-magnific-popup']) }} href="{{ $src }}">
        {{ $slot ?? 'Open Popup' }}
    </a>
@endif

<script>
@if(isset($GLOBALS['magnific_popup_inited']) && $GLOBALS['magnific_popup_inited'])
@else
    @php
        $GLOBALS['magnific_popup_inited'] = true;
    @endphp
@endif

document.addEventListener('DOMContentLoaded', function() {
    if (typeof $ !== 'undefined' && $.fn.magnificPopup) {
        @if($type === 'image')
            $('.js-magnific-popup-image').magnificPopup({!! $popupOptions() !!});
        @elseif($type === 'gallery')
            $('#{{ $id }}').magnificPopup({
                @if($delegate)
                delegate: '{{ $delegate }}',
                @endif
                type: 'image',
                {!! $popupOptions() !!}
            });
        @elseif($type === 'inline')
            $('.js-magnific-popup-inline').magnificPopup({!! $popupOptions() !!});
        @elseif($type === 'iframe')
            $('.js-magnific-popup-iframe').magnificPopup({!! $popupOptions() !!});
        @else
            $('.js-magnific-popup').magnificPopup({!! $popupOptions() !!});
        @endif
    } else {
        console.error('Magnific Popup is not loaded');
    }
});
</script>

<style>
.white-popup-block {
    background: #FFF;
    padding: 20px 30px;
    text-align: left;
    max-width: 650px;
    margin: 40px auto;
    position: relative;
}
</style>

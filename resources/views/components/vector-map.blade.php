<div {{ $attributes->merge(['class' => 'js-vector-map']) }} id="{{ $id }}" style="height: {{ $height }}px; width: 100%;"></div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const mapEl = document.getElementById('{{ $id }}');

    if (mapEl && typeof $ !== 'undefined' && $.fn.vectorMap) {
        const options = {!! $mapOptions() !!};

        $(mapEl).vectorMap(options);

        @if($onRegionClick)
            $(mapEl).on('regionClick.jvectormap', function(event, code) {
                {{ $onRegionClick }}(code, event);
            });
        @endif

        @if($onRegionOver)
            $(mapEl).on('regionOver.jvectormap', function(event, code) {
                {{ $onRegionOver }}(code, event);
            });
        @endif

        @if($onRegionOut)
            $(mapEl).on('regionOut.jvectormap', function(event, code) {
                {{ $onRegionOut }}(code, event);
            });
        @endif

        @if($onMarkerClick)
            $(mapEl).on('markerClick.jvectormap', function(event, index) {
                {{ $onMarkerClick }}(index, event);
            });
        @endif
    } else if (typeof $.fn.vectorMap === 'undefined') {
        console.error('jVectorMap is not loaded');
    }
});
</script>

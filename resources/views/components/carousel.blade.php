<div {{ $attributes->merge(['class' => 'js-carousel']) }} id="{{ $id }}">
    {{ $items }}
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.getElementById('{{ $id }}');

    if (carousel && typeof $ !== 'undefined' && $.fn.slick) {
        $(carousel).slick({!! $slickOptions() !!});
    }
});
</script>

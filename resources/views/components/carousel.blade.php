<div class="js-carousel {{ $attributes->get('class') }}" id="{{ $id }}" {{ $attributes->except(['class', 'id']) }}>
    {{ $slot }}
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.getElementById('{{ $id }}');

    if (carousel && typeof $ !== 'undefined' && $.fn.slick) {
        $(carousel).slick({!! $slickOptions() !!});
    }
});
</script>

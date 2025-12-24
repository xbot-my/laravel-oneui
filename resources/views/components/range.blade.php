<input type="text" {{ $attributes->merge(['name' => $name, 'id' => $id]) }} class="js-range-slider" readonly>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const input = document.getElementById('{{ $id }}');
    if (input && typeof $ !== 'undefined' && $.fn.ionRangeSlider) {
        $(input).ionRangeSlider({!! $dataOptions() !!});
    }
});
</script>

<div class="js-rating" {{ $attributes->except('name') }} data-name="{{ $name }}" id="{{ $id }}"></div>

<input type="hidden" name="{{ $name }}" id="{{ $id }}_input" value="{{ $score }}" {{ $attributes->whereStartsWith('data-') }}>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const el = document.getElementById('{{ $id }}');
    const input = document.getElementById('{{ $id }}_input');
    if (el && typeof $ !== 'undefined' && $.fn.raty) {
        const options = {{ $dataOptions() }};
        options.scoreName = '{{ $name }}';
        options.targetType = 'number';
        options.targetKeep = true;

        $(el).raty(options).on('change', function(score, evt) {
            if (input) {
                input.value = score;
            }
        });
    }
});
</script>

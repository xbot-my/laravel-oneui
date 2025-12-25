<div class="chart-js-container {{ $attributes->get('class') }}" style="height: {{ $getHeight() }}px;">
    <canvas id="{{ $id }}"></canvas>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('{{ $id }}');

    if (ctx && typeof Chart !== 'undefined') {
        const datasets = {!! $datasetsJson() !!};

        // Apply default colors if not specified
        const defaultColors = {{ \Illuminate\Support\Js::from($getDefaultColors(count($datasets))) }};
        datasets.forEach((dataset, index) => {
            if (!dataset.borderColor || dataset.borderColor.length === 0) {
                dataset.borderColor = defaultColors.border[index % defaultColors.border.length];
            }
            if (!dataset.backgroundColor || dataset.backgroundColor.length === 0) {
                if (Array.isArray(dataset.data) && dataset.data.length > 0) {
                    // For pie/doughnut, each data point needs a color
                    if ('{{ $type }}' === 'pie' || '{{ $type }}' === 'doughnut' || '{{ $type }}' === 'polarArea') {
                        dataset.backgroundColor = defaultColors.background;
                    } else {
                        dataset.backgroundColor = defaultColors.background[index % defaultColors.background.length];
                    }
                }
            }
        });

        new Chart(ctx, {
            type: '{{ $type }}',
            data: {
                labels: {{ \Illuminate\Support\Js::from($getLabels()) }},
                datasets: datasets
            },
            options: {!! $optionsJson() !!}
        });
    }
});
</script>

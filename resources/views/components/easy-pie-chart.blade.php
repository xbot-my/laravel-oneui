<div {{ $attributes->merge(['id' => $id, 'class' => 'oneui-easy-pie-chart']) }}
    data-chart-config="{!! $chartConfig() !!}"
    data-percent="{{ $percent }}"
    style="display: inline-block; position: relative; width: {{ $size }}px; height: {{ $size }}px;"
>
    <canvas width="{{ $size }}" height="{{ $size }}" style="width: 100%; height: 100%;"></canvas>

    @if($showLabel)
    <div class="chart-label" style="
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
        color: {{ $labelColor }};
        font-weight: 600;
        font-size: {{ $size * 0.15 }}px;
    ">
        {{ $getLabel() }}
    </div>
    @endif
</div>

@once
@push('scripts)
<script>
(function() {
    function initEasyPieChart(el) {
        const config = el.dataset.chartConfig ? JSON.parse(el.dataset.chartConfig) : {};
        const targetPercent = parseFloat(el.dataset.percent) || 0;
        const canvas = el.querySelector('canvas');

        if (!canvas) return;

        const ctx = canvas.getContext('2d');
        const centerX = canvas.width / 2;
        const centerY = canvas.height / 2;
        const radius = (config.size / 2) - (config.lineWidth / 2) - 2;
        const currentPercent = { value: 0 };

        function draw(percent) {
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            // Draw track
            if (config.trackColor !== 'transparent') {
                ctx.beginPath();
                ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI);
                ctx.strokeStyle = config.trackColor;
                ctx.lineWidth = config.lineWidth;
                ctx.stroke();
            }

            // Draw scale
            if (config.scaleColor !== 'transparent') {
                ctx.beginPath();
                ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI);
                ctx.strokeStyle = config.scaleColor;
                ctx.lineWidth = 1;
                ctx.stroke();
            }

            // Draw bar
            const startAngle = -Math.PI / 2;
            const endAngle = startAngle + (percent / 100) * 2 * Math.PI;

            ctx.beginPath();
            ctx.arc(centerX, centerY, radius, startAngle, endAngle);
            ctx.strokeStyle = config.barColor;
            ctx.lineWidth = config.lineWidth;
            ctx.lineCap = config.lineCap || 'round';
            ctx.stroke();
        }

        if (config.animate) {
            const duration = config.animationDuration || 1000;
            const startTime = Date.now();

            function animate() {
                const elapsed = Date.now() - startTime;
                const progress = Math.min(elapsed / duration, 1);

                // Ease out cubic
                const eased = 1 - Math.pow(1 - progress, 3);
                currentPercent.value = targetPercent * eased;

                draw(currentPercent.value);

                if (progress < 1) {
                    requestAnimationFrame(animate);
                }
            }

            animate();
        } else {
            draw(targetPercent);
        }
    }

    // Initialize all charts
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.oneui-easy-pie-chart').forEach(function(el) {
            initEasyPieChart(el);
        });
    });
})();
</script>
@endpush
@endonce

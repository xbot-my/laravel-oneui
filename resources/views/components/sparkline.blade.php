<span id="{{ $id }}" class="oneui-sparkline {{ $attributes->get('class') }}"
    data-sparkline-config="{!! $sparklineConfig() !!}"
    data-values="{{ $dataJson() }}"
    style="display: inline-block; width: {{ $width }}px; height: {{ $height }}px;"
    {{ $attributes->except(['class', 'id']) }}
></span>

@once
@push('scripts')
<script>
(function() {
    // Simple Canvas-based Sparkline Implementation
    function initSparkline(el) {
        const config = el.dataset.sparklineConfig ? JSON.parse(el.dataset.sparklineConfig) : {};
        const values = el.dataset.values ? JSON.parse(el.dataset.values) : [];
        const type = config.type || 'line';
        const width = config.width || 80;
        const height = config.height || 30;

        // Create canvas
        const canvas = document.createElement('canvas');
        canvas.width = width;
        canvas.height = height;
        canvas.style.width = width + 'px';
        canvas.style.height = height + 'px';
        el.appendChild(canvas);

        const ctx = canvas.getContext('2d');

        switch (type) {
            case 'line':
                drawLineChart(ctx, values, width, height, config);
                break;
            case 'bar':
                drawBarChart(ctx, values, width, height, config);
                break;
            case 'pie':
                drawPieChart(ctx, values, width, height, config);
                break;
            case 'tristate':
                drawTristateChart(ctx, values, width, height, config);
                break;
            default:
                drawLineChart(ctx, values, width, height, config);
        }
    }

    function drawLineChart(ctx, values, width, height, config) {
        const padding = 2;
        const chartWidth = width - padding * 2;
        const chartHeight = height - padding * 2;

        const max = Math.max(...values);
        const min = Math.min(...values);
        const range = max - min || 1;

        const stepX = chartWidth / (values.length - 1 || 1);

        // Fill area
        if (config.fillColor && config.fillColor !== 'transparent') {
            ctx.fillStyle = config.fillColor;
            ctx.beginPath();
            ctx.moveTo(padding, height - padding);

            values.forEach((value, i) => {
                const x = padding + i * stepX;
                const y = padding + chartHeight - ((value - min) / range) * chartHeight;
                ctx.lineTo(x, y);
            });

            ctx.lineTo(padding + chartWidth, height - padding);
            ctx.closePath();
            ctx.fill();
        }

        // Draw line
        ctx.strokeStyle = config.lineColor || '#3b82f6';
        ctx.lineWidth = 1.5;
        ctx.beginPath();

        values.forEach((value, i) => {
            const x = padding + i * stepX;
            const y = padding + chartHeight - ((value - min) / range) * chartHeight;

            if (i === 0) {
                ctx.moveTo(x, y);
            } else {
                ctx.lineTo(x, y);
            }
        });

        ctx.stroke();

        // Draw spots
        if (config.spotRadius > 0) {
            values.forEach((value, i) => {
                const x = padding + i * stepX;
                const y = padding + chartHeight - ((value - min) / range) * chartHeight;

                ctx.fillStyle = config.highlightSpotColor || '#ef4444';
                ctx.beginPath();
                ctx.arc(x, y, config.spotRadius, 0, Math.PI * 2);
                ctx.fill();
            });
        }
    }

    function drawBarChart(ctx, values, width, height, config) {
        const padding = 2;
        const chartWidth = width - padding * 2;
        const chartHeight = height - padding * 2;

        const max = Math.max(...values, 0);
        const min = Math.min(...values, 0);
        const range = max - min || 1;
        const zeroY = padding + chartHeight - (Math.abs(min) / range) * chartHeight;

        const barWidth = (config.barWidth || 4);
        const gap = (chartWidth - (barWidth * values.length)) / (values.length + 1);

        values.forEach((value, i) => {
            const x = padding + gap + i * (barWidth + gap);
            const barHeight = Math.abs(value) / range * chartHeight;
            const y = value >= 0 ? zeroY - barHeight : zeroY;

            ctx.fillStyle = value >= 0 ? (config.barColor || '#3b82f6') : (config.negBarColor || '#ef4444');
            ctx.fillRect(x, y, barWidth, barHeight);
        });
    }

    function drawPieChart(ctx, values, width, height, config) {
        const centerX = width / 2;
        const centerY = height / 2;
        const radius = Math.min(width, height) / 2 - 2;

        const total = Math.abs(values.reduce((sum, v) => sum + v, 0)) || 1;
        const colors = config.sliceColors || ['#3b82f6', '#10b981', '#f59e0b', '#ef4444'];

        let startAngle = -Math.PI / 2;

        values.forEach((value, i) => {
            const sliceAngle = (Math.abs(value) / total) * Math.PI * 2;

            ctx.fillStyle = colors[i % colors.length];
            ctx.beginPath();
            ctx.moveTo(centerX, centerY);
            ctx.arc(centerX, centerY, radius, startAngle, startAngle + sliceAngle);
            ctx.closePath();
            ctx.fill();

            startAngle += sliceAngle;
        });
    }

    function drawTristateChart(ctx, values, width, height, config) {
        const padding = 2;
        const chartWidth = width - padding * 2;
        const chartHeight = height - padding * 2;

        const barWidth = (chartWidth / values.length) - 2;
        const midY = height / 2;

        const colors = config.tristateColors || ['#ef4444', '#e5e7eb', '#10b981'];

        values.forEach((value, i) => {
            const x = padding + i * (barWidth + 2);
            let colorIndex = 1; // neutral

            if (value > 0) colorIndex = 2; // positive
            if (value < 0) colorIndex = 0; // negative

            ctx.fillStyle = colors[colorIndex];
            ctx.fillRect(x, padding, barWidth, chartHeight);
        });
    }

    // Initialize all sparklines
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.oneui-sparkline').forEach(function(el) {
            if (!el.querySelector('canvas')) {
                initSparkline(el);
            }
        });
    });
})();
</script>
@endpush
@endonce

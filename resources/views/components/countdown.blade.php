<span {{ $attributes->merge(['id' => $id, 'class' => 'oneui-countdown']) }}
    data-countdown-config="{!! $countdownConfig() !!}"
    data-seconds="{{ $seconds }}"
>
    <span class="countdown-display">
        @if($format)
            {{-- Time units will be rendered by JavaScript --}}
            <span class="countdown-loading">Loading...</span>
        @else
            <span class="countdown-seconds">{{ $seconds }}s</span>
        @endif
    </span>

    @if($targetDate && !$compact)
    <span class="countdown-target text-muted ms-2">(until {{ $targetDate }})</span>
    @endif
</span>

@once
@push('styles)
<style>
.oneui-countdown {
    display: inline-flex;
    align-items: center;
    gap: 4px;
}
.oneui-countdown .countdown-unit {
    display: inline-flex;
    flex-direction: column;
    align-items: center;
    min-width: 40px;
}
.oneui-countdown .countdown-value {
    font-size: 1.5rem;
    font-weight: 600;
    line-height: 1;
}
.oneui-countdown .countdown-label {
    font-size: 0.7rem;
    text-transform: uppercase;
    color: #6b7280;
}
.oneui-countdown.compact .countdown-unit {
    flex-direction: row;
    gap: 2px;
    min-width: auto;
}
.oneui-countdown.compact .countdown-value {
    font-size: 1rem;
}
.oneui-countdown.compact .countdown-label {
    font-size: 0.65rem;
}
.oneui-countdown .countdown-separator {
    display: flex;
    align-items: center;
    font-size: 1.2rem;
    font-weight: 600;
    margin: 0 4px;
}
</style>
@endpush
@endonce

@push('scripts)
<script>
(function() {
    function initCountdown(el) {
        const config = el.dataset.countdownConfig ? JSON.parse(el.dataset.countdownConfig) : {};
        let seconds = parseInt(el.dataset.seconds) || 0;

        const display = el.querySelector('.countdown-display');
        if (!display) return;

        const format = config.format || 'dHMS';
        const compact = config.compact || false;
        const showLabels = config.showLabels !== false;

        // Create time units display
        function render() {
            if (seconds <= 0) {
                display.innerHTML = '<span class="countdown-expired">Expired</span>';
                if (config.onComplete && typeof window[config.onComplete] === 'function') {
                    window[config.onComplete]();
                }
                return;
            }

            const days = Math.floor(seconds / 86400);
            const hours = Math.floor((seconds % 86400) / 3600);
            const minutes = Math.floor((seconds % 3600) / 60);
            const secs = seconds % 60;

            let html = '';
            let hasUnits = false;
            const labels = {
                d: 'day',
                H: 'hour',
                M: 'min',
                S: 'sec'
            };

            // Days
            if (format.includes('d') && days > 0) {
                html += createUnit(days, labels.d, compact, showLabels);
                hasUnits = true;
            }

            // Hours
            if (format.includes('H') && (hasUnits || hours > 0)) {
                if (hasUnits && format.includes('d')) html += '<span class="countdown-separator">:</span>';
                html += createUnit(hours, labels.H, compact, showLabels);
                hasUnits = true;
            }

            // Minutes
            if (format.includes('M') && (hasUnits || minutes > 0)) {
                if (hasUnits && (format.includes('H') || format.includes('d'))) html += '<span class="countdown-separator">:</span>';
                html += createUnit(minutes, labels.M, compact, showLabels);
                hasUnits = true;
            }

            // Seconds
            if (format.includes('S') || !hasUnits) {
                if (hasUnits && (format.includes('M') || format.includes('H') || format.includes('d'))) html += '<span class="countdown-separator">:</span>';
                html += createUnit(secs, labels.S, compact, showLabels);
            }

            display.innerHTML = html;
        }

        function createUnit(value, label, compact, showLabel) {
            const formatted = String(value).padStart(2, '0');
            if (compact) {
                return `<span class="countdown-unit compact">
                    <span class="countdown-value">${formatted}</span>
                    ${showLabel ? `<span class="countdown-label">${label}</span>` : ''}
                </span>`;
            }
            return `<span class="countdown-unit">
                <span class="countdown-value">${formatted}</span>
                ${showLabel ? `<span class="countdown-label">${label}${value !== 1 ? 's' : ''}</span>` : ''}
            </span>`;
        }

        // Initial render
        render();

        // Start countdown
        const interval = setInterval(function() {
            seconds--;
            render();

            if (config.onTick && typeof window[config.onTick] === 'function') {
                window[config.onTick](seconds);
            }

            if (seconds <= 0) {
                clearInterval(interval);
            }
        }, 1000);
    }

    // Initialize all countdowns
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.oneui-countdown').forEach(function(el) {
            initCountdown(el);
        });
    });
})();
</script>
@endpush

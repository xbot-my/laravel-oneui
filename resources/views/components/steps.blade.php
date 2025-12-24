<div {{ $attributes->merge(['class' => $getContainerClasses()]) }}>
    @foreach($steps as $index => $step)
        @php
            $stepIndex = $index + 1;
            $status = $getStepStatus($stepIndex);
        @endphp
        <div class="steps-item {{ $status }}"
             @if($clickable && $status !== 'active') data-step="{{ $stepIndex }}" @endif
             style="width: {{ $getStepWidth() }}%">
            @if($variant === 'circles')
                <div class="steps-circle">
                    @if($status === 'completed')
                        <i class="{{ $completedIcon }}"></i>
                    @elseif($showNumbers)
                        <span class="steps-number">{{ $stepIndex }}</span>
                    @endif
                </div>
                <div class="steps-title">{{ $step }}</div>
            @elseif($variant === 'pills')
                <div class="steps-pill">
                    @if($status === 'completed')
                        <i class="{{ $completedIcon }}"></i>
                    @elseif($showNumbers)
                        <span class="steps-number">{{ $stepIndex }}</span>
                    @endif
                    <span class="steps-label">{{ $step }}</span>
                </div>
            @else
                <div class="steps-default">
                    @if($showNumbers)
                        <span class="steps-number">{{ $stepIndex }}</span>
                    @endif
                    <span class="steps-label">{{ $step }}</span>
                </div>
            @endif

            @if(isset($descriptions[$index]))
                <div class="steps-description">{{ $descriptions[$index] }}</div>
            @endif

            @if($index < $getTotal() - 1)
                <div class="steps-divider"></div>
            @endif
        </div>
    @endforeach
</div>

<style>
.steps {
    display: flex;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 2rem;
    position: relative;
}

.steps-left { justify-content: flex-start; }
.steps-center { justify-content: center; }
.steps-right { justify-content: flex-end; }

.steps-item {
    position: relative;
    text-align: center;
    flex: 1;
}

/* Default variant */
.steps-default .steps-number {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background-color: var(--oneui-bg-light, #e9ecef);
    color: var(--oneui-text-muted, #6c757d);
    font-weight: 600;
    margin-right: 0.5rem;
}

.steps-item.completed .steps-number {
    background-color: var(--oneui-success, #22c55e);
    color: white;
}

.steps-item.active .steps-number {
    background-color: var(--oneui-primary, #3b7ddd);
    color: white;
    box-shadow: 0 0 0 4px rgba(59, 125, 221, 0.2);
}

.steps-label {
    font-weight: 500;
    color: var(--oneui-text-muted, #6c757d);
}

.steps-item.completed .steps-label,
.steps-item.active .steps-label {
    color: var(--oneui-text-color, #212529);
}

/* Circles variant */
.steps-circles .steps-circle {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    background-color: var(--oneui-bg-light, #e9ecef);
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 0.5rem;
    font-weight: 600;
    color: var(--oneui-text-muted, #6c757d);
}

.steps-item.completed .steps-circle {
    background-color: var(--oneui-success, #22c55e);
    color: white;
}

.steps-item.active .steps-circle {
    background-color: var(--oneui-primary, #3b7ddd);
    color: white;
    box-shadow: 0 0 0 4px rgba(59, 125, 221, 0.2);
}

/* Pills variant */
.steps-pills .steps-pill {
    padding: 0.5rem 1rem;
    border-radius: 2rem;
    background-color: var(--oneui-bg-light, #e9ecef);
    color: var(--oneui-text-muted, #6c757d);
    font-weight: 500;
}

.steps-item.completed .steps-pill {
    background-color: var(--oneui-success, #22c55e);
    color: white;
}

.steps-item.active .steps-pill {
    background-color: var(--oneui-primary, #3b7ddd);
    color: white;
}

/* Steps divider */
.steps-divider {
    position: absolute;
    top: 50%;
    left: 0;
    right: 0;
    height: 2px;
    background-color: var(--oneui-border-color, #dee2e6);
    z-index: 0;
}

.steps-circles .steps-divider {
    top: 25px;
}

/* Size variants */
.steps-sm .steps-default .steps-number { width: 24px; height: 24px; font-size: 0.75rem; }
.steps-sm .steps-circles .steps-circle { width: 40px; height: 40px; font-size: 0.875rem; }

.steps-lg .steps-default .steps-number { width: 40px; height: 40px; font-size: 1rem; }
.steps-lg .steps-circles .steps-circle { width: 60px; height: 60px; font-size: 1.125rem; }

/* Clickable */
.steps-clickable .steps-item {
    cursor: pointer;
}

.steps-clickable .steps-item:hover .steps-number,
.steps-clickable .steps-item:hover .steps-circle,
.steps-clickable .steps-item:hover .steps-pill {
    opacity: 0.8;
}

/* Description */
.steps-description {
    font-size: 0.75rem;
    color: var(--oneui-text-muted, #6c757d);
    margin-top: 0.25rem;
}
</style>

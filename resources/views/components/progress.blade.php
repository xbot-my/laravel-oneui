<div {{ $attributes->merge(['class' => $progressClasses()]) }} role="progressbar" aria-valuenow="{{ $value }}"
    aria-valuemin="0" aria-valuemax="100">
    <div class="{{ $progressBarClasses() }}" style="width: {{ $value }}%">
        @if($showLabel)
            {{ $value }}%
        @endif
    </div>
</div>
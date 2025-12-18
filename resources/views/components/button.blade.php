@if($tag === 'a')
    <a href="{{ $href }}" class="{{ $buttonClasses() }}" {{ $attributes }} @if($disabled) aria-disabled="true" tabindex="-1"
    @endif>
        {{ $slot }}
    </a>
@else
    <button type="{{ $attributes->get('type', 'button') }}" class="{{ $buttonClasses() }}" {{ $attributes->except('type') }}
        @if($disabled) disabled @endif>
        {{ $slot }}
    </button>
@endif
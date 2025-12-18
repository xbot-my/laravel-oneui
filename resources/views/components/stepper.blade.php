<div {{ $attributes->merge(['class' => 'js-wizard-simple block']) }}>
    <ul class="{{ $stepperClasses() }} mb-3 push">
        @foreach($steps as $index => $step)
            <li class="nav-item">
                <button type="button"
                    class="nav-link d-flex align-items-center {{ $index === $current ? 'active' : '' }} {{ $index < $current ? 'text-success' : '' }}"
                    @if($index !== $current) disabled @endif>
                    <span
                        class="badge rounded-pill {{ $index < $current ? 'bg-success' : ($index === $current ? 'bg-primary' : 'bg-secondary') }} me-2">
                        @if($index < $current)
                            <i class="fa fa-check"></i>
                        @else
                            {{ $index + 1 }}
                        @endif
                    </span>
                    <span class="d-none d-sm-inline">{{ $step['title'] ?? '' }}</span>
                </button>
            </li>
        @endforeach
    </ul>
    {{ $slot }}
</div>
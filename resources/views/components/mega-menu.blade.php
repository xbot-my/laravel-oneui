<div class="dropdown">
    @isset($trigger)
        {!! $trigger !!}
    @else
        <button {!! $triggerAttributes() !!} class="btn btn-secondary">
            {{ $title ?? 'Menu' }}
            <i class="fa fa-fw fa-angle-down opacity-50 ms-1"></i>
        </button>
    @endisset

    <div class="{{ $menuClasses() }}" aria-labelledby="{{ $id }}">
        @if($title)
            <div class="{{ $headerClasses() }}">
                <h3 class="h5 fw-semibold text-white mb-0">{{ $title }}</h3>
                <button type="button" class="btn btn-sm btn-alt-light" data-bs-dismiss="dropdown">
                    <i class="fa fa-times"></i>
                </button>
            </div>
        @endif
        {{ $slot }}
    </div>
</div>

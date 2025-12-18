<div {{ $attributes->merge(['role' => 'alert'])->class([
    'alert',
    'alert-primary' => $type === 'primary',
    'alert-secondary' => $type === 'secondary',
    'alert-success' => $type === 'success',
    'alert-danger' => $type === 'danger',
    'alert-warning' => $type === 'warning',
    'alert-info' => $type === 'info',
    'alert-dark' => $type === 'dark',
    'alert-light' => $type === 'light',
    'alert-dismissible' => $dismissible,
    'd-flex align-items-center' => !$title && ($icon || $defaultIcon()),
    'justify-content-between' => !$title && $iconPosition === 'right',
]) }}>
    @if($title)
        {{-- Title Mode: simple layout --}}
        <h3 class="alert-heading h4 my-2">{{ $title }}</h3>
        <p class="mb-0">{{ $slot }}</p>
    @elseif($icon || $defaultIcon())
        {{-- Icon Mode: flex layout --}}
        @if($iconPosition === 'left')
            <div class="flex-shrink-0">
                <i class="{{ $icon ?? $defaultIcon() }}"></i>
            </div>
            <div class="flex-grow-1 ms-3">
                <p class="mb-0">{{ $slot }}</p>
            </div>
        @else
            <div class="flex-grow-1 me-3">
                <p class="mb-0">{{ $slot }}</p>
            </div>
            <div class="flex-shrink-0">
                <i class="{{ $icon ?? $defaultIcon() }}"></i>
            </div>
        @endif
    @else
        {{-- Simple Mode --}}
        <p class="mb-0">{{ $slot }}</p>
    @endif

    @if($dismissible)
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    @endif
</div>
<div {{ $attributes->merge(['class' => 'toast', 'role' => 'alert']) }} aria-live="assertive" aria-atomic="true"
    data-bs-autohide="{{ $autohide ? 'true' : 'false' }}" data-bs-delay="{{ $delay }}">
    <div class="toast-header">
        <i class="{{ $iconClass() }} me-2"></i>
        <strong class="me-auto">{{ $title }}</strong>
        <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
    @if($message || $slot->isNotEmpty())
        <div class="toast-body">
            {{ $message }}{{ $slot }}
        </div>
    @endif
</div>
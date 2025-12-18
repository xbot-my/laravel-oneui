<div {{ $attributes->merge(['class' => 'position-fixed top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-body-extra-light']) }} style="z-index: 9999; {{ $show ? '' : 'display: none;' }}">
    <div class="text-center">
        <x-oneui::spinner :color="$color" />
        @if($message)
            <p class="mt-3 mb-0 text-muted">{{ $message }}</p>
        @endif
    </div>
</div>
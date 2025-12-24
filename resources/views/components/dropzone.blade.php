<div class="dropzone dropzone-custom mb-4" id="{{ $id }}">
    <div class="dz-message">
        <i class="fa fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
        <p class="fs-sm mb-0">Drop files here or click to upload</p>
    </div>
</div>

<style>
.dropzone-custom {
    border: 2px dashed var(--oneui-border-color, #e1e4e8);
    border-radius: 0.5rem;
    background-color: var(--oneui-bg-color, #fbfbfb);
    min-height: 200px;
    padding: 2rem;
    transition: all 0.3s ease;
}

.dropzone-custom:hover {
    border-color: var(--oneui-primary-color, #3b7ddd);
    background-color: var(--oneui-primary-light, #f0f4ff);
}

.dropzone-custom .dz-message {
    margin: 2em 0;
}

.dropzone-custom .dz-preview {
    margin: 1rem 0.5rem;
}

.dropzone-custom .dz-preview .dz-image {
    border-radius: 0.375rem;
}

.dropzone-custom .dz-preview .dz-remove {
    font-size: 0.875rem;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const dropzoneEl = document.getElementById('{{ $id }}');

    if (dropzoneEl && typeof Dropzone !== 'undefined') {
        const dropzone = new Dropzone('#{{ $id }}', {!! $dropzoneOptions() !!});

        // Store instance for external access
        dropzoneEl.dropzone = dropzone;

        @if($onSuccess)
            dropzone.on('success', {{ $onSuccess }});
        @endif

        @if($onError)
            dropzone.on('error', {{ $onError }});
        @endif

        @if($onComplete)
            dropzone.on('complete', {{ $onComplete }});
        @endif
    } else if (typeof Dropzone === 'undefined') {
        console.error('Dropzone is not loaded');
    }
});
</script>

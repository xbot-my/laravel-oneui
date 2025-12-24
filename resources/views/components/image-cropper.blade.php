<div class="image-cropper-wrapper">
    <div class="row">
        <div class="col-md-8">
            <div class="image-cropper-container {{ $circular ? 'circular-preview' : '' }}">
                <img
                    src="{{ $src ?? asset('vendor/oneui/media/various/default-image.png') }}"
                    id="{{ $id }}_image"
                    {{ $attributes->merge(['class' => 'img-fluid']) }}
                    alt="Image to crop"
                >
            </div>
        </div>
        <div class="col-md-4">
            <div class="preview-container">
                <h6 class="fs-sm mb-2">Preview</h6>
                <div class="img-preview preview-lg {{ $circular ? 'img-preview-circle' : '' }}"></div>
                @if(!$circular)
                    <div class="img-preview preview-md mb-2"></div>
                    <div class="img-preview preview-sm"></div>
                @endif
            </div>

            {{-- Hidden inputs for cropped data --}}
            <input type="hidden" name="{{ $name }}_x" id="{{ $id }}_x" value="">
            <input type="hidden" name="{{ $name }}_y" id="{{ $id }}_y" value="">
            <input type="hidden" name="{{ $name }}_width" id="{{ $id }}_width" value="">
            <input type="hidden" name="{{ $name }}_height" id="{{ $id }}_height" value="">
            <input type="hidden" name="{{ $name }}_rotate" id="{{ $id }}_rotate" value="">
            <input type="hidden" name="{{ $name }}_scaleX" id="{{ $id }}_scaleX" value="">
            <input type="hidden" name="{{ $name }}_scaleY" id="{{ $id }}_scaleY" value="">
        </div>
    </div>
</div>

<style>
.image-cropper-container img {
    max-width: 100%;
    display: block;
    max-height: 400px;
}

.img-preview {
    overflow: hidden;
    background-color: #f7f9fc;
    margin-bottom: 0.5rem;
}

.preview-lg {
    width: 100%;
    height: 200px;
}

.preview-md {
    width: 120px;
    height: 120px;
}

.preview-sm {
    width: 60px;
    height: 60px;
}

.img-preview-circle {
    border-radius: 50%;
}

.img-preview img {
    display: block;
    max-width: 100%;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const image = document.getElementById('{{ $id }}_image');

    if (image && typeof Cropper !== 'undefined') {
        const cropper = new Cropper(image, {!! $cropperOptions() !!});

        // Store cropper instance for external access
        image.cropperInstance = cropper;

        // Update hidden inputs on crop
        cropper.addEventListener('crop', function(event) {
            document.getElementById('{{ $id }}_x').value = Math.round(event.detail.x);
            document.getElementById('{{ $id }}_y').value = Math.round(event.detail.y);
            document.getElementById('{{ $id }}_width').value = Math.round(event.detail.width);
            document.getElementById('{{ $id }}_height').value = Math.round(event.detail.height);
            document.getElementById('{{ $id }}_rotate').value = event.detail.rotate;
            document.getElementById('{{ $id }}_scaleX').value = event.detail.scaleX;
            document.getElementById('{{ $id }}_scaleY').value = event.detail.scaleY;

            // Update preview
            const previews = document.querySelectorAll('.img-preview');
            previews.forEach(function(preview) {
                preview.innerHTML = '';
                const canvas = cropper.getCroppedCanvas({
                    width: preview.clientWidth,
                    height: preview.clientHeight
                });
                if (canvas) {
                    const img = document.createElement('img');
                    img.src = canvas.toDataURL();
                    preview.appendChild(img);
                }
            });
        });
    }
});
</script>

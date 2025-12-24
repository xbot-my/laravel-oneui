<div {{ $attributes->merge(['class' => 'js-video-background', 'data-vide-bg' => $src]) }}
     id="{{ $id }}"
     data-vide-options="{{ $videoOptions() }}">
    {{ $slot }}
</div>

<style>
.js-video-background {
    position: relative;
    overflow: hidden;
    width: 100%;
}

.js-video-background::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.4);
    z-index: 1;
}

.js-video-background > * {
    position: relative;
    z-index: 2;
}

.vide-bg-container {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    overflow: hidden;
    z-index: 0;
}

.vide-bg-container video {
    position: absolute;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    object-fit: cover;
}
</style>

<script>
@if(isset($GLOBALS['vide_inited']) && $GLOBALS['vide_inited'])
@else
    @php
        $GLOBALS['vide_inited'] = true;
    @endphp
@endif

document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('{{ $id }}');

    if (container) {
        // Create video element manually for better control
        const videoContainer = document.createElement('div');
        videoContainer.className = 'vide-bg-container';

        const video = document.createElement('video');
        video.muted = {{ $muted === true || $muted === 'true' ? 'true' : 'false' }};
        video.loop = {{ $loop ? 'true' : 'false' }};
        video.autoplay = {{ $autoplay ? 'true' : 'false' }};
        video.playsInline = {{ $playsinline === true || $playsinline === 'true' ? 'true' : 'false' }};
        video.volume = {{ $volume / 100 }};

        @if($poster)
            video.poster = '{{ $poster }}';
        @endif

        const source = document.createElement('source');
        source.src = '{{ $src }}';
        video.appendChild(source);

        videoContainer.appendChild(video);
        container.insertBefore(videoContainer, container.firstChild);

        // Play video when ready
        video.addEventListener('loadeddata', function() {
            video.play().catch(function(error) {
                console.log('Autoplay prevented:', error);
            });
        });
    }
});
</script>

<div {{ $attributes->merge(['class' => $getAnimationClasses(), 'data-animation' => $animation]) }}
     @if(!empty($getAnimationStyles()) || $delay > 0 || $duration > 0)
     style="{{ !empty($getAnimationStyles()) ? $getAnimationStyles() . '; ' : '' }}@if($delay > 0) animation-delay: {{ $delay / 1000 }}s; @endif @if($duration > 0) animation-duration: {{ $duration / 1000 }}s; @endif animation-name: {{ $getAnimationName() }};"
     @endif
>
    {{ $slot }}
</div>

@unless(isset($GLOBALS['animations_styles_inited']))
    @php
        $GLOBALS['animations_styles_inited'] = true;
    @endphp

    <style>
        /* Fade animations */
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        @keyframes fadeInUp {
            from { opacity: 0; transform: translate3d(0, 20px, 0); }
            to { opacity: 1; transform: translate3d(0, 0, 0); }
        }
        @keyframes fadeInDown {
            from { opacity: 0; transform: translate3d(0, -20px, 0); }
            to { opacity: 1; transform: translate3d(0, 0, 0); }
        }
        @keyframes fadeInLeft {
            from { opacity: 0; transform: translate3d(-20px, 0, 0); }
            to { opacity: 1; transform: translate3d(0, 0, 0); }
        }
        @keyframes fadeInRight {
            from { opacity: 0; transform: translate3d(20px, 0, 0); }
            to { opacity: 1; transform: translate3d(0, 0, 0); }
        }

        /* Bounce animations */
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-20px); }
            60% { transform: translateY(-10px); }
        }

        /* Slide animations */
        @keyframes slideInUp {
            from { transform: translate3d(0, 100%, 0); visibility: visible; }
            to { transform: translate3d(0, 0, 0); }
        }
        @keyframes slideInDown {
            from { transform: translate3d(0, -100%, 0); visibility: visible; }
            to { transform: translate3d(0, 0, 0); }
        }

        /* Zoom animations */
        @keyframes zoomIn {
            from { opacity: 0; transform: scale3d(0.3, 0.3, 0.3); }
            to { opacity: 1; }
        }

        .animated {
            animation-duration: 1s;
            animation-fill-mode: both;
        }

        .animated.infinite {
            animation-iteration-count: infinite;
        }

        .animated.hinge {
            animation-duration: 2s;
        }

        .animated.delay-1s { animation-delay: 0.1s; }
        .animated.delay-2s { animation-delay: 0.2s; }
        .animated.delay-3s { animation-delay: 0.3s; }
        .animated.delay-4s { animation-delay: 0.4s; }
        .animated.delay-5s { animation-delay: 0.5s; }

        @if($trigger === 'hover')
            [data-animation="{{ $animation }}"]:hover {
                animation-name: {{ $getAnimationName() }};
            }
        @elseif($trigger === 'click')
            [data-animation="{{ $animation }}"].animate-click {
                animation-name: {{ $getAnimationName() }};
            }
        @endif
    </style>

    @if($trigger === 'click')
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('[data-animation="{{ $animation }}"]').forEach(function(el) {
                el.addEventListener('click', function() {
                    this.classList.add('animate-click');
                    setTimeout(() => {
                        this.classList.remove('animate-click');
                    }, {{ $duration ?: 1000 }});
                });
            });
        });
        </script>
    @endif
@endunless

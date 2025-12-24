<div {{ $attributes->merge(['class' => 'js-appear', 'data-appear-animation' => $animation]) }}
     data-appear-duration="{{ $duration }}"
     data-appear-delay="{{ $delay }}"
     data-appear-easing="{{ $easing }}"
     id="{{ $id }}">
    {{ $slot }}
</div>

<script>
@if(isset($GLOBALS['jquery_appear_inited']) && $GLOBALS['jquery_appear_inited'])
@else
    @php
        $GLOBALS['jquery_appear_inited'] = true;
    @endphp
@endif

document.addEventListener('DOMContentLoaded', function() {
    const element = document.getElementById('{{ $id }}');

    if (element && typeof $ !== 'undefined' && $.fn.appear) {
        const options = {!! $appearOptions() !!};

        $(element).appear(options);

        @if($callback)
            $(element).on('appear', function() {
                if (typeof {{ $callback }} === 'function') {
                    {{ $callback }}(element);
                }
            });
        @else
            $(element).on('appear', function() {
                const anim = element.getAttribute('data-appear-animation');
                const duration = parseInt(element.getAttribute('data-appear-duration')) || 600;
                const delay = parseInt(element.getAttribute('data-appear-delay')) || 0;
                const easing = element.getAttribute('data-appear-easing') || 'ease';

                setTimeout(function() {
                    element.style.transition = 'all ' + (duration / 1000) + 's ' + easing;
                    element.style.opacity = '1';
                    element.style.transform = 'translateY(0)';

                    if (anim) {
                        element.classList.add('animated', anim);
                    }
                }, delay);

                // Set initial state
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
            });
        @endif

        @if(!$once)
            $(element).on('disappear', function() {
                const anim = element.getAttribute('data-appear-animation');
                if (anim) {
                    element.classList.remove('animated', anim);
                }
                element.style.opacity = '0';
                element.style.transform = 'translateY(20px)';
            });
        @endif
    } else if (typeof $.fn.appear === 'undefined') {
        console.error('jQuery.appear is not loaded');
    }
});
</script>

<style>
.js-appear {
    opacity: 0;
    transition: opacity {{ $duration }}ms {{ $easing }};
}

.js-appear.appeared {
    opacity: 1;
}
</style>

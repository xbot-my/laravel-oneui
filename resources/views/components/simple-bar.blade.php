<div {{ $attributes->merge(['class' => 'js-simplebar', 'data-simplebar' => 'true']) }}
     id="{{ $id }}"
     @if(!empty($getContainerStyles())) style="{{ $getContainerStyles() }}" @endif
>
    {{ $slot }}
</div>

<style>
.js-simplebar[data-simplebar] {
    position: relative;
    overflow: hidden;
}

.js-simplebar .simplebar-wrapper {
    overflow: hidden;
}

.js-simplebar .simplebar-content {
    overflow-y: scroll;
    overflow-x: hidden;
}

.js-simplebar .simplebar-track {
    background-color: rgba(0, 0, 0, 0.1);
    border-radius: 4px;
}

.js-simplebar .simplebar-scrollbar {
    width: 10px;
    background-color: rgba(0, 0, 0, 0.2);
    border-radius: 4px;
    transition: background-color 0.2s;
}

.js-simplebar .simplebar-scrollbar:hover {
    background-color: rgba(0, 0, 0, 0.3);
}

.js-simplebar .simplebar-scrollbar.simplebar-visible {
    background-color: rgba(0, 0, 0, 0.15);
}

[data-simplebar-theme="dark"] .simplebar-track {
    background-color: rgba(255, 255, 255, 0.1);
}

[data-simplebar-theme="dark"] .simplebar-scrollbar {
    background-color: rgba(255, 255, 255, 0.2);
}

[data-simplebar-theme="dark"] .simplebar-scrollbar:hover {
    background-color: rgba(255, 255, 255, 0.3);
}

[data-simplebar-theme="dark"] .simplebar-scrollbar.simplebar-visible {
    background-color: rgba(255, 255, 255, 0.15);
}
</style>

<script>
@if(isset($GLOBALS['simplebar_inited']) && $GLOBALS['simplebar_inited'])
@else
    @php
        $GLOBALS['simplebar_inited'] = true;
    @endphp
@endif

document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('{{ $id }}');

    if (container && typeof SimpleBar !== 'undefined') {
        new SimpleBar(container, {!! $simpleBarOptions() !!});
    } else if (typeof SimpleBar === 'undefined') {
        console.error('SimpleBar is not loaded');
    }
});
</script>

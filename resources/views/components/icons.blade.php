@if(!empty($stack))
    <span class="fa-stack fa-{{ $stack[0] ?? '1x' }}" {{ $attributes->merge(['style' => $getStyles()]) }}>
        <i class="{{ $stack[1] ?? 'fa-circle' }} fa-stack-2x"></i>
        <i class="{{ $getIconClasses() }} fa-stack-1x" @if($title) title="{{ $title }}" @endif></i>
    </span>
@else
    <i class="{{ $getIconClasses() }}"
       @if($title) title="{{ $title }}" @endif
       @if(!empty($getStyles())) style="{{ $getStyles() }}" @endif
       {{ $attributes->except('title') }}></i>
@endif

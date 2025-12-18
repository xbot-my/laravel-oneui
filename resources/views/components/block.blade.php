<div class="{{ $blockClasses() }}" {{ $attributes }}>
    @if($title || isset($header))
        <div class="block-header block-header-default">
            @if($title)
                <h3 class="block-title">{{ $title }}</h3>
            @endif
            @if(isset($options))
                <div class="block-options">
                    {{ $options }}
                </div>
            @endif
            {{ $header ?? '' }}
        </div>
    @endif
    <div class="block-content">
        {{ $slot }}
    </div>
</div>
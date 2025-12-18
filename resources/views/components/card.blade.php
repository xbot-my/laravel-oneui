<div {{ $attributes->merge(['class' => 'block' . ($rounded ? ' block-rounded' : '')]) }}>
    @if($title)
        <div class="block-header block-header-default">
            <h3 class="block-title">{{ $title }}</h3>
            @isset($options)
                <div class="block-options">
                    {{ $options }}
                </div>
            @endisset
        </div>
    @endif
    <div class="block-content">
        {{ $slot }}
    </div>
    @isset($footer)
        <div class="block-content block-content-full block-content-sm bg-body-light">
            {{ $footer }}
        </div>
    @endisset
</div>
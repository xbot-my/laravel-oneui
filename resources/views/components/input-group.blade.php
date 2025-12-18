<div class="input-group {{ $sizeClass() }}">
    @isset($prepend)
        <span class="input-group-text {{ $alt ? 'input-group-text-alt' : '' }}">{{ $prepend }}</span>
    @endisset

    {{ $slot }}

    @isset($append)
        <span class="input-group-text {{ $alt ? 'input-group-text-alt' : '' }}">{{ $append }}</span>
    @endisset
</div>
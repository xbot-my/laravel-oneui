<div class="block block-rounded" {{ $attributes }}>
    <ul class="{{ $navClasses() }}" role="tablist">
        {{ $tabs }}
    </ul>
    <div class="block-content tab-content">
        {{ $slot }}
    </div>
</div>
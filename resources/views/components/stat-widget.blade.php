<{{ $tag() }} {{ $attributes->merge(['class' => $blockClasses()]) }} @if($href) href="{{ $href }}" @endif>
    <div class="block-content block-content-full d-flex align-items-center justify-content-between">
        @if($icon && $iconPosition === 'left')
            <div>
                <i class="{{ $icon }} fa-2x {{ $iconClasses() }}"></i>
            </div>
            <dl class="ms-3 text-end mb-0">
                <dt class="{{ $textClasses() }} h3 fw-extrabold mb-0">{{ $value }}</dt>
                <dd class="{{ $textClasses() }} fs-sm fw-medium {{ $color ? '' : 'text-muted' }} mb-0">{{ $label }}</dd>
            </dl>
        @elseif($icon && $iconPosition === 'right')
            <dl class="me-3 mb-0">
                <dt class="{{ $textClasses() }} h3 fw-extrabold mb-0">{{ $value }}</dt>
                <dd class="{{ $textClasses() }} fs-sm fw-medium {{ $color ? '' : 'text-muted' }} mb-0">{{ $label }}</dd>
            </dl>
            <div>
                <i class="{{ $icon }} fa-2x {{ $iconClasses() }}"></i>
            </div>
        @else
            <dl class="mb-0">
                <dt class="{{ $textClasses() }} h3 fw-extrabold mb-0">{{ $value }}</dt>
                <dd class="{{ $textClasses() }} fs-sm fw-medium {{ $color ? '' : 'text-muted' }} mb-0">{{ $label }}</dd>
            </dl>
        @endif
    </div>
</{{ $tag() }}>
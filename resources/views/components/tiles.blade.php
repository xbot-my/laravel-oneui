<div class="{{ $colClasses() }}">
    @if($link)
    <a class="{{ $tileClasses() }} block-link-pop" href="{{ $url }}">
    @else
    <div class="{{ $tileClasses() }}">
    @endif

        <div class="{{ $contentClasses() }}" @if($image) style="background-image: url('{{ $image }}');" @endif>
            <div class="d-flex justify-content-center align-items-center h-100">
                @if($icon)
                {{-- Icon tile --}}
                <div>
                    <i class="{{ $iconClasses() }}"></i>
                    <div class="fs-sm fw-semibold @if($image) mt-3 @endif text-uppercase @if($dark || $image) text-white @else text-muted @endif">
                        {{ $label }}
                    </div>
                </div>
                @elseif($value !== null)
                {{-- Value tile --}}
                <div>
                    <div class="fs-2 fw-bold @if($dark || $image) text-white @elseif($color !== 'default') @if($color === 'modern') text-modern-lighter @elseif($color === 'smooth') text-smooth-lighter @else text-white @endif @else text-body-color-dark @endif">
                        {{ $value }}
                    </div>
                    <div class="fs-sm fw-semibold mt-1 text-uppercase text-muted">
                        {{ $label }}
                    </div>
                </div>
                @else
                {{-- Content slot --}}
                {{ $slot }}
                @endif
            </div>
        </div>

    @if($link)
    </a>
    @else
    </div>
    @endif
</div>

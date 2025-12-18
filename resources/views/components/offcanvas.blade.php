<div {{ $attributes->merge(['class' => $offcanvasClasses()]) }} id="{{ $id }}" tabindex="-1"
    aria-labelledby="{{ $id }}Label" {!! $dataAttributes() !!}>
    <div class="offcanvas-header bg-body-light">
        @if($title)
            <h5 class="offcanvas-title" id="{{ $id }}Label">{{ $title }}</h5>
        @endif
        @isset($header)
            {{ $header }}
        @endisset
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        {{ $slot }}
    </div>
    @isset($footer)
        <div class="offcanvas-footer border-top p-3">
            {{ $footer }}
        </div>
    @endisset
</div>
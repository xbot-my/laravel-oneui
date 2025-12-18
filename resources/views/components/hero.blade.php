<div {{ $attributes->merge(['class' => $heroClasses()]) }} @if($image) style="background-image: url('{{ $image }}');"
@endif>
    @if($overlay)
        <div class="{{ $overlayClasses() }}">
    @endif

        <div class="{{ $contentClasses() }}">
            <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                <div class="flex-grow-1">
                    @if($title)
                        <h1 class="h3 fw-bold mb-1 {{ $dark ? 'text-white' : '' }}">{{ $title }}</h1>
                    @endif
                    @if($subtitle)
                        <h2 class="fs-base {{ $dark ? 'text-white-75' : 'text-muted' }} fw-medium mb-0">{{ $subtitle }}</h2>
                    @endif
                    {{ $slot }}
                </div>
                @isset($actions)
                    <div class="mt-3 mt-sm-0">
                        {{ $actions }}
                    </div>
                @endisset
            </div>
        </div>

        @if($overlay)
            </div>
        @endif
</div>
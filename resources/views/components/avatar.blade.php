@if($src)
    <div class="position-relative d-inline-block">
        <img {{ $attributes->merge(['class' => $avatarClasses()]) }} src="{{ $src }}" alt="{{ $alt ?? '' }}">
        @if($status)
            <span class="position-absolute bottom-0 end-0 p-1 {{ $statusClasses() }} border border-white rounded-circle"></span>
        @endif
    </div>
@elseif($initials)
    <div {{ $attributes->merge(['class' => 'img-avatar bg-primary-light text-primary d-inline-flex align-items-center justify-content-center']) }} style="font-weight: 600;">
        {{ $initials }}
        @if($status)
            <span class="position-absolute bottom-0 end-0 p-1 {{ $statusClasses() }} border border-white rounded-circle"></span>
        @endif
    </div>
@else
    {{ $slot }}
@endif
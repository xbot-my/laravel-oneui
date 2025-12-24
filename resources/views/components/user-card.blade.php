@php
    $isVertical = $layout === 'vertical';
    $isHorizontal = $layout === 'horizontal';
    $isCompact = $layout === 'compact';
@endphp

<div {{ $attributes->merge(['class' => $containerClasses()]) }}>
    <div class="block-content {{ $isCompact ? 'block-content-full' : '' }}">
        @if($isVertical)
            {{-- Vertical Layout --}}
            <div class="text-center">
                @if($profileUrl)
                <a href="{{ $profileUrl }}">
                @endif
                <img src="{{ $avatar }}" alt="{{ $name }}"
                     class="img-avatar img-avatar-{{ $size }} rounded-circle mb-3"
                     width="{{ $avatarSize() }}" height="{{ $avatarSize() }}">
                @if($profileUrl)
                </a>
                @endif

                @if($name)
                <h3 class="h4 mb-1">
                    @if($profileUrl)
                    <a href="{{ $profileUrl }}" class="text-decoration-none">{{ $name }}</a>
                    @else
                    {{ $name }}
                    @endif
                </h3>
                @endif

                @if($showRole && $role)
                <p class="text-muted mb-2">{{ $role }}</p>
                @endif

                @if($showStatus && $status)
                <span class="badge bg-{{ $statusColor() }} mb-2">{{ ucfirst($status) }}</span>
                @endif

                @if($showEmail && $email)
                <p class="mb-2">
                    <a href="mailto:{{ $email }}" class="text-decoration-none">{{ $email }}</a>
                </p>
                @endif

                @if($showMeta)
                    @if($phone)
                    <p class="text-muted mb-1">
                        <i class="fa fa-phone me-1"></i> {{ $phone }}
                    </p>
                    @endif
                    @if($location)
                    <p class="text-muted mb-1">
                        <i class="fa fa-map-marker-alt me-1"></i> {{ $location }}
                    </p>
                    @endif
                    @if($joined)
                    <p class="text-muted mb-0">
                        <i class="fa fa-calendar me-1"></i> Joined {{ $joined }}
                    </p>
                    @endif
                @endif

                @if($showActions && $slot)
                    <div class="mt-3">
                        {{ $slot }}
                    </div>
                @endif
            </div>

        @elseif($isHorizontal)
            {{-- Horizontal Layout --}}
            <div class="d-flex align-items-center">
                @if($profileUrl)
                <a href="{{ $profileUrl }}" class="me-3">
                @else
                <div class="me-3">
                @endif
                <img src="{{ $avatar }}" alt="{{ $name }}"
                     class="img-avatar img-avatar-{{ $size }} rounded-circle"
                     width="{{ $avatarSize() }}" height="{{ $avatarSize() }}">
                @if($profileUrl)
                </a>
                @else
                </div>
                @endif

                <div class="flex-grow-1">
                    @if($name)
                    <h4 class="h5 mb-1">
                        @if($profileUrl)
                        <a href="{{ $profileUrl }}" class="text-decoration-none">{{ $name }}</a>
                        @else
                        {{ $name }}
                        @endif
                    </h4>
                    @endif

                    @if($showRole && $role)
                    <p class="text-muted small mb-1">{{ $role }}</p>
                    @endif

                    @if($showEmail && $email)
                    <p class="text-muted small mb-0">
                        <a href="mailto:{{ $email }}" class="text-decoration-none">{{ $email }}</a>
                    </p>
                    @endif

                    @if($showStatus && $status)
                    <span class="badge bg-{{ $statusColor() }} mt-1">{{ ucfirst($status) }}</span>
                    @endif
                </div>

                @if($showActions && $slot)
                    <div class="ms-3">
                        {{ $slot }}
                    </div>
                @endif
            </div>

        @else
            {{-- Compact Layout --}}
            <div class="d-flex align-items-center">
                @if($profileUrl)
                <a href="{{ $profileUrl }}" class="me-2">
                @endif
                <img src="{{ $avatar }}" alt="{{ $name }}"
                     class="img-avatar img-avatar-sm rounded-circle"
                     width="32px" height="32px">
                @if($profileUrl)
                </a>
                @endif

                <div class="flex-grow-1">
                    @if($name)
                    <span class="fw-bold">{{ $name }}</span>
                    @endif
                    @if($showRole && $role)
                    <span class="text-muted small ms-2">{{ $role }}</span>
                    @endif
                </div>

                @if($showStatus && $status)
                <span class="badge bg-{{ $statusColor() }} ms-2">{{ ucfirst($status) }}</span>
                @endif
            </div>
        @endif
    </div>
</div>

@php
    $isCompact = $isCompact();
    $isHorizontal = $isHorizontal();
@endphp

<{{ $wrapperTag() }} {{ $wrapperAttributes() }} {{ $attributes->except(['class']) }}>>

    {{-- Featured Image --}}
    @if($showImage && $image)
        @if($isHorizontal)
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{ $image }}" alt="{{ $title }}" class="img-fluid rounded-start h-100 object-fit-cover" style="min-height: 200px;">
            </div>
            <div class="col-md-8">
        @else
        <div class="block-content block-content-full">
            @if($url)
            <a href="{{ $url }}">
            @endif
            <img src="{{ $image }}" alt="{{ $title }}" class="img-fluid rounded mb-3">
            @if($url)
            </a>
            @endif
        @endif
    @endif

    @if(!$isHorizontal || ($isHorizontal && $image))
        @if($isHorizontal)
        <div class="block-content p-3">
        @elseif($showImage && $image)
            <div class="mt-3">
        @else
        <div class="block-content block-content-full">
        @endif
    @endif

    {{-- Category Badge --}}
    @if($category)
        @if($categoryUrl)
        <a href="{{ $categoryUrl }}" class="text-decoration-none">
        @endif
        <span class="badge bg-primary mb-2">{{ $category }}</span>
        @if($categoryUrl)
        </a>
        @endif
    @endif

    {{-- Title --}}
    @if($title)
        @if($url && !$isCompact)
        <h3 class="h4 mb-2">
            <a href="{{ $url }}" class="text-decoration-none">{{ $title }}</a>
        </h3>
        @else
        <h3 class="h4 mb-2">{{ $title }}</h3>
        @endif
    @endif

    {{-- Excerpt --}}
    @if($showExcerpt && $excerpt && !$isCompact)
    <p class="text-muted mb-3">{{ $excerpt }}</p>
    @endif

    {{-- Meta Info --}}
    @if($showMeta && !$isCompact)
        <div class="d-flex align-items-center text-muted small mb-3">
            @if($showAuthor && $author)
                @if($authorAvatar)
                <img src="{{ $authorAvatar }}" alt="{{ $author }}" class="img-avatar img-avatar-sm rounded-circle me-2" width="24" height="24">
                @endif
                <span class="me-3">
                    <i class="fa fa-user me-1"></i> {{ $author }}
                </span>
            @endif

            @if($date)
            <span class="me-3">
                <i class="fa fa-calendar me-1"></i> {{ $date }}
            </span>
            @endif

            @if($readTime)
            <span class="me-3">
                <i class="fa fa-clock me-1"></i> {{ $readTime }} min read
            </span>
            @endif
        </div>
    @endif

    {{-- Stats --}}
    @if($showStats && !$isCompact)
        <div class="d-flex gap-3 text-muted small">
            @if($views)
            <span>
                <i class="fa fa-eye me-1"></i> {{ $views }} views
            </span>
            @endif

            @if($comments)
            <span>
                <i class="fa fa-comments me-1"></i> {{ $comments }} comments
            </span>
            @endif
        </div>
    @endif

    {{-- Compact Meta --}}
    @if($isCompact)
        <div class="d-flex justify-content-between align-items-center text-muted small">
            <span>
                @if($author){{ $author }} · @endif
                @if($date){{ $date }}@endif
            </span>
            @if($readTime)
            <span>{{ $readTime }} min read</span>
            @endif
        </div>
    @endif

    {{-- Custom Slot --}}
    @if($slot)
        {{ $slot }}
    @endif

    @if($showImage && $image)
            @if($isHorizontal)
            </div>
            </div>
            @elseif($image)
            </div>
        </div>
        @endif
    @else
        </div>
    @endif

</{{ $wrapperTag() }}>

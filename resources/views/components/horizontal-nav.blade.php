@if($responsive)
    <div class="d-lg-none">
        <button type="button" class="btn w-100 btn-alt-secondary d-flex justify-content-between align-items-center"
            data-toggle="class-toggle" data-target="#{{ $id }}" data-class="d-none">
            Menu
            <i class="fa fa-bars"></i>
        </button>
    </div>
@endif

<div id="{{ $id }}" class="{{ $containerClasses() }}">
    <ul class="{{ $navClasses() }}">
        {{ $slot }}
    </ul>
</div>

<div class="modal fade" id="{{ $id }}" tabindex="-1" role="dialog" aria-labelledby="{{ $id }}-label" aria-hidden="true"
    @if($static) data-bs-backdrop="static" data-bs-keyboard="false" @endif {{ $attributes }}>
    <div class="{{ $modalDialogClasses() }}" role="document">
        <div class="modal-content">
            @if($title)
                <div class="block-header block-header-default">
                    <h3 class="block-title" id="{{ $id }}-label">{{ $title }}</h3>
                    <div class="block-options">
                        <button type="button" class="btn-block-option" data-bs-dismiss="modal" aria-label="Close">
                            <i class="fa fa-fw fa-times"></i>
                        </button>
                    </div>
                </div>
            @endif
            <div class="block-content fs-sm">
                {{ $slot }}
            </div>
            @if(isset($footer))
                <div class="block-content block-content-full text-end bg-body">
                    {{ $footer }}
                </div>
            @endif
        </div>
    </div>
</div>
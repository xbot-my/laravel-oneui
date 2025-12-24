@if($label)
    <label class="form-label" for="{{ $id }}">{{ $label }}</label>
@endif

@if($textarea)
    <textarea
        {{ $attributes->merge([
            'name' => $name,
            'id' => $id,
            'rows' => $rows,
            'maxlength' => $limit,
        ])->class('js-maxlength form-control') }}
        placeholder="{{ $placeholder }}"
        data-always-show="{{ $alwaysShow ? 'true' : 'false' }}"
        data-placement="{{ $placement }}"
        @if($readonly) readonly @endif
        @if($disabled) disabled @endif
    >{{ $value ?? '' }}</textarea>
@else
    <input
        type="text"
        {{ $attributes->merge([
            'name' => $name,
            'id' => $id,
            'maxlength' => $limit,
        ])->class('js-maxlength form-control') }}
        value="{{ $value ?? '' }}"
        placeholder="{{ $placeholder }}"
        data-always-show="{{ $alwaysShow ? 'true' : 'false' }}"
        data-placement="{{ $placement }}"
        @if($readonly) readonly @endif
        @if($disabled) disabled @endif
    >
@endif

@if($showText)
    <div class="form-text">{{ $limit }} Character Max</div>
@endif

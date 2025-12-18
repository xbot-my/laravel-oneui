@if($label)
<div class="mb-4">
    <label class="form-label" for="{{ $id }}">{{ $label }}</label>
@endif
    <textarea {{ $attributes->merge(['name' => $name, 'id' => $id, 'rows' => $rows])->class([
        'form-control',
        'form-control-alt' => $alt,
        'is-invalid' => $error,
    ]) }}
        @if($placeholder) placeholder="{{ $placeholder }}" @endif
        @if($disabled) disabled @endif
        @if($readonly) readonly @endif
    >{{ $value ?? $slot }}</textarea>
    @if($error)
        <div class="invalid-feedback">{{ $error }}</div>
    @endif
@if($label)
</div>
@endif

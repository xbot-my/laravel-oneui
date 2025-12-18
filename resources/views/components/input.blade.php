@if($label)
    <div class="mb-4">
        <label class="form-label" for="{{ $id }}">{{ $label }}</label>
@endif
    <input {{ $attributes->merge(['name' => $name, 'id' => $id, 'type' => $type])->class([
    'form-control',
    'form-control-alt' => $alt,
    'form-control-sm' => $size === 'sm',
    'form-control-lg' => $size === 'lg',
    'is-invalid' => $error,
    'is-valid' => $valid && !$error,
]) }} @if($placeholder) placeholder="{{ $placeholder }}" @endif
        @if($value) value="{{ $value }}" @endif @if($disabled) disabled @endif @if($readonly) readonly @endif>
    @if($error)
        <div class="invalid-feedback">{{ $error }}</div>
    @endif
    @if($label)
        </div>
    @endif
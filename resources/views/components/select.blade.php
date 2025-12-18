@if($label)
    <div class="mb-4">
        <label class="form-label" for="{{ $id }}">{{ $label }}</label>
@endif
    <select {{ $attributes->merge(['name' => $name, 'id' => $id])->class([
    'form-select',
    'form-select-alt' => $alt,
    'form-select-sm' => $size === 'sm',
    'form-select-lg' => $size === 'lg',
    'is-invalid' => $error,
]) }} @if($multiple)
multiple @endif @if($disabled) disabled @endif>
        {{ $slot }}
        @foreach($options as $value => $text)
            <option value="{{ $value }}" @if($selected == $value) selected @endif>{{ $text }}</option>
        @endforeach
    </select>
    @if($error)
        <div class="invalid-feedback">{{ $error }}</div>
    @endif
    @if($label)
        </div>
    @endif
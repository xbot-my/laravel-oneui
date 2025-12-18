@php $inputId = ($name ?: 'floating') . '-' . uniqid(); @endphp

<div class="form-floating mb-4">
    @if($slot->isEmpty())
        <input
            type="{{ $type }}"
            class="form-control {{ $error ? 'is-invalid' : '' }}"
            id="{{ $inputId }}"
            @if($name) name="{{ $name }}" @endif
            placeholder="{{ $placeholder ?: $label }}"
            @if($value) value="{{ $value }}" @endif
            {{ $attributes }}
        >
    @else
        {{ $slot }}
    @endif
    <label for="{{ $inputId }}">{{ $label }}</label>
    @if($error)
        <div class="invalid-feedback">{{ $error }}</div>
    @endif
</div>

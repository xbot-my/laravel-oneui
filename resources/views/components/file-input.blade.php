@php $inputId = $name . '-' . uniqid(); @endphp

<div class="mb-4">
    @if($label)
        <label class="form-label" for="{{ $inputId }}">{{ $label }}</label>
    @endif
    <input type="file" class="form-control {{ $error ? 'is-invalid' : '' }}" id="{{ $inputId }}" name="{{ $name }}"
        @if($multiple) multiple @endif @if($accept) accept="{{ $accept }}" @endif {{ $attributes }}>
    @if($error)
        <div class="invalid-feedback">{{ $error }}</div>
    @endif
</div>
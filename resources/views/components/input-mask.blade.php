@if($label)
    <label class="form-label" for="{{ $id }}">{{ $label }}</label>
@endif

<input
    type="text"
    {{ $attributes->merge([
        'name' => $name,
        'id' => $id,
        'placeholder' => $placeholder,
        'data-mask' => $getMaskPattern(),
    ])->class('form-control ' . $getMaskClass()) }}
    @if($autofocus) autofocus @endif
    @if($readonly) readonly @endif
    @if($disabled) disabled @endif
    @if($value) value="{{ $value }}" @endif
>

@if(!isset($attributes['class']) || !str_contains($attributes['class'] ?? '', 'js-masked-custom'))
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const input = document.getElementById('{{ $id }}');
        if (input && typeof $ !== 'undefined' && $.fn.mask) {
            $(input).mask('{{ $getMaskPattern() }}');
        }
    });
    </script>
@endif

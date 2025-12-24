@if($label)
    <label class="form-label" for="{{ $id }}">{{ $label }}</label>
@endif

<select
    {{ $attributes->merge([
        'name' => $name . '[]',
        'id' => $id,
        'multiple' => 'multiple',
        'data-placeholder' => $placeholder
    ]) }}
    class="js-select2 form-select tags-input"
    data-select2-init="{!! $select2Config() !!}"
    {{ $disabled ? 'disabled' : '' }}
>
    @foreach($options as $value => $label)
        <option value="{{ $value }}" {{ in_array($value, (array) $value) ? 'selected' : '' }}>{{ $label }}</option>
    @endforeach
</select>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectEl = document.getElementById('{{ $id }}');

    if (selectEl && typeof jQuery !== 'undefined' && jQuery.fn.select2) {
        jQuery(selectEl).select2({!! $select2Config() !!});

        // Store select2 instance for programmatic access
        selectEl.select2Instance = jQuery(selectEl).data('select2');
    }
});
</script>
@endpush

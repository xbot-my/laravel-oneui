@if($label)
    <label class="form-label" for="{{ $id }}">{{ $label }}</label>
@endif

<div class="oneui-color-picker {{ $inline ? 'd-inline-flex' : '' }}" @if($inline) style="display: inline-flex; align-items: center; gap: 10px;" @endif>
    {{-- Color Input --}}
    <input
        type="color"
        {{ $attributes->merge([
            'name' => $name,
            'id' => $id,
            'value' => $value,
        ]) }}
        class="form-control form-control-color"
        style="height: 38px; width: 60px; padding: 2px;"
        {{ $disabled ? 'disabled' : '' }}
    >

    @if($showHexInput)
    {{-- Hex Input --}}
    <input
        type="text"
        id="{{ $id }}-hex"
        class="form-control"
        value="{{ $value }}"
        maxlength="7"
        pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$"
        placeholder="#000000"
        {{ $disabled ? 'disabled' : '' }}
        style="max-width: 100px;"
    >
    @endif

    @if($showPreview)
    {{-- Color Preview --}}
    <div
        id="{{ $id }}-preview"
        class="color-preview"
        style="width: 38px; height: 38px; border-radius: 4px; border: 1px solid #e5e7eb; background-color: {{ $value }};"
    ></div>
    @endif
</div>

@if(!empty($presets))
    {{-- Color Presets --}}
    <div class="color-presets mt-2 d-flex flex-wrap gap-1">
        @foreach($getPresets() as $color)
        <button
            type="button"
            class="color-preset-btn"
            data-color="{{ $color }}"
            data-target="{{ $id }}"
            style="width: 24px; height: 24px; border-radius: 4px; border: 1px solid #e5e7eb; background-color: {{ $color }}; cursor: pointer;"
            @if($disabled) disabled @endif
        ></button>
        @endforeach
    </div>
@endif

<script>
(function() {
    const colorInput = document.getElementById('{{ $id }}');
    const hexInput = document.getElementById('{{ $id }}-hex');
    const preview = document.getElementById('{{ $id }}-preview');

    // Sync color input with hex input
    if (colorInput && hexInput) {
        colorInput.addEventListener('input', function() {
            hexInput.value = this.value;
            if (preview) preview.style.backgroundColor = this.value;
        });

        hexInput.addEventListener('input', function() {
            if (/^#[0-9A-Fa-f]{6}$/.test(this.value)) {
                colorInput.value = this.value;
                if (preview) preview.style.backgroundColor = this.value;
            }
        });

        hexInput.addEventListener('blur', function() {
            if (!/^#[0-9A-Fa-f]{6}$/.test(this.value)) {
                this.value = colorInput.value;
            }
        });
    }

    // Preset buttons
    document.querySelectorAll('.color-preset-btn[data-target="{{ $id }}"]').forEach(function(btn) {
        btn.addEventListener('click', function() {
            const color = this.getAttribute('data-color');
            colorInput.value = color;
            if (hexInput) hexInput.value = color;
            if (preview) preview.style.backgroundColor = color;

            // Trigger change event
            colorInput.dispatchEvent(new Event('input', { bubbles: true }));
            colorInput.dispatchEvent(new Event('change', { bubbles: true }));
        });
    });
})();
</script>

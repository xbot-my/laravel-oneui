@if($label)
    <div class="{{ $wrapperClasses() }}">
        <input {{ $attributes->merge(['name' => $name, 'id' => $id, 'type' => 'checkbox', 'value' => $value])->class($inputClasses()) }}
            @if($checked) checked @endif
            @if($disabled) disabled @endif>
        <label class="form-check-label" for="{{ $id }}">
            {{ $label }}
            @if($description)
                <span class="form-check-label-description d-block text-muted small">{{ $description }}</span>
            @endif
        </label>
    </div>
@else
    <input {{ $attributes->merge(['name' => $name, 'id' => $id, 'type' => 'checkbox', 'value' => $value])->class($inputClasses()) }}
        @if($checked) checked @endif
        @if($disabled) disabled @endif>
@endif

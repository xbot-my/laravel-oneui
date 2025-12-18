@if($label)
    <label class="form-label" for="{{ $id }}">{{ $label }}</label>
@endif
<select {{ $attributes->merge(['class' => 'js-select2 form-select']) }}
        id="{{ $id }}"
        name="{{ $name }}{{ $multiple ? '[]' : '' }}"
        @if($multiple) multiple @endif
        @if($placeholder) data-placeholder="{{ $placeholder }}" @endif
        @if($allowClear) data-allow-clear="true" @endif
        @if($tags) data-tags="true" @endif
        @if($ajax) data-ajax-url="{{ $ajax }}" @endif
        style="width: 100%;">
    @if($placeholder && !$multiple)
        <option></option>
    @endif
    @foreach($options as $key => $option)
        @if(is_array($option) && isset($option['options']))
            {{-- Option Group --}}
            <optgroup label="{{ $option['label'] ?? $key }}">
                @foreach($option['options'] as $optKey => $optValue)
                    <option value="{{ $optKey }}"
                        @if(is_array($value) ? in_array($optKey, $value) : $optKey == $value) selected @endif>
                        {{ $optValue }}
                    </option>
                @endforeach
            </optgroup>
        @else
            <option value="{{ $key }}"
                @if(is_array($value) ? in_array($key, $value) : $key == $value) selected @endif>
                {{ $option }}
            </option>
        @endif
    @endforeach
</select>

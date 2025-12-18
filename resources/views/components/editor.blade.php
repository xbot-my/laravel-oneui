@if($label)
    <label class="form-label" for="{{ $id }}">{{ $label }}</label>
@endif
@if($type === 'ckeditor')
    <textarea {{ $attributes->merge(['class' => 'js-ckeditor']) }} id="{{ $id }}" name="{{ $name }}" @if($placeholder)
    placeholder="{{ $placeholder }}" @endif>{{ $value ?? old($name) }}</textarea>
@elseif($type === 'simplemde')
    <textarea {{ $attributes->merge(['class' => 'js-simplemde']) }} id="{{ $id }}" name="{{ $name }}" @if($placeholder)
    placeholder="{{ $placeholder }}" @endif>{{ $value ?? old($name) }}</textarea>
@else
    <textarea {{ $attributes->merge(['class' => 'js-summernote']) }} id="{{ $id }}" name="{{ $name }}"
        data-height="{{ $height }}" @if($placeholder) placeholder="{{ $placeholder }}"
        @endif>{{ $value ?? old($name) }}</textarea>
@endif
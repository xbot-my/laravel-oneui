<div {{ $attributes->except(['name', 'id', 'value'])->class([
    'form-check',
    'form-check-inline' => $inline,
]) }}>
    <input class="form-check-input" type="radio" name="{{ $name }}" id="{{ $id }}" value="{{ $value }}" @if($checked)
    checked @endif @if($disabled) disabled @endif>
    @if($label)
        <label class="form-check-label" for="{{ $id }}">{{ $label }}</label>
    @endif
</div>
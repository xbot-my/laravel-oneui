@if($label)
    <label class="form-label" for="{{ $id }}">{{ $label }}</label>
@endif
<input type="text" {{ $attributes->merge(['class' => 'js-datepicker form-control']) }} id="{{ $id }}" name="{{ $name }}"
    value="{{ $value ?? old($name) }}" placeholder="{{ $placeholder ?? $format }}" data-date-format="{{ $format }}"
    data-autoclose="{{ $autoclose ? 'true' : 'false' }}" data-today-highlight="{{ $todayHighlight ? 'true' : 'false' }}"
    @if($startDate) data-start-date="{{ $startDate }}" @endif @if($endDate) data-end-date="{{ $endDate }}" @endif>
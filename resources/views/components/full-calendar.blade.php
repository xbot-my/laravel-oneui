<div {{ $attributes->merge(['class' => 'js-full-calendar']) }} id="{{ $id }}"></div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const calendarEl = document.getElementById('{{ $id }}');

    if (calendarEl && typeof FullCalendar !== 'undefined') {
        const calendar = new FullCalendar.Calendar(calendarEl, {!! $calendarOptions() !!});
        calendar.render();
    }
});
</script>

@if(!$toast)
    <button {{ $attributes->merge(['class' => 'btn btn-primary']) }} onclick="{{ $id }}_fire()">
        {{ $title ?? 'Show Alert' }}
    </button>
@endif

<script>
@if(isset($GLOBALS['sweet_alert2_inited']) && $GLOBALS['sweet_alert2_inited'])
@else
    @php
        $GLOBALS['sweet_alert2_inited'] = true;
    @endphp
@endif

function {{ $id }}_fire() {
    if (typeof Swal !== 'undefined') {
        Swal.fire({!! $swalOptions() !!});
    } else {
        console.error('SweetAlert2 is not loaded');
    }
}

@if($toast)
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            {{ $id }}_fire();
        }, 100);
    });
@endif
</script>

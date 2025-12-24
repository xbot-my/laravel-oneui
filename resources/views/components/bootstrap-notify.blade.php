<script>
@if(isset($GLOBALS['bootstrap_notify_inited']) && $GLOBALS['bootstrap_notify_inited'])
@else
    @php
        $GLOBALS['bootstrap_notify_inited'] = true;
    @endphp
@endif

document.addEventListener('DOMContentLoaded', function() {
    @if($message)
        if (typeof $ !== 'undefined' && $.notify) {
            $.notify({!! $notifyOptions() !!});
        } else {
            console.error('Bootstrap Notify is not loaded');
        }
    @endif
});
</script>

@if(!$message)
    <button {{ $attributes->merge(['class' => 'btn btn-' . $type]) }} onclick="showNotify_{{ $id }}()">
        Show {{ ucfirst($type) }} Notification
    </button>

    <script>
    function showNotify_{{ $id }}() {
        if (typeof $ !== 'undefined' && $.notify) {
            $.notify({!! $notifyOptions() !!});
        } else {
            console.error('Bootstrap Notify is not loaded');
        }
    }
    </script>
@endif

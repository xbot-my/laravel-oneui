@php
    $theme = $editorTheme ?? 'easymde';
    $minHeight = $editorMinHeight ?? '300px';
@endphp
@if($label)
    <label class="form-label" for="{{ $id ?? $name }}">{{ $label }}</label>
@endif

<textarea name="{{ $name }}" id="{{ $id ?? $name }}" {{ $attributes->except(['name', 'id']) }} class="simplemde-textarea">{{ $value ?? '' }}</textarea>

@if(!$theme || $theme === 'easymde')
    <link rel="stylesheet" href="{{ asset('vendor/oneui/js/plugins/simplemde/css/simplemde.min.css') }}">
@endif

<script>
@if(isset($GLOBALS['simplemde_inited']) && $GLOBALS['simplemde_inited'])
@else
    @php
        $GLOBALS['simplemde_inited'] = true;
    @endphp
@endif

document.addEventListener('DOMContentLoaded', function() {
    const textarea = document.getElementById('{{ $id ?? $name }}');

    if (textarea && typeof SimpleMDE !== 'undefined') {
        const options = {!! $editorOptions() !!};
        options.element = textarea;

        const simplemde = new SimpleMDE(options);

        // Store instance for external access
        textarea.simplemdeInstance = simplemde;
    } else if (typeof SimpleMDE === 'undefined') {
        console.error('SimpleMDE is not loaded');
    }
});
</script>

<style>
.simplemde-textarea {
    display: none;
}

.CodeMirror {
    min-height: {{ $minHeight }};
    border-radius: 0.375rem;
}

.editor-toolbar {
    border-top-left-radius: 0.375rem;
    border-top-right-radius: 0.375rem;
}

.CodeMirror-wrap {
    border-bottom-left-radius: 0.375rem;
    border-bottom-right-radius: 0.375rem;
}
</style>

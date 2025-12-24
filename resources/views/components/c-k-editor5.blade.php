@if($label)
    <label class="form-label" for="{{ $id }}">{{ $label }}</label>
@endif

@if($mode === 'inline')
    <div {{ $attributes->merge(['id' => $id]) }} class="ck-editor-inline">{{ $value ?? '' }}</div>
@else
    <textarea {{ $attributes->merge(['name' => $name, 'id' => $id]) }} class="form-control">{{ $value ?? '' }}</textarea>
@endif

<style>
.ck-editor__editable {
    min-height: {{ $height }}px;
}
</style>

<script>
@if(isset($GLOBALS['ckeditor5_classic_loaded']) && $GLOBALS['ckeditor5_classic_loaded'])
@else
    @php
        $GLOBALS['ckeditor5_classic_loaded'] = true;
    @endphp
@endif

document.addEventListener('DOMContentLoaded', function() {
    const editorEl = document.getElementById('{{ $id }}');

    if (editorEl && typeof ClassicEditor !== 'undefined') {
        const plugins = {{ $getPlugins() }};

        // Dynamically build the editor config
        const config = {!! $editorConfig() !!};

        @if($mode === 'inline')
            ClassicEditor
                .create(editorEl, Object.assign({ toolbar: [] }, config))
                .then(editor => {
                    editor.ui.view.editable.element.parentElement.classList.add('ck-editor-inline');
                    editorEl.editorInstance = editor;

                    // Add hidden input for form submission
                    const hiddenInput = document.createElement('textarea');
                    hiddenInput.name = '{{ $name }}';
                    hiddenInput.style.display = 'none';
                    hiddenInput.id = '{{ $id }}_input';
                    editorEl.parentNode.insertBefore(hiddenInput, editorEl.nextSibling);

                    // Update hidden input on change
                    editor.model.document.on('change:data', () => {
                        hiddenInput.value = editor.getData();
                    });
                })
                .catch(error => {
                    console.error('CKEditor5 init error:', error);
                });
        @else
            ClassicEditor
                .create(editorEl, config)
                .then(editor => {
                    editorEl.editorInstance = editor;
                })
                .catch(error => {
                    console.error('CKEditor5 init error:', error);
                });
        @endif
    } else if (typeof ClassicEditor === 'undefined') {
        console.error('CKEditor5 Classic is not loaded');
    }
});
</script>

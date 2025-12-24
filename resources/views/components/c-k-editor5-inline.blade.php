@if($label)
    <label class="form-label" for="{{ $id }}">{{ $label }}</label>
@endif

{{-- CKEditor5 Inline Container --}}
<div {{ $attributes->merge(['id' => $id]) }} class="ck-editor-inline">{{ $value ?? 'Click to edit...' }}</div>

{{-- Hidden input for form submission --}}
<input type="hidden" name="{{ $name }}" id="{{ $id }}_input" value="{{ $value ?? '' }}">

<style>
.ck-editor-inline {
    min-height: {{ $height }}px;
    padding: 10px;
    border: 1px solid #e5e7eb;
    border-radius: 4px;
}
.ck-editor-inline:focus {
    outline: none;
    border-color: #0d6efd;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const editorEl = document.getElementById('{{ $id }}');
    const hiddenInput = document.getElementById('{{ $id }}_input');

    if (editorEl && typeof InlineEditor !== 'undefined') {
        const plugins = {{ $getPlugins() }};
        const config = {!! $editorConfig() !!};

        InlineEditor
            .create(editorEl, config)
            .then(editor => {
                editorEl.editorInstance = editor;

                // Update hidden input on change
                editor.model.document.on('change:data', () => {
                    if (hiddenInput) {
                        hiddenInput.value = editor.getData();
                    }
                });
            })
            .catch(error => {
                console.error('CKEditor5 Inline init error:', error);
            });
    } else if (typeof InlineEditor === 'undefined' && typeof ClassicEditor !== 'undefined') {
        // Fallback to ClassicEditor in inline mode
        ClassicEditor
            .create(editorEl, Object.assign({ toolbar: ['bold', 'italic', 'link'] }, {!! $editorConfig() !!}))
            .then(editor => {
                editor.ui.view.editable.element.parentElement.classList.add('ck-editor-inline');
                editorEl.editorInstance = editor;

                // Update hidden input on change
                editor.model.document.on('change:data', () => {
                    if (hiddenInput) {
                        hiddenInput.value = editor.getData();
                    }
                });
            })
            .catch(error => {
                console.error('CKEditor5 Inline init error:', error);
            });
    }
});
</script>

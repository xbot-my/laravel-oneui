<div class="syntax-highlight-wrapper mb-3">
    <div class="syntax-highlight-header">
        <span class="syntax-highlight-language">{{ $language === 'auto' ? 'Auto' : ucfirst($language) }}</span>
        @if($showLineNumbers)
            <span class="syntax-highlight-lines">Lines: {{ $startFrom }}-{{ $startFrom + substr_count($getCode(), "\n") }}</span>
        @endif
    </div>
    <pre{{ $showLineNumbers ? ' class="hljs-line-numbers"' : '' }}><code {{ $attributes->merge(['class' => $getCodeClasses()]) }} data-language="{{ $language }}">{{ e($getCode()) }}</code></pre>
</div>

<style>
.syntax-highlight-wrapper {
    border-radius: 0.5rem;
    overflow: hidden;
    background-color: #282c34;
}

.syntax-highlight-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.5rem 1rem;
    background-color: #21252b;
    border-bottom: 1px solid #3e4451;
}

.syntax-highlight-language {
    font-size: 0.75rem;
    font-weight: 600;
    color: #5c6370;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

.syntax-highlight-lines {
    font-size: 0.75rem;
    color: #5c6370;
}

.syntax-highlight-wrapper pre {
    margin: 0;
    padding: 1rem;
    border-radius: 0;
    background-color: transparent;
}

.syntax-highlight-wrapper code {
    font-family: 'Fira Code', 'Monaco', 'Consolas', 'Ubuntu Mono', monospace;
    font-size: 0.875rem;
    line-height: 1.6;
}

/* Line numbers */
.hljs-line-numbers {
    position: relative;
    padding-left: 3.5em !important;
    counter-reset: line;
}

.hljs-line-numbers > span {
    position: relative;
    display: block;
}

.hljs-line-numbers > span:before {
    content: counter(line);
    counter-increment: line;
    position: absolute;
    left: -3em;
    width: 2.5em;
    text-align: right;
    color: #5c6370;
    font-size: 0.75rem;
    line-height: 1.6;
}
</style>

<link rel="stylesheet" href="{{ asset('vendor/oneui/js/plugins/highlightjs/styles/' . $theme . '.css') }}">

<script>
@if(isset($GLOBALS['syntax_highlight_inited']) && $GLOBALS['syntax_highlight_inited'])
@else
    @php
        $GLOBALS['syntax_highlight_inited'] = true;
    @endphp
@endif

document.addEventListener('DOMContentLoaded', function() {
    if (typeof hljs !== 'undefined') {
        hljs.highlightAll();

        // Add line numbers
        @if($showLineNumbers)
            document.querySelectorAll('.hljs-line-numbers code').forEach((block) => {
                const lines = block.innerHTML.split('\n');
                if (lines.length > 1) {
                    const numberedLines = lines.map((line, index) => {
                        return '<span>' + (line || '&nbsp;') + '</span>';
                    });
                    block.innerHTML = numberedLines.join('\n');
                }
            });
        @endif
    } else {
        console.error('highlight.js is not loaded');
    }
});
</script>

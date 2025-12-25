@php
$title = 'Editor Examples';
$heading = '<h2 class="content-heading">Rich Text & Code Editors</h2>';
@endphp

@extends('oneui::examples._base')

@section('title', $title)
@section('heading', $heading)

@section('content')
    {{-- CKEditor Classic --}}
    @php
        $ckeditorCode = <<<'CODE'
	<x-oneui::ck-editor name="content" label="Content" :value="'Default content'" />
	CODE;
    @endphp
    <x-oneui::code-example title="CKEditor Classic" :code="$ckeditorCode">
        <x-oneui::ck-editor name="content" label="Content" value="<h1>Hello World</h1><p>Start writing...</p>" />
    </x-oneui::code-example>

    {{-- SimpleMDE --}}
    @php
        $simpleMdeCode = <<<'CODE'
	<x-oneui::simple-mde name="markdown" label="Markdown" />
	CODE;
    @endphp
    <x-oneui::code-example title="SimpleMDE Markdown Editor" :code="$simpleMdeCode">
        <x-oneui::simple-mde name="markdown" label="Markdown Content" placeholder="Write in Markdown..." />
    </x-oneui::code-example>

    {{-- Code Highlight --}}
    @php
        $codeHighlightCode = <<<'CODE'
	<x-oneui::code-highlight language="php">
		{{ $code }}
	</x-oneui::code-highlight>
	CODE;
    @endphp
    <x-oneui::code-example title="Code Highlight" :code="$codeHighlightCode">
        <x-oneui::code-highlight language="php">
            {{ <<<'CODE'
function greet($name) {
    return "Hello, {$name}!";
}

echo greet("World");
CODE
            }}
        </x-oneui::code-highlight>
    </x-oneui::code-example>
@endsection

@php
$title = 'File Upload Examples';
$heading = '<h2 class="content-heading">File Upload Components</h2>';
@endphp

@extends('oneui::examples._base')

@section('title', $title)
@section('heading', $heading)

@section('content')
    {{-- File Input --}}
    @php
        $fileInputCode = <<<'CODE'
	<x-oneui::file-input name="avatar" label="Profile Picture" />
	<x-oneui::file-input name="documents" label="Multiple Files" :multiple="true" />
	CODE;
    @endphp
    <x-oneui::code-example title="File Input" :code="$fileInputCode">
        <x-oneui::file-input name="avatar" label="Profile Picture" accept="image/*" />
        <x-oneui::file-input name="documents" label="Multiple Files" :multiple="true" accept=".pdf,.doc,.docx" />
    </x-oneui::code-example>

    {{-- Dropzone --}}
    @php
        $dropzoneCode = <<<'CODE'
	<x-oneui::dropzone name="files" label="Drag & Drop Files Here" :multiple="true" />
	CODE;
    @endphp
    <x-oneui::code-example title="Dropzone File Upload" :code="$dropzoneCode">
        <x-oneui::dropzone name="files" label="Drag & drop files here or click to browse" :multiple="true" />
    </x-oneui::code-example>

    {{-- Image Cropper --}}
    @php
        $imageCropperCode = <<<'CODE'
	<x-oneui::image-cropper name="photo" label="Upload & Crop Photo" />
	CODE;
    @endphp
    <x-oneui::code-example title="Image Cropper" :code="$imageCropperCode">
        <x-oneui::image-cropper name="photo" label="Upload & Crop Profile Photo" />
    </x-oneui::code-example>
@endsection

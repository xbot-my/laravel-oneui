@php
$title = 'List Components Examples';
$heading = '<h2 class="content-heading">List Components</h2>';
@endphp

@extends('oneui::examples._base')

@section('title', $title)
@section('heading', $heading)

@section('content')
    {{-- DataList --}}
    @php
        $dataListCode = <<<'CODE'
	<x-oneui::data-list :data="[
		['title' => 'Item 1', 'description' => 'Description 1'],
		['title' => 'Item 2', 'description' => 'Description 2'],
	]" />
	CODE;
    @endphp
    <x-oneui::code-example title="Data List" :code="$dataListCode">
        <x-oneui::data-list :data="[
            ['title' => 'Item 1', 'description' => 'Description 1'],
            ['title' => 'Item 2', 'description' => 'Description 2'],
            ['title' => 'Item 3', 'description' => 'Description 3'],
        ]" />
    </x-oneui::code-example>

    {{-- Tree --}}
    @php
        $treeCode = <<<'CODE'
	<x-oneui::tree :data="[
		['label' => 'Parent 1', 'children' => [
			['label' => 'Child 1.1'],
			['label' => 'Child 1.2'],
		]],
		['label' => 'Parent 2'],
	]" />
	CODE;
    @endphp
    <x-oneui::code-example title="Tree" :code="$treeCode">
        <div style="max-width: 300px;">
            <x-oneui::tree :data="[
                ['label' => 'Documents', 'children' => [
                    ['label' => 'Report.pdf'],
                    ['label' => 'Budget.xlsx'],
                ]],
                ['label' => 'Projects', 'children' => [
                    ['label' => 'Project Alpha'],
                    ['label' => 'Project Beta'],
                ]],
                ['label' => 'Archive'],
            ]" />
        </div>
    </x-oneui::code-example>

    {{-- Timeline --}}
    @php
        $timelineCode = <<<'CODE'
	<x-oneui::timeline :items="[
		['title' => 'Event 1', 'content' => 'Description 1', 'time' => '10:00'],
		['title' => 'Event 2', 'content' => 'Description 2', 'time' => '11:00'],
	]" />
	CODE;
    @endphp
    <x-oneui::code-example title="Timeline" :code="$timelineCode">
        <x-oneui::timeline :items="[
            ['title' => 'Project Started', 'content' => 'Initial kickoff meeting', 'time' => '10:00'],
            ['title' => 'Design Phase', 'content' => 'UI/UX design completed', 'time' => '14:00'],
            ['title' => 'Development', 'content' => 'Backend API development', 'time' => '16:30'],
        ]" />
    </x-oneui::code-example>

    {{-- Carousel --}}
    @php
        $carouselCode = <<<'CODE'
	<x-oneui::carousel id="my-carousel">
		<x-slot:slides>
			<div class="carousel-item">Slide 1</div>
			<div class="carousel-item">Slide 2</div>
		</x-slot:slides>
	</x-oneui::carousel>
	CODE;
    @endphp
    <x-oneui::code-example title="Carousel" :code="$carouselCode">
        <x-oneui::carousel id="example-carousel">
            <div class="bg-primary text-white p-5 rounded text-center">Slide 1</div>
            <div class="bg-success text-white p-5 rounded text-center">Slide 2</div>
            <div class="bg-info text-white p-5 rounded text-center">Slide 3</div>
        </x-oneui::carousel>
    </x-oneui::code-example>
@endsection

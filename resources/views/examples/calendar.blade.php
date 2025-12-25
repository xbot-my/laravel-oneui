@php
$title = 'Calendar Examples';
$heading = '<h2 class="content-heading">FullCalendar Component</h2>';
@endphp

@extends('oneui::examples._base')

@section('title', $title)
@section('heading', $heading)

@section('content')
    {{-- Basic Calendar --}}
    @php
        $calendarCode = <<<'CODE'
	<x-oneui::full-calendar id="calendar-basic" :events="[]" />
	CODE;
    @endphp
    <x-oneui::code-example title="Basic Calendar" :code="$calendarCode">
        <x-oneui::full-calendar id="calendar-basic" :events="[]" />
    </x-oneui::code-example>

    {{-- Calendar with Events --}}
    @php
        $calendarEventsCode = <<<'CODE'
	<x-oneui::full-calendar id="calendar-events" :events="[
		['title' => 'Meeting', 'start' => '2024-01-01'],
		['title' => 'Conference', 'start' => '2024-01-05', 'end' => '2024-01-07'],
	]" />
	CODE;
    @endphp
    <x-oneui::code-example title="Calendar with Events" :code="$calendarEventsCode">
        <x-oneui::full-calendar id="calendar-events" :events="[
            ['title' => 'Team Meeting', 'start' => today(), 'color' => 'primary'],
            ['title' => 'Project Deadline', 'start' => now()->addDays(3), 'color' => 'danger'],
            ['title' => 'Conference', 'start' => now()->addDays(7), 'end' => now()->addDays(9), 'color' => 'success'],
        ]" />
    </x-oneui::code-example>
@endsection

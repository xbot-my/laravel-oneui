@php
$title = 'Advanced Form Examples';
$heading = '<h2 class="content-heading">Advanced Form Components</h2>';
@endphp

@extends('oneui::examples._base')

@section('title', $title)
@section('heading', $heading)

@section('content')
    {{-- Range Slider --}}
    @php
        $rangeCode = <<<'CODE'
	<x-oneui::range name="volume" min="0" max="100" :from="30" />
	<x-oneui::range name="price" min="0" max="1000" :from="200" :to="800" type="double" prefix="$" />
	CODE;
    @endphp
    <x-oneui::code-example title="Range Sliders" :code="$rangeCode">
        <div class="mb-4">
            <label class="form-label">Volume</label>
            <x-oneui::range name="volume" min="0" max="100" :from="30" />
        </div>
        <div class="mb-4">
            <label class="form-label">Price Range</label>
            <x-oneui::range name="price" min="0" max="1000" :from="200" :to="800" type="double" prefix="$" />
        </div>
        <div class="mb-4">
            <label class="form-label">Brightness</label>
            <x-oneui::range name="brightness" min="0" max="100" :from="50" postfix="%" />
        </div>
    </x-oneui::code-example>

    {{-- Rating --}}
    @php
        $ratingCode = <<<'CODE'
	<x-oneui::rating name="rating" :score="3" />
	<x-oneui::rating name="product" :score="4.5" :half="true" :number="10" />
	<x-oneui::rating name="service" :score="5" :readonly="true" />
	CODE;
    @endphp
    <x-oneui::code-example title="Ratings" :code="$ratingCode">
        <div class="mb-3">
            <label class="form-label">Rating (5 stars)</label>
            <x-oneui::rating name="rating" :score="3" />
        </div>
        <div class="mb-3">
            <label class="form-label">Product (10 stars, half allowed)</label>
            <x-oneui::rating name="product" :score="4.5" :half="true" :number="10" />
        </div>
        <div class="mb-3">
            <label class="form-label">Service (Readonly)</label>
            <x-oneui::rating name="service" :score="5" :readonly="true" />
        </div>
    </x-oneui::code-example>

    {{-- Input Mask --}}
    @php
        $inputMaskCode = <<<'CODE'
	<x-oneui::input-mask name="phone" mask="phone" label="Phone" />
	<x-oneui::input-mask name="date" mask="date" label="Date" />
	<x-oneui::input-mask name="ssn" mask="ssn" label="SSN" />
	CODE;
    @endphp
    <x-oneui::code-example title="Input Masks" :code="$inputMaskCode">
        <div class="row">
            <div class="col-md-4">
                <x-oneui::input-mask name="phone" mask="phone" label="Phone" />
            </div>
            <div class="col-md-4">
                <x-oneui::input-mask name="date" mask="date" label="Date" />
            </div>
            <div class="col-md-4">
                <x-oneui::input-mask name="ssn" mask="ssn" label="SSN" />
            </div>
        </div>
    </x-oneui::code-example>

    {{-- Max Length --}}
    @php
        $maxLengthCode = <<<'CODE'
	<x-oneui::max-length name="title" :limit="55" label="Title" :show-text="true" />
	<x-oneui::max-length name="bio" :limit="200" label="Bio" :always-show="true" :textarea="true" :rows="3" />
	CODE;
    @endphp
    <x-oneui::code-example title="Character Counters" :code="$maxLengthCode">
        <div class="mb-4">
            <x-oneui::max-length name="title" :limit="55" label="Title" :show-text="true" />
        </div>
        <div class="mb-4">
            <x-oneui::max-length name="bio" :limit="200" label="Bio" :always-show="true" :textarea="true" :rows="3" />
        </div>
    </x-oneui::code-example>

    {{-- Date Picker --}}
    @php
        $datePickerCode = <<<'CODE'
	<x-oneui::date-picker name="birthday" label="Birthday" />
	<x-oneui::date-picker name="range" label="Date Range" :range="true" />
	CODE;
    @endphp
    <x-oneui::code-example title="Date Pickers" :code="$datePickerCode">
        <div class="row">
            <div class="col-md-6">
                <x-oneui::date-picker name="birthday" label="Birthday" placeholder="Select date" />
            </div>
            <div class="col-md-6">
                <x-oneui::date-picker name="range" label="Date Range" :range="true" />
            </div>
        </div>
    </x-oneui::code-example>

    {{-- Select2 --}}
    @php
        $select2Code = <<<'CODE'
	<x-oneui::select2 name="category" label="Category" :options="['tech' => 'Technology', 'design' => 'Design']" />
	<x-oneui::select2 name="tags" label="Tags" :multiple="true" :options="['php' => 'PHP', 'js' => 'JavaScript']" />
	CODE;
    @endphp
    <x-oneui::code-example title="Select2 Dropdowns" :code="$select2Code">
        <div class="mb-4">
            <x-oneui::select2 name="category" label="Category" :options="['tech' => 'Technology', 'design' => 'Design', 'business' => 'Business']" placeholder="Select category" />
        </div>
        <div class="mb-4">
            <x-oneui::select2 name="tags" label="Tags" :multiple="true" :options="['php' => 'PHP', 'js' => 'JavaScript', 'css' => 'CSS']" placeholder="Select tags" />
        </div>
    </x-oneui::code-example>

    {{-- Floating Label --}}
    @php
        $floatingLabelCode = <<<'CODE'
	<x-oneui::floating-label name="email" type="email" label="Email Address" />
	<x-oneui::floating-label name="password" type="password" label="Password" />
	CODE;
    @endphp
    <x-oneui::code-example title="Floating Labels" :code="$floatingLabelCode">
        <div class="mb-4">
            <x-oneui::floating-label name="email" type="email" label="Email Address" />
        </div>
        <div class="mb-4">
            <x-oneui::floating-label name="password" type="password" label="Password" />
        </div>
    </x-oneui::code-example>

    {{-- Validation --}}
    @php
        $validationCode = <<<'CODE'
	<x-oneui::validation :messages="['name' => 'Name is required', 'email' => 'Email must be valid']" />
	CODE;
    @endphp
    <x-oneui::code-example title="Validation Messages" :code="$validationCode">
        <x-oneui::validation :messages="['name' => 'Name is required', 'email' => 'Email must be valid', 'password' => 'Password must be at least 8 characters']" />
    </x-oneui::code-example>
@endsection

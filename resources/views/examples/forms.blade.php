@php
$title = 'Form Examples';
$heading = '<h2 class="content-heading">Form Components</h2>';
@endphp

@extends('oneui::examples._base')

@section('title', $title)
@section('heading', $heading)

@section('content')
    {{-- Buttons --}}
    <h3 class="fs-5 mb-3">Buttons</h3>

    @php
        $basicButtonCode = '<x-oneui::button type="primary">Primary</x-oneui::button>
<x-oneui::button type="secondary">Secondary</x-oneui::button>
<x-oneui::button type="success">Success</x-oneui::button>
<x-oneui::button type="info">Info</x-oneui::button>
<x-oneui::button type="warning">Warning</x-oneui::button>
<x-oneui::button type="danger">Danger</x-oneui::button>';
    @endphp
    <x-oneui::code-example title="Basic Buttons" :code="$basicButtonCode">
        <x-oneui::button type="primary">Primary</x-oneui::button>
        <x-oneui::button type="secondary">Secondary</x-oneui::button>
        <x-oneui::button type="success">Success</x-oneui::button>
        <x-oneui::button type="info">Info</x-oneui::button>
        <x-oneui::button type="warning">Warning</x-oneui::button>
        <x-oneui::button type="danger">Danger</x-oneui::button>
    </x-oneui::code-example>

    @php
        $outlineButtonCode = '<x-oneui::button type="primary" :outline="true">Primary</x-oneui::button>
<x-oneui::button type="success" :outline="true">Success</x-oneui::button>
<x-oneui::button type="danger" :outline="true">Danger</x-oneui::button>';
    @endphp
    <x-oneui::code-example title="Outline Buttons" :code="$outlineButtonCode">
        <x-oneui::button type="primary" :outline="true">Primary</x-oneui::button>
        <x-oneui::button type="success" :outline="true">Success</x-oneui::button>
        <x-oneui::button type="danger" :outline="true">Danger</x-oneui::button>
    </x-oneui::code-example>

    @php
        $buttonSizeCode = '<x-oneui::button type="primary" size="lg">Large</x-oneui::button>
<x-oneui::button type="primary">Normal</x-oneui::button>
<x-oneui::button type="primary" size="sm">Small</x-oneui::button>';
    @endphp
    <x-oneui::code-example title="Button Sizes" :code="$buttonSizeCode">
        <x-oneui::button type="primary" size="lg">Large</x-oneui::button>
        <x-oneui::button type="primary">Normal</x-oneui::button>
        <x-oneui::button type="primary" size="sm">Small</x-oneui::button>
    </x-oneui::code-example>

    <h2 class="content-heading">Input Fields</h2>

    {{-- Input --}}
    @php
        $inputCode = '<x-oneui::input name="text" label="Text Input" placeholder="Enter text..." />
<x-oneui::input name="email" label="Email" type="email" placeholder="Enter email" />
<x-oneui::input name="password" label="Password" type="password" placeholder="Enter password" />';
    @endphp
    <x-oneui::code-example title="Input" :code="$inputCode">
        <x-oneui::input name="text" label="Text Input" placeholder="Enter text..."/>
        <x-oneui::input name="email" label="Email" type="email" placeholder="Enter email"/>
        <x-oneui::input name="password" label="Password" type="password" placeholder="Enter password"/>
    </x-oneui::code-example>

    {{-- Input Sizes --}}
    @php
        $sizeCode = '<x-oneui::input name="sm" label="Small" size="sm" placeholder="form-control-sm" />
<x-oneui::input name="normal" label="Normal" placeholder="Normal size" />
<x-oneui::input name="lg" label="Large" size="lg" placeholder="form-control-lg" />';
    @endphp
    <x-oneui::code-example title="Input Sizes" :code="$sizeCode">
        <x-oneui::input name="sm" label="Small" size="sm" placeholder="form-control-sm"/>
        <x-oneui::input name="normal" label="Normal" placeholder="Normal size"/>
        <x-oneui::input name="lg" label="Large" size="lg" placeholder="form-control-lg"/>
    </x-oneui::code-example>

    {{-- Input with Validation --}}
    @php
        $validCode = '<x-oneui::input name="valid_demo" label="Valid" :valid="true" value="Valid input" />
<x-oneui::input name="error_demo" label="Invalid" error="This field is required" />';
    @endphp
    <x-oneui::code-example title="Validation States" :code="$validCode">
        <x-oneui::input name="valid_demo" label="Valid" :valid="true" value="Valid input"/>
        <x-oneui::input name="error_demo" label="Invalid" error="This field is required"/>
    </x-oneui::code-example>

    {{-- Select --}}
    @php
        $selectCode = '<x-oneui::select name="country" label="Country" :options="[\'us\' => \'United States\', \'my\' => \'Malaysia\', \'sg\' => \'Singapore\']" />';
    @endphp
    <x-oneui::code-example title="Select" :code="$selectCode">
        <x-oneui::select name="country" label="Country" :options="['us' => 'United States', 'my' => 'Malaysia', 'sg' => 'Singapore']"/>
    </x-oneui::code-example>

    {{-- Textarea --}}
    @php
        $textareaCode = '<x-oneui::textarea name="bio" label="Bio" placeholder="Tell us about yourself..." />';
    @endphp
    <x-oneui::code-example title="Textarea" :code="$textareaCode">
        <x-oneui::textarea name="bio" label="Bio" placeholder="Tell us about yourself..."/>
    </x-oneui::code-example>

    <h2 class="content-heading">Checkboxes & Radios</h2>

    {{-- Checkbox --}}
    @php
        $checkCode = '<x-oneui::checkbox name="check1" label="Option 1" :checked="true" />
<x-oneui::checkbox name="check2" label="Option 2" />
<x-oneui::checkbox name="check3" label="Disabled" :disabled="true" />';
    @endphp
    <x-oneui::code-example title="Checkboxes" :code="$checkCode">
        <x-oneui::checkbox name="check1" label="Option 1" :checked="true"/>
        <x-oneui::checkbox name="check2" label="Option 2"/>
        <x-oneui::checkbox name="check3" label="Disabled" :disabled="true"/>
    </x-oneui::code-example>

    {{-- Toggle Switch --}}
    @php
        $toggleSwitchCompCode = '<x-oneui::toggle-switch name="notifications" label="Notifications" :checked="true" />
<x-oneui::toggle-switch name="dark_mode" label="Dark Mode" description="Enable dark theme" />
<x-oneui::toggle-switch name="status" label="Online Status" color="success" />';
    @endphp
    <x-oneui::code-example title="Toggle Switch" :code="$toggleSwitchCompCode">
        <div class="mb-3">
            <x-oneui::toggle-switch name="notifications" label="Notifications" :checked="true"/>
        </div>
        <div class="mb-3">
            <x-oneui::toggle-switch name="dark_mode" label="Dark Mode" description="Enable dark theme"/>
        </div>
        <x-oneui::toggle-switch name="status" label="Online Status" color="success"/>
    </x-oneui::code-example>

    {{-- Radio --}}
    @php
        $radioCode = '<x-oneui::radio name="gender" value="male" label="Male" :checked="true" />
<x-oneui::radio name="gender" value="female" label="Female" />';
    @endphp
    <x-oneui::code-example title="Radios" :code="$radioCode">
        <x-oneui::radio name="gender" value="male" label="Male" :checked="true"/>
        <x-oneui::radio name="gender" value="female" label="Female"/>
    </x-oneui::code-example>

    <h2 class="content-heading">Input Groups</h2>

    {{-- Input Group with Text --}}
    @php
        $groupTextCode = '<x-oneui::input-group>
	<x-slot:prepend>$</x-slot>
	<input type="text" class="form-control" placeholder="0.00" />
	<x-slot:append>.00</x-slot>
</x-oneui::input-group>';
    @endphp
    <x-oneui::code-example title="Input Group with Text" :code="$groupTextCode">
        <x-oneui::input-group>
            <x-slot:prepend>$</x-slot>
            <input type="text" class="form-control" placeholder="0.00"/>
            <x-slot:append>.00</x-slot>
        </x-oneui::input-group>
    </x-oneui::code-example>

    {{-- Input Group with Icon --}}
    @php
        $groupIconCode = '<x-oneui::input-group>
	<x-slot:prepend><i class="fa fa-user"></i></x-slot>
	<input type="text" class="form-control" placeholder="Username" />
</x-oneui::input-group>

<x-oneui::input-group>
	<input type="email" class="form-control" placeholder="Email" />
	<x-slot:append><i class="fa fa-envelope"></i></x-slot>
</x-oneui::input-group>';
    @endphp
    <x-oneui::code-example title="Input Group with Icon" :code="$groupIconCode">
        <div class="mb-4">
            <x-oneui::input-group>
                <x-slot:prepend><i class="fa fa-user"></i></x-slot>
                <input type="text" class="form-control" placeholder="Username"/>
            </x-oneui::input-group>
        </div>
        <x-oneui::input-group>
            <input type="email" class="form-control" placeholder="Email"/>
            <x-slot:append><i class="fa fa-envelope"></i></x-slot>
        </x-oneui::input-group>
    </x-oneui::code-example>

    <h2 class="content-heading">File & Floating Label</h2>

    {{-- File Input --}}
    @php
        $fileCode = '<x-oneui::file-input name="avatar" label="Avatar" />
<x-oneui::file-input name="files" label="Multiple Files" :multiple="true" />';
    @endphp
    <x-oneui::code-example title="File Input" :code="$fileCode">
        <x-oneui::file-input name="avatar" label="Avatar"/>
        <x-oneui::file-input name="files" label="Multiple Files" :multiple="true"/>
    </x-oneui::code-example>

    {{-- Floating Label --}}
    @php
        $floatCode = '<x-oneui::floating-label name="email" type="email" label="Email Address" />
<x-oneui::floating-label name="password" type="password" label="Password" />';
    @endphp
    <x-oneui::code-example title="Floating Label" :code="$floatCode">
        <x-oneui::floating-label name="email" type="email" label="Email Address"/>
        <x-oneui::floating-label name="password" type="password" label="Password"/>
    </x-oneui::code-example>

    <div class="alert alert-info">
        <i class="fa fa-info-circle me-2"></i>
        Looking for advanced form components like Range, Rating, Input Mask, Date Picker, Select2? Check out the <a href="{{ route('oneui.examples.forms-advanced') }}" class="alert-link">Advanced Forms</a> page.
    </div>
@endsection

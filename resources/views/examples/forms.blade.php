<x-oneui::page>
    <x-slot:title>Form Examples</x-slot>
    <x-slot:head>
        <link rel="stylesheet" href="{{ asset('vendor/oneui/js/plugins/highlightjs/styles/atom-one-dark.css') }}">
    </x-slot>

    <x-slot:sidebar>
        @include('oneui.partials.sidebar')
    </x-slot>

    <x-slot:content>
        <div class="content">
            <h2 class="content-heading">Form Elements</h2>

            {{-- Input --}}
            @php
            $inputCode = '<x-oneui::input name="text" label="Text Input" placeholder="Enter text..." />
<x-oneui::input name="email" label="Email" type="email" placeholder="Enter email" />
<x-oneui::input name="password" label="Password" type="password" placeholder="Enter password" />';
            @endphp
            <x-oneui::code-example title="Input" :code="$inputCode">
                <x-oneui::input name="text" label="Text Input" placeholder="Enter text..." />
                <x-oneui::input name="email" label="Email" type="email" placeholder="Enter email" />
                <x-oneui::input name="password" label="Password" type="password" placeholder="Enter password" />
            </x-oneui::code-example>

            {{-- Input Alt Style --}}
            @php
            $altCode = '<x-oneui::input name="text_alt" label="Alt Text Input" :alt="true" placeholder="Alt style..." />';
            @endphp
            <x-oneui::code-example title="Input (Alt Style)" :code="$altCode">
                <x-oneui::input name="text_alt" label="Alt Text Input" :alt="true" placeholder="Alt style..." />
            </x-oneui::code-example>

            {{-- Input Sizes --}}
            @php
            $sizeCode = '<x-oneui::input name="sm" label="Small" size="sm" placeholder="form-control-sm" />
<x-oneui::input name="normal" label="Normal" placeholder="Normal size" />
<x-oneui::input name="lg" label="Large" size="lg" placeholder="form-control-lg" />';
            @endphp
            <x-oneui::code-example title="Input Sizes" :code="$sizeCode">
                <x-oneui::input name="sm" label="Small" size="sm" placeholder="form-control-sm" />
                <x-oneui::input name="normal" label="Normal" placeholder="Normal size" />
                <x-oneui::input name="lg" label="Large" size="lg" placeholder="form-control-lg" />
            </x-oneui::code-example>

            {{-- Input with Validation --}}
            @php
            $validCode = '<x-oneui::input name="valid_demo" label="Valid" :valid="true" value="Valid input" />
<x-oneui::input name="error_demo" label="Invalid" error="This field is required" />';
            @endphp
            <x-oneui::code-example title="Validation States" :code="$validCode">
                <x-oneui::input name="valid_demo" label="Valid" :valid="true" value="Valid input" />
                <x-oneui::input name="error_demo" label="Invalid" error="This field is required" />
            </x-oneui::code-example>

            {{-- Select --}}
            @php
            $selectCode = '<x-oneui::select name="country" label="Country" :options="[\'us\' => \'United States\', \'my\' => \'Malaysia\', \'sg\' => \'Singapore\']" />';
            @endphp
            <x-oneui::code-example title="Select" :code="$selectCode">
                <x-oneui::select name="country" label="Country" :options="['us' => 'United States', 'my' => 'Malaysia', 'sg' => 'Singapore']" />
            </x-oneui::code-example>

            {{-- Textarea --}}
            @php
            $textareaCode = '<x-oneui::textarea name="bio" label="Bio" placeholder="Tell us about yourself..." />';
            @endphp
            <x-oneui::code-example title="Textarea" :code="$textareaCode">
                <x-oneui::textarea name="bio" label="Bio" placeholder="Tell us about yourself..." />
            </x-oneui::code-example>

            {{-- Checkbox --}}
            @php
            $checkCode = '<x-oneui::checkbox name="check1" label="Option 1" :checked="true" />
<x-oneui::checkbox name="check2" label="Option 2" />
<x-oneui::checkbox name="check3" label="Disabled" :disabled="true" />';
            @endphp
            <x-oneui::code-example title="Checkboxes" :code="$checkCode">
                <x-oneui::checkbox name="check1" label="Option 1" :checked="true" />
                <x-oneui::checkbox name="check2" label="Option 2" />
                <x-oneui::checkbox name="check3" label="Disabled" :disabled="true" />
            </x-oneui::code-example>

            {{-- Switch --}}
            @php
            $switchCode = '<x-oneui::checkbox name="switch1" label="Active" :switch="true" :checked="true" />
<x-oneui::checkbox name="switch2" label="Inactive" :switch="true" />';
            @endphp
            <x-oneui::code-example title="Switches" :code="$switchCode">
                <x-oneui::checkbox name="switch1" label="Active" :switch="true" :checked="true" />
                <x-oneui::checkbox name="switch2" label="Inactive" :switch="true" />
            </x-oneui::code-example>

            {{-- Radio --}}
            @php
            $radioCode = '<x-oneui::radio name="gender" value="male" label="Male" :checked="true" />
<x-oneui::radio name="gender" value="female" label="Female" />';
            @endphp
            <x-oneui::code-example title="Radios" :code="$radioCode">
                <x-oneui::radio name="gender" value="male" label="Male" :checked="true" />
                <x-oneui::radio name="gender" value="female" label="Female" />
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
                    <input type="text" class="form-control" placeholder="0.00" />
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
                        <input type="text" class="form-control" placeholder="Username" />
                    </x-oneui::input-group>
                </div>
                <x-oneui::input-group>
                    <input type="email" class="form-control" placeholder="Email" />
                    <x-slot:append><i class="fa fa-envelope"></i></x-slot>
                </x-oneui::input-group>
            </x-oneui::code-example>

            {{-- Input Group Alt Style --}}
            @php
            $groupAltCode = '<x-oneui::input-group :alt="true">
    <x-slot:prepend>Name</x-slot>
    <input type="text" class="form-control form-control-alt" />
</x-oneui::input-group>';
            @endphp
            <x-oneui::code-example title="Input Group (Alt Style)" :code="$groupAltCode">
                <x-oneui::input-group :alt="true">
                    <x-slot:prepend>Name</x-slot>
                    <input type="text" class="form-control form-control-alt" />
                </x-oneui::input-group>
            </x-oneui::code-example>

            <h2 class="content-heading">File & Floating Label</h2>

            {{-- File Input --}}
            @php
            $fileCode = '<x-oneui::file-input name="avatar" label="Avatar" />
<x-oneui::file-input name="files" label="Multiple Files" :multiple="true" />';
            @endphp
            <x-oneui::code-example title="File Input" :code="$fileCode">
                <x-oneui::file-input name="avatar" label="Avatar" />
                <x-oneui::file-input name="files" label="Multiple Files" :multiple="true" />
            </x-oneui::code-example>

            {{-- Floating Label --}}
            @php
            $floatCode = '<x-oneui::floating-label name="email" type="email" label="Email Address" />
<x-oneui::floating-label name="password" type="password" label="Password" />';
            @endphp
            <x-oneui::code-example title="Floating Label" :code="$floatCode">
                <x-oneui::floating-label name="email" type="email" label="Email Address" />
                <x-oneui::floating-label name="password" type="password" label="Password" />
            </x-oneui::code-example>
        </div>
    </x-slot>

    <x-slot:scripts>
        <script src="{{ asset('vendor/oneui/js/plugins/highlightjs/highlight.pack.min.js') }}"></script>
        <script>One.helpersOnLoad('js-highlightjs');</script>
    </x-slot>
</x-oneui::page>
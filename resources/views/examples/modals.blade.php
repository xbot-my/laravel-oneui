<x-oneui::page>
	<x-slot:title>Modal Examples</x-slot>
	<x-slot:head>
		<link rel="stylesheet" href="{{ asset('vendor/oneui/js/plugins/highlightjs/styles/atom-one-dark.css') }}">
	</x-slot>

	<x-slot:sidebar>
		@include('oneui::partials.sidebar')
	</x-slot>

	<x-slot:content>
		<div class="content">
			<h2 class="content-heading">Modals & Dropdowns</h2>

			{{-- Basic Modal --}}
			@php
				$modalCode = '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-default">
					Open Default Modal
				</button>

				<x-oneui::modal id="modal-default" title="Default Modal">
					<p>Modal content goes here...</p>
					<x-slot:footer>
						<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary">Save</button>
					</x-slot:footer>
				</x-oneui::modal>';
			@endphp
			<x-oneui::code-example title="Basic Modal" :code="$modalCode">
				<button type="button" class="btn btn-primary" data-bs-toggle="modal"
				        data-bs-target="#modal-default">
					Open Default Modal
				</button>
			</x-oneui::code-example>

			{{-- Centered Modal --}}
			@php
				$centeredCode = '<x-oneui::modal id="modal-centered" title="Centered Modal" :centered="true">
					<p>This modal is vertically centered.</p>
				</x-oneui::modal>';
			@endphp
			<x-oneui::code-example title="Centered Modal" :code="$centeredCode">
				<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modal-centered">
					Open Centered Modal
				</button>
			</x-oneui::code-example>

			{{-- Large Modal --}}
			@php
				$largeCode = '<x-oneui::modal id="modal-large" title="Large Modal" size="lg">
					<p>This is a large modal.</p>
				</x-oneui::modal>';
			@endphp
			<x-oneui::code-example title="Large Modal" :code="$largeCode">
				<button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modal-large">
					Open Large Modal
				</button>
			</x-oneui::code-example>

			{{-- Dropdown --}}
			@php
				$dropdownCode = '<x-oneui::dropdown>
					<x-slot:trigger>
						<button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
							Dropdown Menu
						</button>
					</x-slot:trigger>
					<a class="dropdown-item" href="#">Action 1</a>
					<a class="dropdown-item" href="#">Action 2</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Action 3</a>
				</x-oneui::dropdown>';
			@endphp
			<x-oneui::code-example title="Dropdown" :code="$dropdownCode">
				<x-oneui::dropdown>
					<x-slot:trigger>
						<button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
							Dropdown Menu
						</button>
					</x-slot>
					<a class="dropdown-item" href="#">Action 1</a>
					<a class="dropdown-item" href="#">Action 2</a>
					<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="#">Action 3</a>
				</x-oneui::dropdown>
			</x-oneui::code-example>
		</div>
	</x-slot>

	<x-slot:scripts>
		<script src="{{ asset('vendor/oneui/js/plugins/highlightjs/highlight.pack.min.js') }}"></script>
		<script>One.helpersOnLoad('js-highlightjs');</script>
	</x-slot>
</x-oneui::page>

{{-- Modals --}}
<x-oneui::modal id="modal-default" title="Default Modal">
	<p>This is the default modal content. You can put anything here.</p>
	<x-slot:footer>
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
		<button type="button" class="btn btn-primary">Save Changes</button>
	</x-slot>
</x-oneui::modal>

<x-oneui::modal id="modal-centered" title="Centered Modal" :centered="true">
	<p>This modal is vertically centered in the viewport.</p>
	<x-slot:footer>
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	</x-slot>
</x-oneui::modal>

<x-oneui::modal id="modal-large" title="Large Modal" size="lg">
	<p>This is a large modal with more space for content.</p>
	<x-slot:footer>
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	</x-slot>
</x-oneui::modal>
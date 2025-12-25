<x-oneui::page>
	<x-slot:title>Feedback Examples</x-slot>
	<x-slot:head>
		<link rel="stylesheet" href="{{ asset('vendor/oneui/js/plugins/highlightjs/styles/atom-one-dark.css') }}">
	</x-slot>

	<x-slot:sidebar>
		@include('oneui::partials.sidebar')
	</x-slot>

	<x-slot:content>
		<div class="content">
			<h2 class="content-heading">Spinner</h2>

			@php
				$spinnerCode = <<<'CODE'
				<x-oneui::spinner />
				<x-oneui::spinner type="grow" color="success" />
				<x-oneui::spinner color="danger" size="sm" />
				CODE;
			@endphp
			<x-oneui::code-example title="Spinner Types" :code="$spinnerCode">
				<div class="d-flex gap-3 align-items-center">
					<x-oneui::spinner/>
					<x-oneui::spinner type="grow" color="success"/>
					<x-oneui::spinner color="danger" size="sm"/>
					<x-oneui::spinner type="grow" color="warning" size="sm"/>
				</div>
			</x-oneui::code-example>

			<h2 class="content-heading">Toast</h2>

			@php
				$toastCode = <<<'CODE'
				<x-oneui::toast type="success" title="Success" message="Operation completed!" />
				<x-oneui::toast type="danger" title="Error" message="Something went wrong." />
				<x-oneui::toast type="info" title="Info" message="New update available." />
				CODE;
			@endphp
			<x-oneui::code-example title="Toast Messages" :code="$toastCode">
				<div class="d-flex flex-column gap-2" style="max-width: 350px;">
					<x-oneui::toast type="success" title="Success" message="Operation completed!"
					                class="show" :autohide="false"/>
					<x-oneui::toast type="danger" title="Error" message="Something went wrong." class="show"
					                :autohide="false"/>
					<x-oneui::toast type="info" title="Info" message="New update available." class="show"
					                :autohide="false"/>
				</div>
			</x-oneui::code-example>

			<h2 class="content-heading">Loading Overlay</h2>

			@php
				$loadingCode = <<<'CODE'
				<x-oneui::loading message="Please wait..." />
				<x-oneui::loading message="Saving..." color="success" />
				CODE;
			@endphp
			<x-oneui::code-example title="Loading Overlay" :code="$loadingCode">
				<div class="position-relative bg-body-light rounded p-5" style="height: 200px;">
					<div
							class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center bg-body-extra-light rounded">
						<div class="text-center">
							<x-oneui::spinner color="primary"/>
							<p class="mt-3 mb-0 text-muted">Loading...</p>
						</div>
					</div>
				</div>
			</x-oneui::code-example>

			<h2 class="content-heading">Progress Bar</h2>

			@php
				$progressCode = <<<'CODE'
<x-oneui::progress :value="30" />
<x-oneui::progress :value="50" color="warning" :striped="true" />
<x-oneui::progress :value="75" color="success" :striped="true" :animated="true" />
<x-oneui::progress :value="100" color="info" :showLabel="true" />
CODE;
			@endphp
			<x-oneui::code-example title="Progress Bars" :code="$progressCode">
				<div class="d-flex flex-column gap-3">
					<x-oneui::progress :value="30"/>
					<x-oneui::progress :value="50" color="warning" :striped="true"/>
					<x-oneui::progress :value="75" color="success" :striped="true" :animated="true"/>
					<x-oneui::progress :value="100" color="info" :showLabel="true"/>
				</div>
			</x-oneui::code-example>

			<h2 class="content-heading">Ribbon</h2>

			@php
				$ribbonCode = <<<'CODE'
<div class="block block-rounded">
<div class="block-content block-content-full ribbon ribbon-primary">
<x-oneui::ribbon type="primary">$28</x-oneui::ribbon>
<p class="text-center py-4 mb-0">Price with ribbon</p>
</div>
</div>

<div class="block block-rounded">
<div class="block-content block-content-full ribbon ribbon-success ribbon-bottom ribbon-left">
<x-oneui::ribbon type="success" position="bottom-left">SALE</x-oneui::ribbon>
<p class="text-center py-4 mb-0">Sale item</p>
</div>
</div>
CODE;
			@endphp
			<x-oneui::code-example title="Ribbons" :code="$ribbonCode">
				<div class="row">
					<div class="col-md-6">
						<div class="block block-rounded">
							<div class="block-content block-content-full ribbon ribbon-primary">
								<x-oneui::ribbon type="primary">$28</x-oneui::ribbon>
								<p class="text-center py-4 mb-0">Price with ribbon</p>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="block block-rounded">
							<div class="block-content block-content-full ribbon ribbon-success ribbon-bottom ribbon-left">
								<x-oneui::ribbon type="success" position="bottom-left">SALE</x-oneui::ribbon>
								<p class="text-center py-4 mb-0">Sale item</p>
							</div>
						</div>
					</div>
				</div>
			</x-oneui::code-example>

			<h2 class="content-heading">Tooltip & Popover</h2>

			@php
				$tooltipPopoverCode = <<<'CODE'
<x-oneui::tooltip title="Hover for tooltip">
<button class="btn btn-primary">Tooltip</button>
</x-oneui::tooltip>

<x-oneui::tooltip title="Click tooltip" placement="bottom" trigger="click">
<button class="btn btn-secondary">Click Tooltip</button>
</x-oneui::tooltip>

<x-oneui::popover title="Popover Title" content="Popover content goes here">
<button class="btn btn-alt-primary">Popover</button>
</x-oneui::popover>

<x-oneui::popover title="Click Popover" content="More info here" placement="bottom" trigger="click">
<button class="btn btn-alt-success">Click Popover</button>
</x-oneui::popover>
CODE;
			@endphp
			<x-oneui::code-example title="Tooltips and Popovers" :code="$tooltipPopoverCode">
				<div class="d-flex gap-2 flex-wrap">
					<x-oneui::tooltip title="Hover for tooltip">
						<button class="btn btn-primary">Tooltip</button>
					</x-oneui::tooltip>

					<x-oneui::tooltip title="Click tooltip" placement="bottom" trigger="click">
						<button class="btn btn-secondary">Click Tooltip</button>
					</x-oneui::tooltip>

					<x-oneui::popover title="Popover Title" content="Popover content goes here">
						<button class="btn btn-alt-primary">Popover</button>
					</x-oneui::popover>

					<x-oneui::popover title="Click Popover" content="More info here" placement="bottom" trigger="click">
						<button class="btn btn-alt-success">Click Popover</button>
					</x-oneui::popover>
				</div>
			</x-oneui::code-example>
		</div>
	</x-slot>

	<x-slot:scripts>
		<script src="{{ asset('vendor/oneui/js/plugins/highlightjs/highlight.pack.min.js') }}"></script>
		<script>One.helpersOnLoad('js-highlightjs');</script>
	</x-slot>
</x-oneui::page>
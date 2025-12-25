<x-oneui::page>
	<x-slot:title>Chart Components</x-slot:title>
	<x-slot:head>
		<link rel="stylesheet" href="{{ asset('vendor/oneui/js/plugins/highlightjs/styles/atom-one-dark.css') }}">
	</x-slot>

	<x-slot:sidebar>
		@include('oneui::examples._sidebar')
	</x-slot:sidebar>

	<x-slot:content>
		<div class="content">
			<h2 class="content-heading">Charts</h2>

			{{-- ChartJS --}}
			@php
				$chartJsCode = '<x-oneui::chart-js
		id="myChart"
		type="line"
		:labels="[\'Jan\', \'Feb\', \'Mar\', \'Apr\', \'May\', \'Jun\]"
		:datasets="[
			[\'label\' => \'Sales\', \'data\' => [12, 19, 3, 5, 2, 3]]
		]"
	/>';
			@endphp
			<x-oneui::code-example title="ChartJS - Line Chart" :code="$chartJsCode">
				<x-oneui::chart-js
						id="lineChart"
						type="line"
						:labels="['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun']"
						:datasets="[
                        ['label' => 'Sales', 'data' => [12, 19, 3, 5, 2, 3], 'borderColor' => '#3b82f6']
                    ]"
				/>
			</x-oneui::code-example>

			{{-- Sparkline --}}
			@php
				$sparklineCode = '<x-oneui::sparkline id="spark1" type="line" :values="[10, 20, 15, 25, 20, 30]" />';
			@endphp
			<x-oneui::code-example title="Sparkline" :code="$sparklineCode">
				<div>
					<span class="me-3">Sales:</span>
					<x-oneui::sparkline id="spark1" type="line" :values="[10, 20, 15, 25, 20, 30]" width="100" height="30"/>
				</div>
				<div class="mt-2">
					<span class="me-3">Views:</span>
					<x-oneui::sparkline id="spark2" type="bar" :values="[5, 15, 10, 20, 15, 25]" width="100" height="30"/>
				</div>
			</x-oneui::code-example>

			{{-- EasyPieChart --}}
			@php
				$pieCode = '<x-oneui::easy-pie-chart id="pie1" :percent="75" label="Complete" />
	<x-oneui::easy-pie-chart id="pie2" :percent="45" color="#eab308" label="Pending" />';
			@endphp
			<x-oneui::code-example title="EasyPieChart" :code="$pieCode">
				<div class="row text-center">
					<div class="col-4">
						<x-oneui::easy-pie-chart id="pie1" :percent="75"/>
						<div class="small text-muted mt-2">Complete</div>
					</div>
					<div class="col-4">
						<x-oneui::easy-pie-chart id="pie2" :percent="45" color="#eab308"/>
						<div class="small text-muted mt-2">Pending</div>
					</div>
					<div class="col-4">
						<x-oneui::easy-pie-chart id="pie3" :percent="90" color="#ef4444"/>
						<div class="small text-muted mt-2">Critical</div>
					</div>
				</div>
			</x-oneui::code-example>
		</div>
	</x-slot:content>

	<x-slot:scripts>
		<script src="{{ asset('vendor/oneui/js/plugins/highlightjs/highlight.pack.min.js') }}"></script>
		<script>One.helpersOnLoad('js-highlightjs');</script>
	</x-slot:scripts>
</x-oneui::page>

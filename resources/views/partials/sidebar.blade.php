<x-oneui::sidebar>
	@php
		$items = [
			['label' => 'Components', 'icon' => 'si si-grid', 'active' => 'oneui.examples.*'],
			['label' => 'Overview', 'route' => 'oneui.examples.index', 'icon' => 'si si-home', 'order' => 1],
			['label' => 'Layout', 'route' => 'oneui.examples.layout', 'icon' => 'si si-layers', 'order' => 2],
			['label' => 'Forms', 'route' => 'oneui.examples.forms', 'icon' => 'si si-note', 'order' => 3],
			['label' => 'Buttons', 'route' => 'oneui.examples.buttons', 'icon' => 'fa fa-hand-pointer', 'order' => 4],
			['label' => 'Tables', 'route' => 'oneui.examples.tables', 'icon' => 'si si-table', 'order' => 5],
			['label' => 'Charts', 'route' => 'oneui.examples.charts', 'icon' => 'si si-chart', 'order' => 6],
			['label' => 'Metrics', 'route' => 'oneui.examples.metrics', 'icon' => 'si si-speedometer', 'order' => 7],
			['label' => 'Cards', 'route' => 'oneui.examples.cards', 'icon' => 'si si-folder-open', 'order' => 8],
			['label' => 'Navigation', 'route' => 'oneui.examples.navigation', 'icon' => 'si si-menu', 'order' => 9],
			['label' => 'Alerts & Modals', 'route' => 'oneui.examples.alerts', 'icon' => 'si si-bell', 'order' => 10],
			['label' => 'Feedback', 'route' => 'oneui.examples.feedback', 'icon' => 'fa fa-comment', 'order' => 11],
			['label' => 'Media', 'route' => 'oneui.examples.media', 'icon' => 'si si-picture', 'order' => 12],
			['label' => 'Utilities', 'route' => 'oneui.examples.utilities', 'icon' => 'si si-wrench', 'order' => 13],
		];
	@endphp

	<x-oneui::sidebar-menu :data="$items" />
</x-oneui::sidebar>
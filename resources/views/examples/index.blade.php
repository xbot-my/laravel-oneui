<x-oneui::page>
	<x-slot:title>OneUI Components</x-slot:title>
	<x-slot:sidebar>
		@include('oneui::partials.sidebar')
	</x-slot:sidebar>

	<x-slot:content>
		<div class="content">
			<h2 class="content-heading">Component Library</h2>

			<div class="row">
				<div class="col-md-6 col-lg-4">
					<x-oneui::block>
						<h3 class="fs-4 mb-3">Layout</h3>
						<p class="text-muted small mb-3">Page structure and layout components</p>
						<ul class="nav nav-sm nav-pills flex-column">
							<li class="nav-item"><a class="nav-link" href="{{ route('oneui.examples.layout') }}">Page, Block, Sidebar, Header...</a></li>
						</ul>
					</x-oneui::block>
				</div>

				<div class="col-md-6 col-lg-4">
					<x-oneui::block>
						<h3 class="fs-4 mb-3">Forms</h3>
						<p class="text-muted small mb-3">Input, Select, Button, DatePicker...</p>
						<ul class="nav nav-sm nav-pills flex-column">
							<li class="nav-item"><a class="nav-link" href="{{ route('oneui.examples.forms') }}">All Form Components</a></li>
						</ul>
					</x-oneui::block>
				</div>

				<div class="col-md-6 col-lg-4">
					<x-oneui::block>
						<h3 class="fs-4 mb-3">Tables</h3>
						<p class="text-muted small mb-3">Data tables with sorting and pagination</p>
						<ul class="nav nav-sm nav-pills flex-column">
							<li class="nav-item"><a class="nav-link" href="{{ route('oneui.examples.tables') }}">Table, DataTables</a></li>
						</ul>
					</x-oneui::block>
				</div>

				<div class="col-md-6 col-lg-4">
					<x-oneui::block>
						<h3 class="fs-4 mb-3">Charts</h3>
						<p class="text-muted small mb-3">Data visualization components</p>
						<ul class="nav nav-sm nav-pills flex-column">
							<li class="nav-item"><a class="nav-link" href="{{ route('oneui.examples.charts') }}">ChartJS, Sparkline, EasyPieChart</a></li>
						</ul>
					</x-oneui::block>
				</div>

				<div class="col-md-6 col-lg-4">
					<x-oneui::block>
						<h3 class="fs-4 mb-3">Metrics</h3>
						<p class="text-muted small mb-3">Statistics and metric widgets</p>
						<ul class="nav nav-sm nav-pills flex-column">
							<li class="nav-item"><a class="nav-link" href="{{ route('oneui.examples.metrics') }}">StatWidget, StatGroup, Tiles...</a></li>
						</ul>
					</x-oneui::block>
				</div>

				<div class="col-md-6 col-lg-4">
					<x-oneui::block>
						<h3 class="fs-4 mb-3">Calendar</h3>
						<p class="text-muted small mb-3">Calendar and date picker</p>
						<ul class="nav nav-sm nav-pills flex-column">
							<li class="nav-item"><a class="nav-link" href="{{ route('oneui.examples.calendar') }}">FullCalendar</a></li>
						</ul>
					</x-oneui::block>
				</div>

				<div class="col-md-6 col-lg-4">
					<x-oneui::block>
						<h3 class="fs-4 mb-3">Editors</h3>
						<p class="text-muted small mb-3">Rich text and code editors</p>
						<ul class="nav nav-sm nav-pills flex-column">
							<li class="nav-item"><a class="nav-link" href="{{ route('oneui.examples.editors') }}">CKEditor, SimpleMDE</a></li>
						</ul>
					</x-oneui::block>
				</div>

				<div class="col-md-6 col-lg-4">
					<x-oneui::block>
						<h3 class="fs-4 mb-3">Upload</h3>
						<p class="text-muted small mb-3">File upload and image processing</p>
						<ul class="nav nav-sm nav-pills flex-column">
							<li class="nav-item"><a class="nav-link" href="{{ route('oneui.examples.upload') }}">Dropzone, ImageCropper</a></li>
						</ul>
					</x-oneui::block>
				</div>

				<div class="col-md-6 col-lg-4">
					<x-oneui::block>
						<h3 class="fs-4 mb-3">Navigation</h3>
						<p class="text-muted small mb-3">Menu and navigation components</p>
						<ul class="nav nav-sm nav-pills flex-column">
							<li class="nav-item"><a class="nav-link" href="{{ route('oneui.examples.navigation') }}">Nav, Tabs, Breadcrumb, Steps...</a></li>
						</ul>
					</x-oneui::block>
				</div>

				<div class="col-md-6 col-lg-4">
					<x-oneui::block>
						<h3 class="fs-4 mb-3">Notifications</h3>
						<p class="text-muted small mb-3">Alerts, toasts, and feedback</p>
						<ul class="nav nav-sm nav-pills flex-column">
							<li class="nav-item"><a class="nav-link" href="{{ route('oneui.examples.notifications') }}">Alert, Modal, Toast, SweetAlert2...</a></li>
						</ul>
					</x-oneui::block>
				</div>

				<div class="col-md-6 col-lg-4">
					<x-oneui::block>
						<h3 class="fs-4 mb-3">Media</h3>
						<p class="text-muted small mb-3">Image and media display</p>
						<ul class="nav nav-sm nav-pills flex-column">
							<li class="nav-item"><a class="nav-link" href="{{ route('oneui.examples.media') }}">Image, Gallery, Carousel...</a></li>
						</ul>
					</x-oneui::block>
				</div>

				<div class="col-md-6 col-lg-4">
					<x-oneui::block>
						<h3 class="fs-4 mb-3">Lists</h3>
						<p class="text-muted small mb-3">List and tree components</p>
						<ul class="nav nav-sm nav-pills flex-column">
							<li class="nav-item"><a class="nav-link" href="{{ route('oneui.examples.lists') }}">DataList, Tree, Timeline...</a></li>
						</ul>
					</x-oneui::block>
				</div>

				<div class="col-md-6 col-lg-4">
					<x-oneui::block>
						<h3 class="fs-4 mb-3">Cards</h3>
						<p class="text-muted small mb-3">Card and content widgets</p>
						<ul class="nav nav-sm nav-pills flex-column">
							<li class="nav-item"><a class="nav-link" href="{{ route('oneui.examples.cards') }}">Card, UserCard, PostCard...</a></li>
						</ul>
					</x-oneui::block>
				</div>

				<div class="col-md-6 col-lg-4">
					<x-oneui::block>
						<h3 class="fs-4 mb-3">Utilities</h3>
						<p class="text-muted small mb-3">Helper components and utilities</p>
						<ul class="nav nav-sm nav-pills flex-column">
							<li class="nav-item"><a class="nav-link" href="{{ route('oneui.examples.utilities') }}">Icons, Animations, CodeHighlight...</a></li>
						</ul>
					</x-oneui::block>
				</div>
			</div>
		</div>
	</x-slot:content>
</x-oneui::page>

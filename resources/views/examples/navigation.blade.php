<x-oneui::page>
	<x-slot:title>Navigation Examples</x-slot>
	<x-slot:head>
		<link rel="stylesheet" href="{{ asset('vendor/oneui/js/plugins/highlightjs/styles/atom-one-dark.css') }}">
	</x-slot>

	<x-slot:sidebar>
		@include('oneui::partials.sidebar')
	</x-slot>

	<x-slot:content>
		<div class="content">
			<h2 class="content-heading">Breadcrumb</h2>

			@php
				$breadcrumbCode = <<<'CODE'
	<x-oneui::breadcrumb :data="[
		['label' => 'Home', 'url' => '/'],
		['label' => 'Products', 'url' => '/products'],
		['label' => 'Details'],
	]" />
	CODE;
			@endphp
			<x-oneui::code-example title="Basic Breadcrumb" :code="$breadcrumbCode">
				<x-oneui::breadcrumb :data="[
                    ['label' => 'Home', 'url' => '/'],
                    ['label' => 'Products', 'url' => '/products'],
                    ['label' => 'Details'],
                ]"/>
			</x-oneui::code-example>

			<h2 class="content-heading">Nav Tabs</h2>

			@php
				$tabsCode = <<<'CODE'
	<x-oneui::nav-tabs :data="[
		['id' => 'home', 'label' => 'Home', 'icon' => 'fa fa-home', 'active' => true],
		['id' => 'profile', 'label' => 'Profile', 'icon' => 'fa fa-user'],
		['id' => 'settings', 'label' => 'Settings', 'icon' => 'fa fa-cog'],
	]" />
	CODE;
			@endphp
			<x-oneui::code-example title="Block Tabs with Icons" :code="$tabsCode">
				<x-oneui::nav-tabs :data="[
                    ['id' => 'home', 'label' => 'Home', 'icon' => 'fa fa-home', 'active' => true],
                    ['id' => 'profile', 'label' => 'Profile', 'icon' => 'fa fa-user'],
                    ['id' => 'settings', 'label' => 'Settings', 'icon' => 'fa fa-cog'],
                ]"/>
			</x-oneui::code-example>

			<h2 class="content-heading">Sidebar Menu</h2>

			@php
				$menuCode = <<<'CODE'
	<x-oneui::sidebar-menu :data="[
		['label' => 'Dashboard', 'url' => '#', 'icon' => 'si si-speedometer', 'active' => true],
		['label' => 'Users', 'url' => '#', 'icon' => 'si si-users', 'badge' => '5'],
		['label' => 'Settings', 'icon' => 'si si-settings', 'children' => [
			['label' => 'Profile', 'url' => '#'],
			['label' => 'Security', 'url' => '#'],
		]],
	]" />
	CODE;
			@endphp
			<x-oneui::code-example title="Sidebar Menu with Submenu" :code="$menuCode">
				<div style="max-width: 280px;">
					<x-oneui::sidebar-menu :data="[
                        ['label' => 'Dashboard', 'url' => '#', 'icon' => 'si si-speedometer', 'active' => true],
                        ['label' => 'Users', 'url' => '#', 'icon' => 'si si-users', 'badge' => '5'],
                        ['label' => 'Settings', 'icon' => 'si si-settings', 'children' => [
                            ['label' => 'Profile', 'url' => '#'],
                            ['label' => 'Security', 'url' => '#'],
                        ]],
                    ]"/>
				</div>
			</x-oneui::code-example>

			<h2 class="content-heading">Mega Menu</h2>

			@php
				$megaMenuCode = <<<'CODE'
	<x-oneui::mega-menu id="mega-projects" title="My Projects" size="xl" header-color="primary">
		<div class="row g-0">
			<div class="col-md-4">
				<div class="p-4">
					<h5 class="mb-3">Recent</h5>
					<a class="dropdown-item d-flex align-items-center" href="#">
						<span>Project Alpha</span>
					</a>
					<a class="dropdown-item d-flex align-items-center" href="#">
						<span>Project Beta</span>
					</a>
				</div>
			</div>
			<div class="col-md-4">
				<div class="p-4">
					<h5 class="mb-3">Archived</h5>
					<a class="dropdown-item d-flex align-items-center" href="#">
						<span>Old Project 1</span>
					</a>
				</div>
			</div>
		</div>
	</x-oneui::mega-menu>
	CODE;
			@endphp
			<x-oneui::code-example title="Mega Menu" :code="$megaMenuCode">
				<x-oneui::mega-menu id="mega-projects" title="My Projects" size="xl" header-color="primary">
					<div class="row g-0">
						<div class="col-md-4">
							<div class="p-4">
								<h5 class="mb-3">Recent</h5>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<span>Project Alpha</span>
								</a>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<span>Project Beta</span>
								</a>
							</div>
						</div>
						<div class="col-md-4">
							<div class="p-4">
								<h5 class="mb-3">Archived</h5>
								<a class="dropdown-item d-flex align-items-center" href="#">
									<span>Old Project 1</span>
								</a>
							</div>
						</div>
					</div>
				</x-oneui::mega-menu>
			</x-oneui::code-example>

			<h2 class="content-heading">Horizontal Navigation</h2>

			@php
				$horizNavCode = <<<'CODE'
	<x-oneui::horizontal-nav mode="hover">
		<x-oneui::horizontal-nav-item href="#" icon="fa-home" :active="true">Home</x-oneui::horizontal-nav-item>
		<x-oneui::horizontal-nav-item heading="Manage"></x-oneui::horizontal-nav-item>
		<x-oneui::horizontal-nav-item href="#" icon="fa-briefcase" :submenu="true">Products</x-oneui::horizontal-nav-item>
		<x-oneui::horizontal-nav-item href="#" icon="fa-envelope">Contact</x-oneui::horizontal-nav-item>
	</x-oneui::horizontal-nav>
	CODE;
			@endphp
			<x-oneui::code-example title="Horizontal Navigation" :code="$horizNavCode">
				<div class="bg-body-extra-light p-3">
					<x-oneui::horizontal-nav mode="hover">
						<x-oneui::horizontal-nav-item href="#" icon="fa-home" :active="true">Home</x-oneui::horizontal-nav-item>
						<x-oneui::horizontal-nav-item heading="Manage"></x-oneui::horizontal-nav-item>
						<x-oneui::horizontal-nav-item href="#" icon="fa-briefcase" :submenu="true">Products</x-oneui::horizontal-nav-item>
						<x-oneui::horizontal-nav-item href="#" icon="fa-envelope">Contact</x-oneui::horizontal-nav-item>
					</x-oneui::horizontal-nav>
				</div>
			</x-oneui::code-example>
		</div>
	</x-slot>

	<x-slot:scripts>
		<script src="{{ asset('vendor/oneui/js/plugins/highlightjs/highlight.pack.min.js') }}"></script>
		<script>One.helpersOnLoad('js-highlightjs');</script>
	</x-slot>
</x-oneui::page>

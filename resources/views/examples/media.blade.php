<x-oneui::page>
	<x-slot:title>Media Components</x-slot:title>
	<x-slot:head>
		<link rel="stylesheet" href="{{ asset('vendor/oneui/js/plugins/highlightjs/styles/atom-one-dark.css') }}">
	</x-slot>

	<x-slot:sidebar>
		@include('oneui::examples._sidebar')
	</x-slot:sidebar>

	<x-slot:content>
		<div class="content">
			<h2 class="content-heading">Media Display</h2>

			{{-- Image --}}
			@php
				$imageCode = '<x-oneui::image src="path/to/image.jpg" alt="Description" rounded />
	<x-oneui::image src="path/to/avatar.jpg" circle size="md" />';
			@endphp
			<x-oneui::code-example title="Image" :code="$imageCode">
				<div class="row align-items-center">
					<div class="col-md-4 text-center">
						<x-oneui::image
								src="https://picsum.photos/200"
								rounded
								shadow
						/>
						<div class="small text-muted mt-2">Rounded</div>
					</div>
					<div class="col-md-4 text-center">
						<x-oneui::image
								src="https://picsum.photos/100"
								circle
								size="md"
						/>
						<div class="small text-muted mt-2">Circle Avatar</div>
					</div>
					<div class="col-md-4 text-center">
						<x-oneui::image
								src="https://picsum.photos/200"
								thumbnail
						/>
						<div class="small text-muted mt-2">Thumbnail</div>
					</div>
				</div>
			</x-oneui::code-example>

			{{-- Gallery (MagnificPopup) --}}
			@php
				$galleryCode = '<x-oneui::magnific-popup id="gallery1" type="image">
		<img src="thumb1.jpg" data-mfp-src="large1.jpg">
		<img src="thumb2.jpg" data-mfp-src="large2.jpg">
		<img src="thumb3.jpg" data-mfp-src="large3.jpg">
	</x-oneui::magnific-popup>';
			@endphp
			<x-oneui::code-example title="Image Gallery" :code="$galleryCode">
				<x-oneui::magnific-popup id="gallery1" type="image">
					<div class="row">
						<div class="col-md-4">
							<a href="https://picsum.photos/800/600?random=1" class="block-link-pop">
								<img src="https://picsum.photos/400/300?random=1" class="img-fluid rounded" alt="Gallery 1">
							</a>
						</div>
						<div class="col-md-4">
							<a href="https://picsum.photos/800/600?random=2" class="block-link-pop">
								<img src="https://picsum.photos/400/300?random=2" class="img-fluid rounded" alt="Gallery 2">
							</a>
						</div>
						<div class="col-md-4">
							<a href="https://picsum.photos/800/600?random=3" class="block-link-pop">
								<img src="https://picsum.photos/400/300?random=3" class="img-fluid rounded" alt="Gallery 3">
							</a>
						</div>
					</div>
				</x-oneui::magnific-popup>
			</x-oneui::code-example>

			{{-- Carousel --}}
			@php
				$carouselCode = '<x-oneui::carousel id="carousel1">
		<img src="slide1.jpg" alt="Slide 1">
		<img src="slide2.jpg" alt="Slide 2">
		<img src="slide3.jpg" alt="Slide 3">
	</x-oneui::carousel>';
			@endphp
			<x-oneui::code-example title="Carousel" :code="$carouselCode">
				<x-oneui::carousel id="carousel1" :autoplay="true">
					<div>
						<img src="https://picsum.photos/800/400?random=10" class="img-fluid rounded" alt="Slide 1">
					</div>
					<div>
						<img src="https://picsum.photos/800/400?random=11" class="img-fluid rounded" alt="Slide 2">
					</div>
					<div>
						<img src="https://picsum.photos/800/400?random=12" class="img-fluid rounded" alt="Slide 3">
					</div>
				</x-oneui::carousel>
			</x-oneui::code-example>
		</div>
	</x-slot:content>

	<x-slot:scripts>
		<script src="{{ asset('vendor/oneui/js/plugins/highlightjs/highlight.pack.min.js') }}"></script>
		<script>One.helpersOnLoad('js-highlightjs');</script>
	</x-slot:scripts>
</x-oneui::page>

@php
    $tag = $href ? 'a' : 'div';
@endphp
<{{ $tag }} {{ $attributes->merge(['class' => 'block block-rounded block-link-shadow']) }} @if($href) href="{{ $href }}"
@endif>
    <div class="block-content block-content-full">
        <div class="row text-center">
            @foreach($items as $index => $item)
                <div class="col-{{ (int) (12 / count($items)) }} {{ $index < count($items) - 1 ? 'border-end' : '' }}">
                    <div class="py-3">
                        @if(isset($item['icon']))
                            <div class="item item-circle bg-body-light mx-auto">
                                <i class="{{ $item['icon'] }} text-{{ $item['color'] ?? 'primary' }}"></i>
                            </div>
                        @endif
                        <dl class="mb-0">
                            <dt class="h3 fw-extrabold {{ isset($item['icon']) ? 'mt-3' : '' }} mb-0">
                                {{ $item['value'] ?? 0 }}
                            </dt>
                            <dd class="fs-sm fw-medium text-muted mb-0">
                                {{ $item['label'] ?? '' }}
                            </dd>
                        </dl>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</{{ $tag }}>
<dl {{ $attributes->merge(['class' => $getContainerClasses()]) }}>
    @foreach($items as $key => $value)
        @if($orientation === 'horizontal')
            <div class="row align-items-center mb-2">
                <dt class="{{ $getLabelClass($key) }} col-sm-4">{{ $key }}</dt>
                <dd class="{{ $getValueClass() }} col-sm-8">{{ $value }}</dd>
            </div>
        @else
            <dt class="{{ $getLabelClass($key) }}">{{ $key }}</dt>
            <dd class="{{ $getValueClass() }}">{{ $value }}</dd>
        @endif
    @endforeach
</dl>

<style>
.data-list {
    margin: 0;
}

.data-list dt {
    font-weight: 600;
    color: var(--oneui-text-muted, #6c757d);
}

.data-list dd {
    margin-left: 0;
    margin-bottom: 0.5rem;
    color: var(--oneui-text-color, #212529);
}

.data-list-bordered dt {
    padding: 0.5rem;
    background-color: var(--oneui-bg-light, #f8f9fa);
    border-bottom: 1px solid var(--oneui-border-color, #dee2e6);
}

.data-list-bordered dd {
    padding: 0.5rem;
    border-bottom: 1px solid var(--oneui-border-color, #dee2e6);
}

.data-list-striped .row:nth-of-type(odd) dt,
.data-list-striped .row:nth-of-type(odd) dd {
    background-color: rgba(0, 0, 0, 0.02);
}

.data-list-hover .row:hover dt,
.data-list-hover .row:hover dd,
.data-list-hover dt:hover,
.data-list-hover dd:hover {
    background-color: rgba(0, 0, 0, 0.04);
    transition: background-color 0.2s;
}

.data-list-label {
    text-transform: uppercase;
    font-size: 0.75rem;
    letter-spacing: 0.05em;
}

.data-list-value {
    font-size: 0.9375rem;
}
</style>

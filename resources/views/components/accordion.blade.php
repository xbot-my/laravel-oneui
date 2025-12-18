<div {{ $attributes->merge(['class' => $accordionClasses()]) }} id="{{ $id }}">
    @foreach($items as $index => $item)
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button {{ $open === $index ? '' : 'collapsed' }}" type="button"
                    data-bs-toggle="collapse" data-bs-target="#{{ $id }}-{{ $index }}"
                    aria-expanded="{{ $open === $index ? 'true' : 'false' }}" aria-controls="{{ $id }}-{{ $index }}">
                    {{ $item['title'] ?? '' }}
                </button>
            </h2>
            <div id="{{ $id }}-{{ $index }}" class="accordion-collapse collapse {{ $open === $index ? 'show' : '' }}"
                data-bs-parent="#{{ $id }}">
                <div class="accordion-body">
                    {!! $item['content'] ?? '' !!}
                </div>
            </div>
        </div>
    @endforeach
</div>
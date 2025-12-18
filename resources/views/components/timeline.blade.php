<ul {{ $attributes->merge(['class' => $timelineClasses()]) }}>
    @foreach($items as $item)
        <li class="timeline-event">
            <div class="timeline-event-icon bg-{{ $item['color'] ?? 'primary' }}">
                <i class="{{ $item['icon'] ?? 'fa fa-circle' }}"></i>
            </div>
            <div class="timeline-event-block block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">{{ $item['title'] ?? '' }}</h3>
                    @if(isset($item['time']))
                        <div class="block-options">
                            <span class="text-muted fs-sm">{{ $item['time'] }}</span>
                        </div>
                    @endif
                </div>
                @if(isset($item['content']))
                    <div class="block-content">
                        {!! $item['content'] !!}
                    </div>
                @endif
            </div>
        </li>
    @endforeach
</ul>
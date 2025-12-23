@if($responsive)
    <div class="table-responsive">
@endif

    <table {{ $attributes->merge(['class' => $tableClasses()]) }}>
        @if($hasData())
            {{-- Auto-generated table from data using ItemCollection --}}
            <thead>
                <tr>
                    @foreach($columnConfig as $col)
                        <th @if(!empty($col['width'])) style="width: {{ $col['width'] }}" @endif @if(!empty($col['class']))
                        class="{{ $col['class'] }}" @endif>
                            {{ $col['label'] }}
                        </th>
                    @endforeach
                    @isset($actions)
                        <th class="text-center" style="width: 100px;">Actions</th>
                    @endisset
                </tr>
            </thead>
            <tbody>
                @foreach($items as $row)
                    {{-- Each row has data-row attribute with JSON data --}}
                    {{-- $row is now a DataItem instance --}}
                    <tr data-row-index="{{ $loop->index }}" data-row-id="{{ $row->getIdentifier() ?? $loop->index }}"
                        data-row="{{ $row->toJson() }}" @if($loop->first) class="first-row" @endif>
                        @foreach($columnConfig as $col)
                            <td @if(!empty($col['class'])) class="{{ $col['class'] }}" @endif>
                                @php $value = $row->getValue($col['key']); @endphp

                                @if($shouldRenderBadge($col))
                                    {{-- Badge rendering --}}
                                    <x-oneui::badge :type="$getBadgeType($value, $col)" :pill="$col['pill'] ?? true">
                                        {{ $value }}
                                    </x-oneui::badge>
                                @elseif(!empty($col['format']) && $col['format'] === 'date' && $value)
                                    {{-- Date formatting --}}
                                    {{ $formatCellValue($value, $col) }}
                                @elseif(!empty($col['format']) && $col['format'] === 'currency')
                                    {{-- Currency formatting --}}
                                    {{ $formatCellValue($value, $col) }}
                                @elseif(!empty($col['html']))
                                    {{-- Sanitized HTML --}}
                                    {!! $sanitizeHtml($value, $col) !!}
                                @else
                                    {{-- Plain text --}}
                                    {{ $value }}
                                @endif
                            </td>
                        @endforeach

                        @isset($actions)
                            <td class="text-center">
                                <div class="btn-group">
                                    {{ $actions }}
                                </div>
                            </td>
                        @endisset
                    </tr>
                @endforeach
            </tbody>
        @else
            {{-- Manual mode: use slots --}}
            @isset($head)
                <thead>
                    {{ $head }}
                </thead>
            @endisset
            <tbody>
                {{ $slot }}
            </tbody>
            @isset($foot)
                <tfoot>
                    {{ $foot }}
                </tfoot>
            @endisset
        @endif
    </table>

    @if($responsive)
        </div>
    @endif

{{-- Pagination --}}
@if($hasPaginator && $paginate && $paginator)
    <div class="mt-3">
        <x-oneui::pagination :paginator="$paginator" />
    </div>
@endif
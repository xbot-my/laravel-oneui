<table {{ $attributes->merge(['class' => 'table table-bordered table-striped table-vcenter js-dataTable']) }} id="{{ $id }}">
    <thead>
        <tr>
            @foreach($columns as $column)
                <th>{{ is_array($column) ? ($column['title'] ?? '') : $column }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @if(empty($ajax) && !empty($data))
            @foreach($data as $row)
                <tr>
                    @foreach($columns as $column)
                        <td>
                            @if(is_array($column) && isset($column['data']))
                                {{ data_get($row, $column['data']) }}
                            @else(is_array($column) && isset($column['key']))
                                {{ data_get($row, $column['key']) }}
                            @else
                                {{ is_array($row) ? ($row['data'] ?? '') : '' }}
                            @endif
                        </td>
                    @endforeach
                </tr>
            @endforeach
        @endif
    </tbody>
</table>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const table = document.getElementById('{{ $id }}');

    if (table && typeof $ !== 'undefined' && $.fn.DataTable) {
        $(table).DataTable({!! $dataTableOptions() !!});
    }
});
</script>

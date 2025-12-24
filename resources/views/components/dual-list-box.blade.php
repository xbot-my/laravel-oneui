@if($label)
    <label class="form-label">{{ $label }}</label>
@endif

<div class="oneui-dual-list-box" data-dual-list-id="{{ $id }}">
    <div class="row">
        {{-- Available List --}}
        <div class="col-md-5">
            @if($availableLabel)
            <label class="form-label d-block">{{ $availableLabel }}</label>
            @endif
            <select
                id="{{ $id }}-available"
                class="form-select dual-list-available"
                multiple
                size="8"
                style="height: {{ $height }}px;"
                {{ $disabled ? 'disabled' : '' }}
            >
                @foreach($getAvailable() as $value => $label)
                <option value="{{ $value }}">{{ $label }}</option>
                @endforeach
            </select>
        </div>

        {{-- Controls --}}
        <div class="col-md-2 d-flex align-items-center justify-content-center">
            <div class="btn-group-vertical">
                <button
                    type="button"
                    class="btn btn-primary dual-list-move-right"
                    data-target="{{ $id }}"
                    {{ $disabled ? 'disabled' : '' }}
                >
                    <i class="fa fa-fw fa-arrow-right"></i>
                </button>
                <button
                    type="button"
                    class="btn btn-primary dual-list-move-left"
                    data-target="{{ $id }}"
                    {{ $disabled ? 'disabled' : '' }}
                >
                    <i class="fa fa-fw fa-arrow-left"></i>
                </button>
                <button
                    type="button"
                    class="btn btn-secondary dual-list-move-all-right"
                    data-target="{{ $id }}"
                    {{ $disabled ? 'disabled' : '' }}
                >
                    <i class="fa fa-fw fa-angle-double-right"></i>
                </button>
                <button
                    type="button"
                    class="btn btn-secondary dual-list-move-all-left"
                    data-target="{{ $id }}"
                    {{ $disabled ? 'disabled' : '' }}
                >
                    <i class="fa fa-fw fa-angle-double-left"></i>
                </button>
            </div>
        </div>

        {{-- Selected List --}}
        <div class="col-md-5">
            @if($selectedLabel)
            <label class="form-label d-block">{{ $selectedLabel }}</label>
            @endif
            <select
                id="{{ $id }}-selected"
                name="{{ $name }}[]"
                class="form-select dual-list-selected"
                multiple
                size="8"
                style="height: {{ $height }}px;"
                {{ $disabled ? 'disabled' : '' }}
            >
                @foreach($selected as $value)
                <option value="{{ $value }}">{{ $selectedLabels[$value] ?? $value }}</option>
                @endforeach
            </select>
        </div>
    </div>

    {{-- Hidden field to store selected values as JSON for easy access --}}
    <input type="hidden" id="{{ $id }}-values" name="{{ $name }}_json" value='{{ json_encode($selected) }}'>
</div>

<script>
(function() {
    const container = document.querySelector('[data-dual-list-id="{{ $id }}"]');
    if (!container) return;

    const availableSelect = document.getElementById('{{ $id }}-available');
    const selectedSelect = document.getElementById('{{ $id }}-selected');
    const valuesInput = document.getElementById('{{ $id }}-values');

    // Move selected items
    container.querySelector('.dual-list-move-right').addEventListener('click', function() {
        Array.from(availableSelect.selectedOptions).forEach(function(option) {
            selectedSelect.appendChild(option);
        });
        updateValues();
    });

    container.querySelector('.dual-list-move-left').addEventListener('click', function() {
        Array.from(selectedSelect.selectedOptions).forEach(function(option) {
            availableSelect.appendChild(option);
        });
        updateValues();
    });

    // Move all items
    container.querySelector('.dual-list-move-all-right').addEventListener('click', function() {
        Array.from(availableSelect.options).forEach(function(option) {
            selectedSelect.appendChild(option);
        });
        updateValues();
    });

    container.querySelector('.dual-list-move-all-left').addEventListener('click', function() {
        Array.from(selectedSelect.options).forEach(function(option) {
            availableSelect.appendChild(option);
        });
        updateValues();
    });

    // Double click to move
    availableSelect.addEventListener('dblclick', function() {
        Array.from(this.selectedOptions).forEach(function(option) {
            selectedSelect.appendChild(option);
        });
        updateValues();
    });

    selectedSelect.addEventListener('dblclick', function() {
        Array.from(this.selectedOptions).forEach(function(option) {
            availableSelect.appendChild(option);
        });
        updateValues();
    });

    // Update hidden input with selected values
    function updateValues() {
        const selected = Array.from(selectedSelect.options).map(function(option) {
            return option.value;
        });
        valuesInput.value = JSON.stringify(selected);
    }

    // Initialize values input with current selection
    updateValues();
})();
</script>

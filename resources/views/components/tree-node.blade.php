@php
    $hasChildren = $node['hasChildren'] ?? false;
    $isExpanded = $node['expanded'] ?? false;
    $nodeId = $node['id'] ?? uniqid('node-');
@endphp

<li class="tree-node" data-node="{{ $nodeId }}">
    <div class="tree-node-content" data-node-id="{{ $nodeId }}">
        <span class="tree-node-label {{ $selected == $nodeId ? 'selected' : '' }}" data-node-id="{{ $nodeId }}">
            @if($hasChildren)
            <span class="tree-node-toggle {{ !$isExpanded ? 'collapsed' : '' }}">▼</span>
            @else
            <span style="width: 16px; display: inline-block;"></span>
            @endif

            @if($checkboxes)
            <input type="checkbox" class="tree-node-checkbox" value="{{ $nodeId }}">
            @endif

            <span>{{ $node['label'] }}</span>
        </span>
    </div>

    @if($hasChildren)
    <ul class="tree-node-children {{ $isExpanded ? 'expanded' : '' }}">
        @foreach($node['children'] as $child)
            @include('oneui::components.tree-node', ['node' => $child, 'selected' => $selected])
        @endforeach
    </ul>
    @endif
</li>

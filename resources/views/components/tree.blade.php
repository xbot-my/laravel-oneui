{{-- Tree Component --}}
<div {{ $attributes->merge(['id' => $id]) }} class="oneui-tree" data-tree-config="{!! $treeConfig() !!}">
    <ul class="tree-root" style="list-style: none; padding-left: 0;">
        @foreach($treeData as $node)
            @include('oneui::components.tree-node', ['node' => $node])
        @endforeach
    </ul>
</div>

@once
@push('styles)
<style>
.oneui-tree ul {
    list-style: none;
    padding-left: 20px;
}
.oneui-tree .tree-root {
    padding-left: 0;
}
.oneui-tree .tree-node {
    margin: 2px 0;
}
.oneui-tree .tree-node-label {
    padding: 4px 8px;
    border-radius: 4px;
    cursor: pointer;
    display: inline-flex;
    align-items: center;
    gap: 6px;
    user-select: none;
}
.oneui-tree .tree-node-label:hover {
    background-color: #f3f4f6;
}
.oneui-tree .tree-node-label.selected {
    background-color: #3b82f6;
    color: white;
}
.oneui-tree .tree-node-checkbox {
    margin: 0;
}
.oneui-tree .tree-node-toggle {
    width: 16px;
    height: 16px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    user-select: none;
    font-size: 10px;
    transition: transform 0.2s;
}
.oneui-tree .tree-node-toggle.collapsed {
    transform: rotate(-90deg);
}
.oneui-tree .tree-node-children {
    display: none;
}
.oneui-tree .tree-node-children.expanded {
    display: block;
}
.oneui-tree .tree-drag-over {
    background-color: #dbeafe;
    border: 2px dashed #3b82f6;
}
</style>
@endpush
@endonce

@push('scripts)
<script>
(function() {
    const treeEl = document.getElementById('{{ $id }}');
    if (!treeEl) return;

    const config = {!! $treeConfig() !!};

    // Initialize tree nodes
    function initTree() {
        // Node toggles
        treeEl.querySelectorAll('.tree-node-toggle').forEach(function(toggle) {
            toggle.addEventListener('click', function(e) {
                e.stopPropagation();
                const node = this.closest('.tree-node');
                const children = node.querySelector('.tree-node-children');

                if (children) {
                    children.classList.toggle('expanded');
                    this.classList.toggle('collapsed');
                }
            });
        });

        // Node selection
        if (config.selectable) {
            treeEl.querySelectorAll('.tree-node-label').forEach(function(label) {
                label.addEventListener('click', function(e) {
                    if (e.target.type === 'checkbox') return;

                    // Remove selected from all nodes
                    treeEl.querySelectorAll('.tree-node-label.selected').forEach(function(el) {
                        el.classList.remove('selected');
                    });

                    // Add selected to clicked node
                    this.classList.add('selected');

                    // Trigger custom event
                    treeEl.dispatchEvent(new CustomEvent('tree-select', {
                        detail: { nodeId: this.dataset.nodeId }
                    }));
                });
            });
        }

        // Initialize checkboxes
        if (config.checkboxes) {
            treeEl.querySelectorAll('.tree-node-checkbox').forEach(function(checkbox) {
                checkbox.addEventListener('change', function(e) {
                    e.stopPropagation();

                    // Update children
                    const node = this.closest('.tree-node');
                    const children = node.querySelectorAll('.tree-node-children .tree-node-checkbox');
                    children.forEach(function(child) {
                        child.checked = this.checked;
                        child.indeterminate = false;
                    }, this);

                    // Update parents
                    updateParentCheckboxes(node);

                    // Trigger custom event
                    treeEl.dispatchEvent(new CustomEvent('tree-check', {
                        detail: { nodeId: this.value, checked: this.checked }
                    }));
                });
            });
        }

        // Drag and drop
        if (config.dragAndDrop) {
            initDragAndDrop();
        }
    }

    function updateParentCheckboxes(node) {
        const parent = node.parentElement.closest('.tree-node');
        if (!parent) return;

        const checkbox = parent.querySelector(':scope > .tree-node-content > .tree-node-label > .tree-node-checkbox');
        if (!checkbox) return;

        const siblings = parent.querySelectorAll(':scope > .tree-node-children > .tree-node > .tree-node-content > .tree-node-label > .tree-node-checkbox');
        const checkedCount = Array.from(siblings).filter(function(cb) { return cb.checked; }).length;
        const indeterminateCount = Array.from(siblings).filter(function(cb) { return cb.indeterminate; }).length;

        if (checkedCount === siblings.length) {
            checkbox.checked = true;
            checkbox.indeterminate = false;
        } else if (checkedCount === 0 && indeterminateCount === 0) {
            checkbox.checked = false;
            checkbox.indeterminate = false;
        } else {
            checkbox.checked = false;
            checkbox.indeterminate = true;
        }

        updateParentCheckboxes(parent);
    }

    function initDragAndDrop() {
        const nodes = treeEl.querySelectorAll('.tree-node-content');

        nodes.forEach(function(node) {
            node.draggable = true;

            node.addEventListener('dragstart', function(e) {
                e.dataTransfer.effectAllowed = 'move';
                this.classList.add('tree-dragging');
            });

            node.addEventListener('dragend', function(e) {
                this.classList.remove('tree-dragging');
                treeEl.querySelectorAll('.tree-drag-over').forEach(function(el) {
                    el.classList.remove('tree-drag-over');
                });
            });

            node.addEventListener('dragover', function(e) {
                e.preventDefault();
                e.dataTransfer.dropEffect = 'move';
            });

            node.addEventListener('dragenter', function(e) {
                this.classList.add('tree-drag-over');
            });

            node.addEventListener('dragleave', function(e) {
                this.classList.remove('tree-drag-over');
            });

            node.addEventListener('drop', function(e) {
                e.preventDefault();
                this.classList.remove('tree-drag-over');

                const dragging = treeEl.querySelector('.tree-dragging');
                if (dragging && dragging !== this) {
                    // Move the dragged node
                    // This is a simplified implementation
                    treeEl.dispatchEvent(new CustomEvent('tree-move', {
                        detail: {
                            sourceId: dragging.dataset.nodeId,
                            targetId: this.dataset.nodeId
                        }
                    }));
                }
            });
        });
    }

    // Initialize on load
    initTree();
})();
</script>
@endpush

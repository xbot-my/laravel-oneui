<ul {{ $attributes->merge(['id' => $id, 'class' => 'oneui-sortable list-unstyled mb-0']) }}
    data-sortable-config="{!! $sortableConfig() !!}"
    @if($group) data-group="{{ $group }}" @endif
>
    @if($hasCustomItem())
        {{-- Use custom item template --}}
        {{ $item }}
    @else
        {{-- Default items --}}
        @foreach($items as $index => $item)
        <li class="sortable-item" data-index="{{ $index }}" data-id="{{ is_array($item) ? ($item['id'] ?? $index) : $item }}">
            <div class="sortable-item-content d-flex align-items-center p-2 border rounded mb-2 bg-white">
                @if($handle)
                <span class="{{ $handle }} text-muted me-2" style="cursor: grab;">
                    <i class="fa fa-fw fa-grip-vertical"></i>
                </span>
                @endif

                <div class="flex-grow-1">
                    {{ is_array($item) ? ($item['label'] ?? $item['name'] ?? $item[0] ?? $item) : $item }}
                </div>

                <button type="button" class="btn btn-sm btn-text text-muted sortable-remove" data-index="{{ $index }}">
                    <i class="fa fa-fw fa-times"></i>
                </button>
            </div>
        </li>
        @endforeach
    @endif
</ul>

@once
@push('styles)
<style>
.oneui-sortable .sortable-item {
    cursor: move;
}
.oneui-sortable .sortable-item.sortable-ghost {
    opacity: 0.4;
    background-color: #f3f4f6;
}
.oneui-sortable .sortable-item.sortable-chosen {
    background-color: #dbeafe;
}
.oneui-sortable .sortable-item.sortable-drag {
    opacity: 0.8;
}
.oneui-sortable .sortable-item-content {
    transition: background-color 0.15s, box-shadow 0.15s;
}
.oneui-sortable .sortable-item-content:hover {
    background-color: #f9fafb;
}
.oneui-sortable .sortable-item.dragging {
    opacity: 0.5;
}
</style>
@endpush
@endonce

@push('scripts)
<script>
(function() {
    function initSortable(el) {
        const config = el.dataset.sortableConfig ? JSON.parse(el.dataset.sortableConfig) : {};

        // Simple drag and drop implementation without external library
        let draggedItem = null;
        let placeholder = null;

        // Make items draggable
        function makeDraggable() {
            const items = el.querySelectorAll('.sortable-item');
            let touchStartY = 0;
            let touchStartX = 0;

            items.forEach(function(item) {
                // Mouse events
                item.addEventListener('mousedown', function(e) {
                    // Check if clicking on handle (if specified)
                    if (config.handle) {
                        const handle = this.querySelector(config.handle);
                        if (handle && !e.target.closest(config.handle)) {
                            return;
                        }
                    }

                    // Check if clicking remove button
                    if (e.target.closest('.sortable-remove')) {
                        return;
                    }

                    if (config.disabled) return;

                    draggedItem = this;
                    this.classList.add('dragging');
                    e.preventDefault();
                });

                // Touch events
                item.addEventListener('touchstart', function(e) {
                    if (config.delay > 0) {
                        touchStartY = e.touches[0].clientY;
                        touchStartX = e.touches[0].clientX;
                    }

                    if (config.handle) {
                        const handle = this.querySelector(config.handle);
                        if (handle && !e.target.closest(config.handle)) {
                            return;
                        }
                    }

                    if (e.target.closest('.sortable-remove')) return;
                    if (config.disabled) return;
                });

                item.addEventListener('touchmove', function(e) {
                    if (config.delay > 0) {
                        const touch = e.touches[0];
                        const moveY = Math.abs(touch.clientY - touchStartY);
                        const moveX = Math.abs(touch.clientX - touchStartX);

                        if (moveY < 10 && moveX < 10) return;
                    }

                    if (draggedItem) return;

                    draggedItem = this;
                    this.classList.add('dragging');
                });

                item.addEventListener('touchend', function(e) {
                    if (draggedItem === this) {
                        draggedItem = null;
                        this.classList.remove('dragging');
                    }
                });
            });
        }

        // Handle drag over
        el.addEventListener('dragover', function(e) {
            e.preventDefault();
            if (!draggedItem || draggedItem === e.target.closest('.sortable-item')) return;

            const afterElement = getDragAfterElement(el, e.clientY);
            if (afterElement == null) {
                el.appendChild(draggedItem);
            } else {
                el.insertBefore(draggedItem, afterElement);
            }
        });

        el.addEventListener('drop', function(e) {
            e.preventDefault();
            if (draggedItem) {
                draggedItem.classList.remove('dragging');
                draggedItem.classList.add('sortable-chosen');
                setTimeout(() => draggedItem.classList.remove('sortable-chosen'), 300);

                // Trigger sort event
                if (config.onSort) {
                    try {
                        const order = getOrder();
                        if (typeof window[config.onSort] === 'function') {
                            window[config.onSort](order);
                        }
                    } catch (err) {
                        console.error('Sortable onSort error:', err);
                    }
                }

                draggedItem = null;
            }
        });

        // Mouse move handler for dragging
        document.addEventListener('mousemove', function(e) {
            if (!draggedItem) return;

            draggedItem.style.position = 'fixed';
            draggedItem.style.left = e.clientX + 'px';
            draggedItem.style.top = e.clientY + 'px';
            draggedItem.style.zIndex = '1000';
            draggedItem.style.pointerEvents = 'none';
        });

        document.addEventListener('mouseup', function(e) {
            if (!draggedItem) return;

            draggedItem.style.position = '';
            draggedItem.style.left = '';
            draggedItem.style.top = '';
            draggedItem.style.zIndex = '';
            draggedItem.style.pointerEvents = '';

            const afterElement = getDragAfterElement(el, e.clientY);
            if (afterElement == null) {
                el.appendChild(draggedItem);
            } else {
                el.insertBefore(draggedItem, afterElement);
            }

            draggedItem.classList.remove('dragging');

            // Trigger sort event
            if (config.onSort) {
                try {
                    const order = getOrder();
                    if (typeof window[config.onSort] === 'function') {
                        window[config.onSort](order);
                    }
                } catch (err) {
                    console.error('Sortable onSort error:', err);
                }
            }

            draggedItem = null;
        });

        // Remove button handler
        el.querySelectorAll('.sortable-remove').forEach(function(btn) {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                const item = this.closest('.sortable-item');
                const index = item.dataset.index;

                item.remove();

                // Update indices
                el.querySelectorAll('.sortable-item').forEach(function(item, i) {
                    item.dataset.index = i;
                });
            });
        });

        function getDragAfterElement(container, y) {
            const draggableElements = [...container.querySelectorAll('.sortable-item:not(.dragging)')];

            return draggableElements.reduce(function(closest, child) {
                const box = child.getBoundingClientRect();
                const offset = y - box.top - box.height / 2;

                if (offset < 0 && offset > closest.offset) {
                    return { offset: offset, element: child };
                } else {
                    return closest;
                }
            }, { offset: Number.NEGATIVE_INFINITY }).element;
        }

        function getOrder() {
            return [...el.querySelectorAll('.sortable-item')].map(function(item) {
                return item.dataset.id || item.dataset.index;
            });
        }

        makeDraggable();
    }

    // Initialize all sortables
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.oneui-sortable').forEach(function(el) {
            initSortable(el);
        });
    });
})();
</script>
@endpush

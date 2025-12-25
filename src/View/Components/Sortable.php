<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Sortable Component - Draggable sortable lists
 *
 * Usage:
 * <x-oneui::sortable group="items" :items="['Item 1', 'Item 2', 'Item 3']" />
 * <x-oneui::sortable group="tasks" handle=".drag-handle">
 *     <x-slot:item>
 *         Custom item template
 *     </x-slot:item>
 * </x-oneui::sortable>
 */
class Sortable extends Component
{
    public function __construct(
        public string $id = '',
        public ?string $group = null,
        public array $items = [],
        public ?string $handle = null, // CSS selector for drag handle
        public string $animation = '150ms',
        public bool $delayOnTouchOnly = true,
        public int $delay = 0,
        public bool $dragDisabled = false,
        public bool $dropDisabled = false,
        public bool $multiDrag = false,
        public ?string $ghostClass = null,
        public ?string $chosenClass = null,
        public ?string $dragClass = null,
        public ?string $onStart = null, // JavaScript callback
        public ?string $onEnd = null, // JavaScript callback
        public ?string $onSort = null, // JavaScript callback
        public array $options = [],
    ) {
        // Generate unique ID if not provided
        if ($this->id === '') {
            $this->id = 'sortable-' . uniqid();
        }
    }

    /**
     * Get Sortable configuration as JavaScript object
     */
    public function sortableConfig(): string
    {
        $config = [
            'animation' => $this->animation,
            'delayOnTouchOnly' => $this->delayOnTouchOnly,
            'delay' => $this->delay,
            'disabled' => $this->dragDisabled,
            'filter' => $this->dropDisabled ? '.sortable-disabled' : null,
        ];

        if ($this->handle) {
            $config['handle'] = $this->handle;
        }

        if ($this->group) {
            $config['group'] = $this->group;
        }

        if ($this->multiDrag) {
            $config['multiDrag'] = true;
        }

        if ($this->ghostClass) {
            $config['ghostClass'] = $this->ghostClass;
        }

        if ($this->chosenClass) {
            $config['chosenClass'] = $this->chosenClass;
        }

        if ($this->dragClass) {
            $config['dragClass'] = $this->dragClass;
        }

        // Callbacks
        if ($this->onStart) {
            $config['onStart'] = 'window.' . $this->onStart;
        }

        if ($this->onEnd) {
            $config['onEnd'] = 'window.' . $this->onEnd;
        }

        if ($this->onSort) {
            $config['onSort'] = 'window.' . $this->onSort;
        }

        return json_encode(array_merge($config, $this->options), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Check if custom item slot is provided
     */
    public function hasCustomItem(): bool
    {
        return isset($this->item);
    }

    public function render(): View
    {
        return view('oneui::components.sortable');
    }
}

<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * DualListBox Component - Dual list box for item selection
 *
 * Usage:
 * <x-oneui::dual-list-box name="roles" :available="['admin', 'user', 'guest']" :selected="['admin']" />
 */
class DualListBox extends Component
{
    public function __construct(
        public string $name,
        public ?string $id = null,
        public ?string $label = null,
        public array $available = [],
        public array $selected = [],
        public array $availableLabels = [],
        public array $selectedLabels = [],
        public ?string $availableLabel = 'Available',
        public ?string $selectedLabel = 'Selected',
        public int $height = 200,
        public bool $searchable = false,
        public bool $disabled = false,
    ) {
        $this->id = $id ?? 'dual-list-' . $name;

        // Use provided labels or fall back to keys
        if (empty($this->availableLabels)) {
            $this->availableLabels = array_combine($this->available, $this->available);
        }
        if (empty($this->selectedLabels)) {
            $this->selectedLabels = array_combine($this->selected, $this->selected);
        }
    }

    /**
     * Get available items (remove selected)
     */
    public function getAvailable(): array
    {
        return array_diff_key($this->availableLabels, array_flip($this->selected));
    }

    public function render(): View
    {
        return view('oneui::components.dual-list-box');
    }
}

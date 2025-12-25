<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Tree Component - Hierarchical tree view
 *
 * Usage:
 * <x-oneui::tree :data="[
 *     ['id' => 1, 'text' => 'Node 1', 'children' => [['id' => 2, 'text' => 'Child 1']]],
 *     ['id' => 3, 'text' => 'Node 2']
 * ]" />
 */
class Tree extends Component
{
    public function __construct(
        public string $id = '',
        public array $data = [],
        public bool $checkboxes = false,
        public bool $dragAndDrop = false,
        public bool $expandAll = true,
        public int $expandedLevel = 1,
        public string $nodeKey = 'id',
        public string $labelKey = 'text',
        public string $childrenKey = 'children',
        public bool $selectable = true,
        public ?string $selected = null,
        public array $options = [],
    ) {
        // Generate unique ID if not provided
        if ($this->id === '') {
            $this->id = 'tree-' . uniqid();
        }
    }

    /**
     * Render tree data to nested array structure
     */
    public function renderTree(array $nodes, int $level = 0): array
    {
        $result = [];

        foreach ($nodes as $node) {
            $hasChildren = !empty($node[$this->childrenKey]);

            $result[] = [
                'id' => $node[$this->nodeKey] ?? uniqid('node-'),
                'label' => $node[$this->labelKey] ?? 'Unknown',
                'level' => $level,
                'hasChildren' => $hasChildren,
                'expanded' => $level < $this->expandedLevel || ($this->expandAll && $hasChildren),
                'children' => $hasChildren ? $this->renderTree($node[$this->childrenKey], $level + 1) : [],
            ];
        }

        return $result;
    }

    /**
     * Get tree configuration as JavaScript object
     */
    public function treeConfig(): string
    {
        $config = [
            'checkboxes' => $this->checkboxes,
            'dragAndDrop' => $this->dragAndDrop,
            'selectable' => $this->selectable,
            'selected' => $this->selected,
        ];

        return json_encode(array_merge($config, $this->options), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    public function render(): View
    {
        $treeData = $this->renderTree($this->data);

        return view('oneui::components.tree')
            ->with('treeData', $treeData);
    }
}

<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * DataTables Component - DataTables.net wrapper
 *
 * Creates interactive data tables with sorting, filtering, pagination
 *
 * Usage:
 * <x-oneui::datatables id="usersTable" :columns="$columns" :data="$data" />
 * <x-oneui::datatables id="ordersTable" :columns="$columns" :ajax="route('api.orders')" :options="$options" />
 */
class DataTables extends Component
{
    public function __construct(
        public string $id,
        public array $columns = [],
        public ?string $ajax = null, // AJAX source URL
        public array $data = [], // Client-side data
        public array $options = [],
        public bool $responsive = true,
        public bool $paging = true,
        public bool $searching = true,
        public bool $ordering = true,
        public bool $info = true,
        public int $pageLength = 10,
        public bool $buttons = false, // Enable buttons (copy, csv, excel, pdf, print)
        public array $buttonConfig = [], // Custom button configuration
        public string $order = '[[0, "asc"]]', // Default column order
        public ?string $rowCallback = null, // Custom JS callback for row rendering
    ) {
    }

    /**
     * Get DataTables configuration as JavaScript object
     */
    public function dataTableOptions(): string
    {
        $options = [
            'responsive' => $this->responsive,
            'paging' => $this->paging,
            'searching' => $this->searching,
            'ordering' => $this->ordering,
            'info' => $this->info,
            'pageLength' => $this->pageLength,
            'order' => $this->parseOrder($this->order),
        ];

        // Add AJAX source if provided
        if ($this->ajax) {
            $options['ajax'] = $this->ajax;
        }

        // Add client-side data if provided (no AJAX)
        if (!empty($this->data) && !$this->ajax) {
            $options['data'] = $this->data;
        }

        // Define columns
        if (!empty($this->columns)) {
            $columnDefs = [];
            foreach ($this->columns as $index => $column) {
                if (is_array($column)) {
                    $colDef = [];

                    if (isset($column['title'])) {
                        $colDef['title'] = $column['title'];
                    }
                    if (isset($column['data'])) {
                        $colDef['data'] = $column['data'];
                    }
                    if (isset($column['name'])) {
                        $colDef['name'] = $column['name'];
                    }
                    if (isset($column['orderable']) && !$column['orderable']) {
                        $colDef['orderable'] = false;
                    }
                    if (isset($column['searchable']) && !$column['searchable']) {
                        $colDef['searchable'] = false;
                    }
                    if (isset($column['className'])) {
                        $colDef['className'] = $column['className'];
                    }
                    if (isset($column['render'])) {
                        $colDef['render'] = $column['render'];
                    }
                    if (isset($column['width'])) {
                        $colDef['width'] = $column['width'];
                    }

                    if (!empty($colDef)) {
                        $colDef['targets'] = $index;
                        $columnDefs[] = $colDef;
                    }
                }
            }

            if (!empty($columnDefs)) {
                $options['columnDefs'] = $columnDefs;
            }
        }

        // Add buttons if enabled
        if ($this->buttons) {
            $defaultButtons = ['copy', 'csv', 'excel', 'pdf', 'print'];
            $buttons = !empty($this->buttonConfig) ? $this->buttonConfig : [
                ['extend' => 'copy', 'text' => '<i class="fa fa-copy"></i> Copy'],
                ['extend' => 'csv', 'text' => '<i class="fa fa-file-csv"></i> CSV'],
                ['extend' => 'excel', 'text' => '<i class="fa fa-file-excel"></i> Excel'],
                ['extend' => 'pdf', 'text' => '<i class="fa fa-file-pdf"></i> PDF'],
                ['extend' => 'print', 'text' => '<i class="fa fa-print"></i> Print'],
            ];
            $options['buttons'] = $buttons;

            // Configure DOM to include buttons
            if (!isset($options['dom'])) {
                $options['dom'] = "<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>><'row'<'col-sm-12'tr>><'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>><'row'<'col-sm-12'B>>";
            }
        }

        // Add row callback if provided
        if ($this->rowCallback) {
            $options['rowCallback'] = $this->rowCallback;
        }

        // Merge with custom options (custom options take precedence)
        $options = array_merge($options, $this->options);

        return $this->arrayToJs($options);
    }

    /**
     * Parse order string to array
     */
    protected function parseOrder(string $order): string
    {
        // Already in correct format [[0, "asc"]]
        if (str_starts_with($order, '[')) {
            return $order;
        }

        // Simple format like "0,asc" or "0"
        $parts = explode(',', $order);
        $column = (int) trim($parts[0]);
        $direction = isset($parts[1]) ? trim($parts[1]) : 'asc';

        return "[[{$column}, '{$direction}']]";
    }

    /**
     * Convert PHP array to JavaScript object (non-recursive)
     */
    protected function arrayToJs(array $data): string
    {
        $js = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        // Handle function strings (convert to actual functions)
        $js = preg_replace(
            '/"function\((.*?)\) {(.*?)\}"/s',
            'function($1) {$2}',
            $js
        );

        return $js;
    }

    public function render(): View
    {
        return view('oneui::components.datatables');
    }
}

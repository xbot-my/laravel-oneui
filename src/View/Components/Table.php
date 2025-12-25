<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\View\Component;
use XBot\OneUI\Support\DataAdapter;
use XBot\OneUI\Support\DataItem;
use XBot\OneUI\Support\Formatters\CurrencyFormatter;
use XBot\OneUI\Support\Formatters\DateFormatter;
use XBot\OneUI\Support\ItemCollection;

/**
 * Table Component
 *
 * Data-driven table component with automatic column detection, formatters, and pagination support.
 * Handles arrays, Collections, Eloquent models, and Paginators automatically.
 *
 * Usage:
 * <x-oneui::table :data="$users" :columns="['name', 'email', 'created_at']" />
 * <x-oneui::table :data="$items" :columns="['title' => ['label' => 'Title'], 'price']" :striped="true" />
 * <x-oneui::table :data="$posts" :columns="['title', 'published_at' => ['format' => 'date']" />
 */
class Table extends Component
{
    protected DataAdapter $adapter;

    public ItemCollection $items;

    public array $columnConfig = [];

    public bool $hasPaginator = false;

    public ?LengthAwarePaginator $paginator = null;

    public function __construct(
        public mixed $data = null,
        public array $columns = [],
        public bool $striped = false,
        public bool $hover = true,
        public bool $bordered = false,
        public bool $borderless = false,
        public bool $vcenter = true,
        public bool $responsive = true,
        public bool $paginate = true,
        public string $identifierKey = 'id',
    ) {
        $this->initializeData();
        $this->processColumns();
    }

    /**
     * Initialize data
     */
    protected function initializeData(): void
    {
        $this->adapter = new DataAdapter($this->data, $this->identifierKey);
        $this->items = $this->adapter->toItems();
        $this->hasPaginator = $this->adapter->hasPaginator();
        $this->paginator = $this->adapter->getPaginator();
    }

    /**
     * Process column configuration
     */
    protected function processColumns(): void
    {
        foreach ($this->columns as $key => $value) {
            if (is_numeric($key)) {
                // Simple: ['id', 'name', 'email']
                $this->columnConfig[$value] = [
                    'key' => $value,
                    'label' => $this->formatLabel($value),
                ];
            } elseif (is_string($value)) {
                // Mapped: ['id' => '#', 'name' => 'Name']
                $this->columnConfig[$key] = [
                    'key' => $key,
                    'label' => $value,
                ];
            } else {
                // Advanced: ['status' => ['label' => 'Status', 'badge' => true, ...]]
                $this->columnConfig[$key] = array_merge([
                    'key' => $key,
                    'label' => $this->formatLabel($key),
                ], $value);
            }
        }
    }

    /**
     * Format label
     */
    protected function formatLabel(string $key): string
    {
        return ucwords(str_replace(['_', '-'], ' ', $key));
    }

    /**
     * Check if has data
     */
    public function hasData(): bool
    {
        return $this->items->isNotEmpty() && !empty($this->columnConfig);
    }

    /**
     * Get cell value
     */
    public function getCellValue(DataItem $row, array $col): mixed
    {
        return $row->getValue($col['key']);
    }

    /**
     * Format cell value
     */
    public function formatCellValue(mixed $value, array $col): string
    {
        if ($value === null) {
            return '';
        }

        // Date formatting
        if (!empty($col['format']) && $col['format'] === 'date' && $value) {
            $formatter = new DateFormatter;

            return $formatter->format($value, $col);
        }

        // Currency formatting
        if (!empty($col['format']) && $col['format'] === 'currency') {
            $formatter = new CurrencyFormatter;

            return $formatter->format($value, $col);
        }

        return (string) $value;
    }

    /**
     * Sanitize HTML to prevent XSS attacks
     *
     * Allows only safe HTML tags and strips all others.
     * Use this method when displaying user-generated HTML content.
     */
    public function sanitizeHtml(?string $html, array $col = []): string
    {
        if ($html === null || $html === '') {
            return '';
        }

        // Get allowed tags from column config, or use default safe tags
        $allowedTags = $col['allowedTags'] ?? '<p><br><strong><em><b><i><u><a><ul><ol><li><span><div><h1><h2><h3><h4><h5><h6>';

        // Strip dangerous tags and attributes
        $cleaned = strip_tags($html, $allowedTags);

        // Remove dangerous JavaScript function calls (alert, confirm, prompt, eval, etc.)
        $cleaned = preg_replace('/\b(alert|confirm|prompt|eval|document\.|window\.|console\.|location\.)/i', '', $cleaned);

        // Remove onclick, onerror, etc.
        $cleaned = preg_replace('/\s*on\w+\s*=\s*["\'][^"\']*["\']/', '', $cleaned);

        // Remove javascript: protocol
        $cleaned = preg_replace_callback('/(<a\s[^>]*href\s*=\s*["\'])javascript:[^"\']*(["\'])/i', function ($matches) {
            return $matches[1] . '#"' . $matches[2];
        }, $cleaned);

        return $cleaned;
    }

    /**
     * Check if should render as Badge
     */
    public function shouldRenderBadge(array $col): bool
    {
        return !empty($col['badge']);
    }

    /**
     * Get Badge type
     */
    public function getBadgeType(mixed $value, array $col): string
    {
        if (!empty($col['badgeMap']) && isset($col['badgeMap'][$value])) {
            return $col['badgeMap'][$value];
        }

        return $col['badgeType'] ?? 'primary';
    }

    /**
     * Get table CSS classes
     */
    public function tableClasses(): string
    {
        $classes = ['table'];

        if ($this->striped) {
            $classes[] = 'table-striped';
        }
        if ($this->hover) {
            $classes[] = 'table-hover';
        }
        if ($this->bordered) {
            $classes[] = 'table-bordered';
        }
        if ($this->borderless) {
            $classes[] = 'table-borderless';
        }
        if ($this->vcenter) {
            $classes[] = 'table-vcenter';
        }

        return implode(' ', $classes);
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('oneui::components.table');
    }
}

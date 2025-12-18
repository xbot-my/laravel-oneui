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
 * Table 组件
 *
 * 支持数据驱动的表格渲染，自动处理 array、Collection、Eloquent、Paginator。
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
     * 初始化数据
     */
    protected function initializeData(): void
    {
        $this->adapter = new DataAdapter($this->data, $this->identifierKey);
        $this->items = $this->adapter->toItems();
        $this->hasPaginator = $this->adapter->hasPaginator();
        $this->paginator = $this->adapter->getPaginator();
    }

    /**
     * 处理列配置
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
     * 格式化标签
     */
    protected function formatLabel(string $key): string
    {
        return ucwords(str_replace(['_', '-'], ' ', $key));
    }

    /**
     * 是否有数据
     */
    public function hasData(): bool
    {
        return $this->items->isNotEmpty() && !empty($this->columnConfig);
    }

    /**
     * 获取单元格值
     */
    public function getCellValue(DataItem $row, array $col): mixed
    {
        return $row->getValue($col['key']);
    }

    /**
     * 格式化单元格值
     */
    public function formatCellValue(mixed $value, array $col): string
    {
        if ($value === null) {
            return '';
        }

        // 日期格式化
        if (!empty($col['format']) && $col['format'] === 'date' && $value) {
            $formatter = new DateFormatter;

            return $formatter->format($value, $col);
        }

        // 货币格式化
        if (!empty($col['format']) && $col['format'] === 'currency') {
            $formatter = new CurrencyFormatter;

            return $formatter->format($value, $col);
        }

        return (string) $value;
    }

    /**
     * 是否渲染为 Badge
     */
    public function shouldRenderBadge(array $col): bool
    {
        return !empty($col['badge']);
    }

    /**
     * 获取 Badge 类型
     */
    public function getBadgeType(mixed $value, array $col): string
    {
        if (!empty($col['badgeMap']) && isset($col['badgeMap'][$value])) {
            return $col['badgeMap'][$value];
        }

        return $col['badgeType'] ?? 'primary';
    }

    /**
     * 获取表格 CSS 类
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

    public function render()
    {
        return view('oneui::components.table');
    }
}

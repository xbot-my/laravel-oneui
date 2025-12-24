<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Range Component - Ion Range Slider wrapper
 *
 * Usage:
 * <x-oneui::range name="volume" min="0" max="100" :from="30" />
 * <x-oneui::range name="price" min="0" max="1000" :from="200" :to="800" prefix="$" />
 * <x-oneui::range name="dates" type="double" grid="true" :grid-num="7" />
 */
class Range extends Component
{
    public function __construct(
        public string $name,
        public string $id = null,
        public float|int $min = 0,
        public float|int|string $max = 100,
        public float|int $from = 0,
        public ?float|int $to = null,
        public string $type = 'single', // single, double
        public string $prefix = '',
        public string $postfix = '',
        public bool $grid = false,
        public int $gridNum = 10,
        public bool $disable = false,
        public string $skin = 'round', // round, flat, big
        public array $extraOptions = [], // Additional ion-rangeslider options
    ) {
        $this->id = $id ?? $this->name;
        $this->to ??= $from;
    }

    public function dataOptions(): string
    {
        $options = array_merge($this->extraOptions, [
            'type' => $this->type,
            'min' => $this->min,
            'max' => $this->max,
            'from' => $this->from,
            'to' => $this->to,
            'prefix' => $this->prefix,
            'postfix' => $this->postfix,
            'grid' => $this->grid,
            'grid_num' => $this->gridNum,
            'skin' => $this->skin,
            'disable' => $this->disable,
        ]);

        // Convert to JavaScript object
        $pairs = [];
        foreach ($options as $key => $value) {
            if (is_bool($value)) {
                $pairs[] = sprintf('%s:%s', $key, $value ? 'true' : 'false');
            } elseif (is_numeric($value)) {
                $pairs[] = sprintf('%s:%s', $key, $value);
            } elseif (is_string($value)) {
                $pairs[] = sprintf('%s:"%s"', $key, addslashes($value));
            } elseif (is_array($value)) {
                $pairs[] = sprintf('%s:%s', $key, json_encode($value));
            }
        }

        return '{' . implode(',', $pairs) . '}';
    }

    public function render(): View
    {
        return view('oneui::components.range');
    }
}

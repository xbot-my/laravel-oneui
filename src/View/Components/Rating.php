<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Rating Component - Raty.js wrapper
 *
 * Usage:
 * <x-oneui::rating name="rating" :score="3" />
 * <x-oneui::rating name="product_rating" :score="4.5" :half="true" :number="10" />
 * <x-oneui::rating name="service" :score="5" :readonly="true" />
 */
class Rating extends Component
{
    public function __construct(
        public string $name,
        public ?string $id = null,
        public float $score = 0,
        public int $number = 5,
        public bool $half = false,
        public bool $readonly = false,
        public bool $cancel = false,
        public string $cancelPlace = 'left', // left, right
        public string $starType = 'star', // star, emoji
        public array $hints = [],
        public array $extraOptions = [],
    ) {
        $this->id = $id ?? $this->name;
    }

    public function dataOptions(): string
    {
        $options = array_merge($this->extraOptions, [
            'score' => $this->score,
            'number' => $this->number,
            'half' => $this->half,
            'readOnly' => $this->readonly,
            'cancel' => $this->cancel,
            'cancelPlace' => $this->cancelPlace,
            'starType' => $this->starType,
        ]);

        if (!empty($this->hints)) {
            $options['hints'] = $this->hints;
        }

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
        return view('oneui::components.rating');
    }
}

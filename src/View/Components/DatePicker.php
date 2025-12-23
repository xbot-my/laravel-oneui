<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\View\Component;

/**
 * DatePicker Component
 *
 * Usage:
 * <x-oneui::datepicker name="date" />
 * <x-oneui::datepicker name="date" format="yyyy-mm-dd" />
 */
class DatePicker extends Component
{
    public function __construct(
        public string $name,
        public ?string $id = null,
        public ?string $value = null,
        public ?string $label = null,
        public string $format = 'yyyy-mm-dd',
        public ?string $placeholder = null,
        public bool $autoclose = true,
        public bool $todayHighlight = true,
        public ?string $startDate = null,
        public ?string $endDate = null,
    ) {
        $this->id = $id ?? $name;
    }

    public function jsOptions(): string
    {
        $options = [
            'format' => $this->format,
            'autoclose' => $this->autoclose,
            'todayHighlight' => $this->todayHighlight,
        ];

        if ($this->startDate) {
            $options['startDate'] = $this->startDate;
        }

        if ($this->endDate) {
            $options['endDate'] = $this->endDate;
        }

        return json_encode($options);
    }

    public function render(): \Illuminate\Contracts\View\View
    {
        return view('oneui::components.datepicker');
    }
}

<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * InputMask Component - jQuery Masked Input wrapper
 *
 * Usage:
 * <x-oneui::input-mask name="phone" mask="phone" />
 * <x-oneui::input-mask name="date" mask="date" placeholder="dd/mm/yyyy" />
 * <x-oneui::input-mask name="ssn" mask="ssn" />
 * <x-oneui::input-mask name="custom" mask="999-999" placeholder="___-___" />
 */
class InputMask extends Component
{
    public const PREDEFINED_MASKS = [
        'date' => '99/99/9999',
        'date-dash' => '99-99-9999',
        'phone' => '(999) 999-9999',
        'phone-ext' => '(999) 999-9999? x99999',
        'taxid' => '99-9999999',
        'ssn' => '999-99-9999',
        'pkey' => 'a*-999-a999',
        'time' => '99:99',
    ];

    public function __construct(
        public string $name,
        public ?string $id = null,
        public string $mask = 'date', // predefined mask name or custom mask string
        public ?string $placeholder = null,
        public ?string $label = null,
        public bool $autofocus = false,
        public bool $readonly = false,
        public bool $disabled = false,
        public ?string $value = null,
    ) {
        $this->id = $id ?? $name;
        $this->placeholder ??= $this->getDefaultPlaceholder();
    }

    public function getMaskPattern(): string
    {
        return self::PREDEFINED_MASKS[$this->mask] ?? $this->mask;
    }

    public function getMaskClass(): string
    {
        $classMap = [
            'date' => 'js-masked-date',
            'date-dash' => 'js-masked-date-dash',
            'phone' => 'js-masked-phone',
            'phone-ext' => 'js-masked-phone-ext',
            'taxid' => 'js-masked-taxid',
            'ssn' => 'js-masked-ssn',
            'pkey' => 'js-masked-pkey',
            'time' => 'js-masked-time',
        ];

        return $classMap[$this->mask] ?? 'js-masked-custom';
    }

    public function getDefaultPlaceholder(): string
    {
        $placeholders = [
            'date' => 'dd/mm/yyyy',
            'date-dash' => 'dd-mm-yyyy',
            'phone' => '(999) 999-9999',
            'phone-ext' => '(999) 999-9999? x99999',
            'taxid' => '99-9999999',
            'ssn' => '999-99-9999',
            'pkey' => 'a*-999-a999',
            'time' => '00:00',
        ];

        return $placeholders[$this->mask] ?? str_replace(['9', 'a', '*'], '_', $this->getMaskPattern());
    }

    public function render(): View
    {
        return view('oneui::components.input-mask');
    }
}

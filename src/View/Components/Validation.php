<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Validation Component - Display validation errors for a form field
 *
 * Usage:
 * <x-oneui::validation field="email" :errors="$errors" />
 *
 * Or with custom messages:
 * <x-oneui::validation :messages="['email' => 'Please enter a valid email']" />
 */
class Validation extends Component
{
    public function __construct(
        public ?string $field = null,
        public ?\Illuminate\View\ViewErrorBag $errors = null,
        public ?array $messages = null,
    ) {
        $this->errors ??= request()->session()->get('errors') ?: app(\Illuminate\Contracts\View\Factory::class)->getShared()['errors'] ?? new \Illuminate\View\ViewErrorBag();
    }

    public function hasErrors(): bool
    {
        if ($this->messages !== null) {
            return !empty($this->messages);
        }

        return $this->field && $this->errors->has($this->field);
    }

    public function errorMessages(): array
    {
        if ($this->messages !== null) {
            return $this->messages;
        }

        return $this->field ? $this->errors->get($this->field) : [];
    }

    public function render(): View
    {
        return view('oneui::components.validation');
    }
}

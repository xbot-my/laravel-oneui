<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * Steps Component - Step wizard display
 *
 * Creates a step indicator for multi-step processes
 *
 * Usage:
 * <x-oneui::steps :steps="['Step 1', 'Step 2', 'Step 3']" :current="1" />
 * <x-oneui::steps :steps="$steps" current="2" variant="circles" />
 */
class Steps extends Component
{
    public function __construct(
        public array $steps = [],
        public int $current = 1,
        public string $variant = 'default', // default, circles, pills, tabs
        public string $size = 'md', // sm, md, lg
        public string $alignment = 'center', // left, center, right
        public bool $clickable = false,
        public bool $showNumbers = true,
        public ?string $completedIcon = 'fa fa-check',
        public array $descriptions = [],
    ) {
    }

    /**
     * Get total number of steps
     */
    public function getTotal(): int
    {
        return count($this->steps);
    }

    /**
     * Get step status class
     */
    public function getStepStatus(int $index): string
    {
        if ($index < $this->current) {
            return 'completed';
        } elseif ($index === $this->current) {
            return 'active';
        }
        return 'pending';
    }

    /**
     * Get step width percentage
     */
    public function getStepWidth(): float
    {
        return 100 / $this->getTotal();
    }

    /**
     * Get container classes
     */
    public function getContainerClasses(): string
    {
        $classes = ['steps', 'steps-' . $this->variant, 'steps-' . $this->size];

        if ($this->alignment) {
            $classes[] = 'steps-' . $this->alignment;
        }

        if ($this->clickable) {
            $classes[] = 'steps-clickable';
        }

        return implode(' ', $classes);
    }

    public function render(): View
    {
        return view('oneui::components.steps');
    }
}

<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Carbon\Carbon;

/**
 * Countdown Component - Countdown timer
 *
 * Usage:
 * <x-oneui::countdown :until="now()->addDays(7)" />
 * <x-oneui::countdown :seconds="3600" format="DHMS" />
 */
class Countdown extends Component
{
    public function __construct(
        public string $id = 'countdown-' . uniqid(),
        public ?string $until = null, // Date string or Carbon instance
        public ?int $seconds = null,
        public string $format = 'dHMS', // d, H, M, S combinations
        public bool $compact = false,
        public bool $showLabels = true,
        public ?string $onComplete = null, // JavaScript callback
        public ?string $onTick = null, // JavaScript callback
        public array $options = [],
    ) {
        // Convert until to timestamp
        if ($this->until) {
            if (is_string($this->until)) {
                $this->until = Carbon::parse($this->until);
            } elseif (!$this->until instanceof Carbon) {
                $this->until = Carbon::instance($this->until);
            }
        }

        // Calculate remaining seconds
        if ($this->until && !$this->seconds) {
            $this->seconds = max(0, Carbon::now()->diffInSeconds($this->until));
        } elseif (!$this->seconds) {
            $this->seconds = 0;
        }
    }

    /**
     * Get countdown configuration as JavaScript object
     */
    public function countdownConfig(): string
    {
        $config = [
            'until' => $this->until ? $this->until->toIso8601String() : null,
            'seconds' => $this->seconds,
            'format' => $this->format,
            'compact' => $this->compact,
            'showLabels' => $this->showLabels,
            'onComplete' => $this->onComplete,
            'onTick' => $this->onTick,
        ];

        return json_encode(array_merge($config, $this->options), JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Get target date for display
     */
    public function targetDate(): ?string
    {
        return $this->until ? $this->until->format('Y-m-d H:i:s') : null;
    }

    public function render(): View
    {
        return view('oneui::components.countdown');
    }
}

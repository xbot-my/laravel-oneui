<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * BootstrapNotify Component - Bootstrap Notify wrapper
 *
 * Creates animated notification messages
 *
 * Usage:
 * <x-oneui::bootstrap-notify type="success" message="Record saved successfully!" />
 * <x-oneui::bootstrap-notify type="error" message="An error occurred" />
 */
class BootstrapNotify extends Component
{
    public function __construct(
        public string $type = 'info', // success, info, warning, danger
        public ?string $message = null,
        public string $icon = 'fa fa-info-circle',
        public string $title = '',
        public int $delay = 5000,
        public bool $allowDismiss = true,
        public string $placement = 'top-right', // top-right, top-left, bottom-right, bottom-left
        public string $animateEnter = 'animated fadeInDown',
        public string $animateExit = 'animated fadeOutUp',
        public bool $newestOnTop = true,
        public bool $showProgressbar = false,
        public string $offset = '20',
        public array $options = [],
    ) {
    }

    /**
     * Get Bootstrap Notify configuration as JavaScript object
     */
    public function notifyOptions(): string
    {
        $options = [
            'type' => $this->type,
            'icon' => $this->icon,
            'title' => $this->title,
            'message' => $this->message,
            'delay' => $this->delay,
            'allow_dismiss' => $this->allowDismiss,
            'placement' => [
                'from' => $this->getPlacementFrom(),
                'align' => $this->getPlacementAlign(),
            ],
            'animate' => [
                'enter' => $this->animateEnter,
                'exit' => $this->animateExit,
            ],
            'newest_on_top' => $this->newestOnTop,
            'showProgressbar' => $this->showProgressbar,
            'offset' => [
                'x' => $this->offset,
                'y' => $this->offset,
            ],
        ];

        // Merge with custom options
        $options = array_merge($options, $this->options);

        return json_encode($options, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * Get placement 'from' value
     */
    protected function getPlacementFrom(): string
    {
        return str_starts_with($this->placement, 'top') ? 'top' : 'bottom';
    }

    /**
     * Get placement 'align' value
     */
    protected function getPlacementAlign(): string
    {
        if (str_ends_with($this->placement, 'left')) {
            return 'left';
        } elseif (str_ends_with($this->placement, 'center')) {
            return 'center';
        }
        return 'right';
    }

    public function render(): View
    {
        return view('oneui::components.bootstrap-notify');
    }
}

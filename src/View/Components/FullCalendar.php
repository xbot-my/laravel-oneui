<?php

declare(strict_types=1);

namespace XBot\OneUI\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

/**
 * FullCalendar Component - FullCalendar wrapper
 *
 * Creates interactive calendar views with event management
 *
 * Usage:
 * <x-oneui::full-calendar id="myCalendar" :events="$events" initial-view="dayGridMonth" />
 * <x-oneui::full-calendar id="bookingCalendar" :events-url="route('api.events')" editable="true" />
 */
class FullCalendar extends Component
{
    public function __construct(
        public string $id,
        public array $events = [],
        public ?string $eventsUrl = null, // AJAX events source
        public string $initialView = 'dayGridMonth', // dayGridMonth, timeGridWeek, timeGridDay, listWeek, listMonth
        public string $headerToolbar = 'prev,next today title', // Toolbar button layout
        public bool $editable = false,
        public bool $selectable = false,
        public bool $selectMirror = true,
        public string $dir = 'ltr', // ltr or rtl
        public bool $navLinks = false,
        public bool nowIndicator = false,
        public string $slotDuration = '00:30:00', // Time slot duration
        public string $slotMinTime = '00:00:00', // Business hours start
        public string $slotMaxTime = '24:00:00', // Business hours end
        public int $scrollTime = '06:00:00', // Initial scroll time
        public bool $weekends = true,
        public int $firstDay = 0, // 0 = Sunday, 1 = Monday, etc.
        public string $height = 'auto', // auto, parent, or specific height in px
        public string $aspectRatio = '1.35',
        public bool $handleWindowResize = true,
        public array $options = [],
        public ?string $eventClick = null, // JS callback for event click
        public ?string $dateClick = null, // JS callback for date click
        public ?string $selectCallback = null, // JS callback for date selection
        public ?string $eventDrop = null, // JS callback for event drag/drop
        public ?string $eventResize = null, // JS callback for event resize
    ) {
    }

    /**
     * Get FullCalendar configuration as JavaScript object
     */
    public function calendarOptions(): string
    {
        $options = [
            'initialView' => $this->initialView,
            'headerToolbar' => $this->parseToolbar($this->headerToolbar),
            'editable' => $this->editable,
            'selectable' => $this->selectable,
            'selectMirror' => $this->selectMirror,
            'dir' => $this->dir,
            'navLinks' => $this->navLinks,
            'nowIndicator' => $this->nowIndicator,
            'slotDuration' => $this->slotDuration,
            'slotMinTime' => $this->slotMinTime,
            'slotMaxTime' => $this->slotMaxTime,
            'scrollTime' => $this->scrollTime,
            'weekends' => $this->weekends,
            'firstDay' => $this->firstDay,
            'height' => $this->height,
            'aspectRatio' => $this->aspectRatio,
            'handleWindowResize' => $this->handleWindowResize,
        ];

        // Add events
        if (!empty($this->events)) {
            $options['events'] = $this->events;
        } elseif ($this->eventsUrl) {
            $options['events'] = $this->eventsUrl;
        }

        // Add event handlers
        $callbacks = [];
        if ($this->eventClick) {
            $callbacks['eventClick'] = $this->eventClick;
        }
        if ($this->dateClick) {
            $callbacks['dateClick'] = $this->dateClick;
        }
        if ($this->selectCallback) {
            $callbacks['select'] = $this->selectCallback;
        }
        if ($this->eventDrop) {
            $callbacks['eventDrop'] = $this->eventDrop;
        }
        if ($this->eventResize) {
            $callbacks['eventResize'] = $this->eventResize;
        }

        // Merge with custom options
        $options = array_merge($options, $this->options, $callbacks);

        return $this->arrayToJs($options);
    }

    /**
     * Parse toolbar string to object
     * "prev,next today title" -> {left: 'prev,next', center: 'title', right: 'today'}
     */
    protected function parseToolbar(string $toolbar): string
    {
        // Default: left (prev,next), center (title), right (today)
        $parts = preg_split('/\s+/', trim($toolbar));
        $left = [];
        $center = [];
        $right = [];

        foreach ($parts as $part) {
            if (in_array($part, ['prev', 'next', 'prevYear', 'nextYear'])) {
                $left[] = $part;
            } elseif (in_array($part, ['today'])) {
                $right[] = $part;
            } elseif ($part === 'title') {
                $center[] = $part;
            } else {
                $right[] = $part;
            }
        }

        $toolbarObj = [
            'left' => implode(' ', $left),
            'center' => implode(' ', $center),
            'right' => implode(' ', $right),
        ];

        return json_encode($toolbarObj);
    }

    /**
     * Convert PHP array to JavaScript object (with function support)
     */
    protected function arrayToJs(array $data): string
    {
        $js = json_encode($data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);

        // Handle function strings
        $js = preg_replace(
            '/"function\((.*?)\) {(.*?)\}"/s',
            'function($1) {$2}',
            $js
        );

        // Handle arrow functions
        $js = preg_replace(
            '/"\((.*?)\) => (.*?)"/s',
            '($1) => $2',
            $js
        );

        return $js;
    }

    public function render(): View
    {
        return view('oneui::components.full-calendar');
    }
}

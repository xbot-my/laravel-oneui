<?php

declare(strict_types=1);

namespace XBot\OneUI\Support\Formatters;

use XBot\OneUI\Contracts\FormatterContract;

/**
 * Badge Formatter
 *
 * Formats values into Badge HTML output.
 */
class BadgeFormatter implements FormatterContract
{
    /**
     * Format as Badge
     *
     * @param  mixed  $value  Original value
     * @param  array  $options  Options (badgeMap, type, pill)
     */
    public function format(mixed $value, array $options = []): string
    {
        $type = $options['type'] ?? 'primary';

        // Use badgeMap to map values to types
        if (!empty($options['badgeMap']) && isset($options['badgeMap'][$value])) {
            $type = $options['badgeMap'][$value];
        }

        $pill = !empty($options['pill']);

        return sprintf(
            '<span class="%s">%s</span>',
            $this->getBadgeClasses($type, $pill),
            e($value)
        );
    }

    /**
     * Get Badge CSS classes
     */
    protected function getBadgeClasses(string $type, bool $pill): string
    {
        $classes = 'fs-xs fw-semibold d-inline-block py-1 px-3';
        $classes .= $pill ? ' rounded-pill' : ' rounded';
        $classes .= " bg-{$type}-light text-{$type}";

        return $classes;
    }

    public function getName(): string
    {
        return 'badge';
    }
}

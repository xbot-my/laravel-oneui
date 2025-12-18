<?php

declare(strict_types=1);

namespace XBot\OneUI;

final class OneUI
{
    /**
     * Package version.
     */
    public const VERSION = '1.0.0';

    /**
     * Get the package version.
     */
    public static function version(): string
    {
        return self::VERSION;
    }
}

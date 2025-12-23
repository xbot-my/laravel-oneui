<?php

declare(strict_types=1);

namespace XBot\OneUI\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * OneUI Facade
 *
 * @method static string version()
 */
class OneUI extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'oneui';
    }
}

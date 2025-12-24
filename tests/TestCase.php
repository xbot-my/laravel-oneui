<?php

namespace XBot\OneUI\Tests;

use Orchestra\Testbench\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Get package providers.
     */
    protected function getPackageProviders($app): array
    {
        return [
            \XBot\OneUI\OneUIServiceProvider::class,
        ];
    }

    /**
     * Define environment setup.
     */
    protected function defineEnvironment($app): void
    {
        // Setup default environment values
    }

    /**
     * Define routes setup.
     */
    protected function defineRoutes($router): void
    {
        $router->get('/', function () {
            return response('Hello World');
        });
    }
}

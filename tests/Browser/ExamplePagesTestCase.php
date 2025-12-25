<?php

declare(strict_types=1);

namespace XBot\OneUI\Tests\Browser;

use Illuminate\Support\Facades\Route;
use Orchestra\Testbench\BrowserKit\TestCase;
use XBot\OneUI\OneUIServiceProvider;

abstract class ExamplePagesTestCase extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        // Load example routes
        $this->loadExampleRoutes();

        // Disable exception handling for clearer error messages
        $this->withoutExceptionHandling();
    }

    protected function getPackageProviders($app): array
    {
        return [
            OneUIServiceProvider::class,
        ];
    }

    protected function loadExampleRoutes(): void
    {
        $routesFile = __DIR__ . '/../../routes/examples.php';

        if (file_exists($routesFile)) {
            Route::group([
                'prefix' => 'oneui/examples',
                'as' => 'oneui.examples.',
            ], function () use ($routesFile) {
                require $routesFile;
            });
        }
    }
}

<?php

declare(strict_types=1);

namespace XBot\OneUI\Tests\Browser;

use Illuminate\Support\Facades\Route;
use Orchestra\Testbench\BrowserKit\TestCase;
use XBot\OneUI\OneUIServiceProvider;

abstract class ExamplePagesTestCase extends TestCase
{
    /**
     * Pages that require JavaScript and should be skipped in CI
     */
    protected array $jsOnlyPages = [
        'charts',      // ChartJS requires JavaScript
        'editors',     // CKEditor/SimpleMDE require JavaScript
    ];

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

    /**
     * Check if running in CI environment
     */
    protected function isCI(): bool
    {
        return getenv('CI') === 'true' || getenv('GITHUB_ACTIONS') === 'true';
    }

    /**
     * Check if a page requires JavaScript
     */
    protected function isJsOnlyPage(string $page): bool
    {
        return in_array($page, $this->jsOnlyPages);
    }
}

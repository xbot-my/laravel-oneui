<?php

declare(strict_types=1);

namespace XBot\OneUI\Tests\Browser;

use Tests\TestCase;

abstract class BaseBrowserTest extends TestCase
{
    protected ?\Pest\Browser\Page $page = null;

    /**
     * Set up the test case.
     */
    protected function setUp(): void
    {
        parent::setUp();

        // Ensure screenshot directory exists
        $screenshotDir = base_path('tests/Browser/Screenshots');
        if (! is_dir($screenshotDir)) {
            mkdir($screenshotDir, 0755, true);
        }
    }

    /**
     * Tear down the test case.
     * Automatically takes screenshot on failure.
     */
    protected function tearDown(): void
    {
        // Take screenshot on test failure
        if ($this->hasFailed() && $this->page) {
            $this->takeScreenshot();
        }

        $this->page = null;
        parent::tearDown();
    }

    /**
     * Visit a URL for testing.
     */
    protected function visit(string $url): \Pest\Browser\Page
    {
        $this->page = browser()->visit($url);

        return $this->page;
    }

    /**
     * Assert that a page loads successfully by route name.
     */
    protected function assertPageLoadsSuccessfully(string $routeName): void
    {
        $url = route($routeName);

        echo "\n[INFO] Visiting: {$url}";

        browser()->visit($url)
            ->assertStatus(200)
            ->assertNoSmoke();

        echo " - OK\n";
    }

    /**
     * Take screenshot (used manually or automatically on failure).
     */
    protected function takeScreenshot(?string $name = null): void
    {
        if (! $this->page) {
            return;
        }

        $testName = $name ?? $this->getName();
        $status = $this->hasFailed() ? 'failed' : 'passed';
        $componentName = class_basename($this);
        $timestamp = date('Y-m-d_H-i-s');

        $filename = "{$status}_{$componentName}_{$testName}_{$timestamp}.png";
        $path = base_path('tests/Browser/Screenshots/' . $filename);

        $this->page->screenshot(filename: $filename, fullPage: true);

        echo "\n[SCREENSHOT] Saved: tests/Browser/Screenshots/{$filename}\n";
    }

    /**
     * Take screenshot at key steps (e.g., opening/closing modals).
     */
    protected function takeStepScreenshot(string $step): void
    {
        if (! $this->page) {
            return;
        }

        $componentName = class_basename($this);
        $testName = $this->getName();
        $timestamp = date('Y-m-d_H-i-s');

        $filename = "step_{$step}_{$componentName}_{$testName}_{$timestamp}.png";

        $this->page->screenshot(filename: $filename, fullPage: true);

        echo "\n[SCREENSHOT] Step: tests/Browser/Screenshots/{$filename}\n";
    }
}

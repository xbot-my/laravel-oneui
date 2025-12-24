<?php

namespace Tests\Browser;

use Tests\TestCase;

abstract class BaseBrowserTest extends TestCase
{
    protected ?\Pest\Browser\Page $page = null;

    /**
     * 访问测试页面
     */
    protected function visit(string $url): \Pest\Browser\Page
    {
        $this->page = browser()->visit($url);
        return $this->page;
    }

    /**
     * 测试完成后自动截屏（无论成功/失败）
     */
    protected function takeScreenshot(?string $name = null): void
    {
        if (!$this->page) {
            return;
        }

        $testName = $name ?? $this->getName();
        $status = $this->hasFailed() ? 'failed' : 'passed';
        $componentName = class_basename($this);
        $timestamp = date('Y-m-d_H-i-s');

        $filename = "{$status}_{$componentName}_{$testName}_{$timestamp}.png";
        $path = base_path('tests/Browser/Screenshots/' . $filename);

        $this->page->screenshot(filename: $filename, fullPage: true);

        echo "\n[SCREENSHOT] Saved: {$filename}\n";
    }

    /**
     * 关键步骤截屏（如打开/关闭弹窗）
     */
    protected function takeStepScreenshot(string $step): void
    {
        if (!$this->page) {
            return;
        }

        $componentName = class_basename($this);
        $testName = $this->getName();
        $timestamp = date('Y-m-d_H-i-s');

        $filename = "step_{$step}_{$componentName}_{$testName}_{$timestamp}.png";

        $this->page->screenshot(filename: $filename, fullPage: true);

        echo "\n[SCREENSHOT] Step: {$filename}\n";
    }
}

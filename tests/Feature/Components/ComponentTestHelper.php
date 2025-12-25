<?php

namespace XBot\OneUI\Tests\Feature\Components;

use Illuminate\Support\Facades\Blade;

trait ComponentTestHelper
{
    /**
     * 渲染组件并返回HTML
     */
    protected function renderComponent( string $blade, array $data = [] ): string
    {
        return Blade::render($blade, $data);
    }
    
    /**
     * 断言组件包含CSS类
     */
    protected function assertContainsClasses( string $html, array $classes ): void
    {
        foreach ($classes as $class) {
            expect($html)->toContain($class);
        }
    }
    
    /**
     * 断言组件不包含CSS类
     */
    protected function assertDoesNotContainClasses( string $html, array $classes ): void
    {
        foreach ($classes as $class) {
            expect($html)->not->toContain($class);
        }
    }
}

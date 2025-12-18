<?php

declare(strict_types=1);

namespace XBot\OneUI;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

final class OneUIServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/oneui.php', 'oneui');
    }

    public function boot(): void
    {
        $this->bootResources();
        $this->bootBladeComponents();
        $this->bootPublishing();
    }

    private function bootResources(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'oneui');
    }

    private function bootBladeComponents(): void
    {
        $this->callAfterResolving(BladeCompiler::class, function (BladeCompiler $blade) {
            $prefix = config('oneui.prefix', '');

            /** @var array<string, class-string> $components */
            $components = config('oneui.components', []);

            foreach ($components as $alias => $component) {
                $blade->component($component, $alias, $prefix);
            }
        });

        // Register component namespace for auto-discovery
        Blade::componentNamespace('XBot\\OneUI\\View\\Components', 'oneui');
    }

    private function bootPublishing(): void
    {
        if ($this->app->runningInConsole()) {
            // Publish config
            $this->publishes([
                __DIR__ . '/../config/oneui.php' => $this->app->configPath('oneui.php'),
            ], 'oneui-config');

            // Publish views
            $this->publishes([
                __DIR__ . '/../resources/views' => $this->app->resourcePath('views/vendor/oneui'),
            ], 'oneui-views');

            // Publish assets to public/vendor/oneui
            $this->publishes([
                __DIR__ . '/../resources/assets' => public_path('vendor/oneui'),
            ], 'oneui-assets');
        }
    }
}

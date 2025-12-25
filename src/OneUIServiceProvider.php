<?php

declare( strict_types = 1 );

namespace XBot\OneUI;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use XBot\OneUI\Console\Commands\OneUICommand;
use XBot\OneUI\Console\Commands\PublishCommand;
use XBot\OneUI\Console\Commands\InitializeDemo;

final class OneUIServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/oneui.php', 'oneui');
        $this->app->singleton('oneui', fn( $app ) => new OneUI($app));
        
    }
    
    public function boot(): void
    {
        $this->bootResources();
        $this->bootBladeComponents();
        $this->bootPublishing();
        $this->bootCommands();
        $this->loadExamplesRoutes();
    }
    
    private function bootResources(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'oneui');
    }
    
    private function bootBladeComponents(): void
    {
        $this->callAfterResolving(BladeCompiler::class, function ( BladeCompiler $blade ) {
            $prefix = config('oneui.prefix', 'oneui');
            
            /** @var array<string, class-string> $components */
            $components = config('oneui.components', []);
            
            foreach ($components as $alias => $component) {
                $blade->component($component, $alias, $prefix);
            }
        });
        
        // Register component namespace for auto-discovery
        Blade::componentNamespace('XBot\OneUI\View\Components', 'oneui');
    }
    
    private function bootPublishing(): void
    {
        if ($this->app->runningInConsole()) {
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
            
            $this->publishes([
                __DIR__ . '/../routes/examples.php' => base_path('routes/examples.php'),
            ], 'oneui-examples');
        }
    }
    
    private function bootCommands(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                OneUICommand::class,
                PublishCommand::class,
                InitializeDemo::class,
            ]);
        }
    }
    
    
    private function getExamplesRoutePath(): string
    {
        return $this->app->basePath('routes/examples.php');
    }
    
    /**
     * Check the routes/examples.php exists.
     *
     * @return bool
     */
    private function isExampleRoutePublished(): bool
    {
        return $this->app['files']->exists($this->getExamplesRoutePath());
    }
    
    /**
     * Load the example routes, when the `routes/examples.php` is published.
     *
     * @return void
     */
    public function loadExamplesRoutes(): void
    {
        if ($this->isExampleRoutePublished()) {
            Route::group([
                'prefix' => 'oneui/examples',
                'as'     => 'oneui.examples.',
            ], function (): void {
                $this->loadRoutesFrom($this->getExamplesRoutePath());
            });
        }
    }
}
<?php

declare(strict_types=1);

namespace XBot\OneUI\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;

class OneUIExamplesCommand extends Command
{
    protected $signature = 'oneui:examples 
                            {--force : Overwrite existing files}';

    protected $description = 'Publish OneUI example pages to your application';

    public function handle(Filesystem $files): int
    {
        $sourcePath = dirname(__DIR__, 3) . '/resources/views/examples';
        $targetPath = resource_path('views/oneui');
        $routesSource = dirname(__DIR__, 3) . '/routes/examples.php';
        $routesTarget = base_path('routes/oneui.php');

        // Check if source exists
        if (!$files->isDirectory($sourcePath)) {
            $this->error('Example files not found in package.');
            return self::FAILURE;
        }

        // Check if target exists
        if ($files->isDirectory($targetPath) && !$this->option('force')) {
            if (!$this->confirm('The views/oneui directory already exists. Do you want to overwrite?')) {
                $this->info('Operation cancelled.');
                return self::SUCCESS;
            }
        }

        // Copy view files
        $files->ensureDirectoryExists($targetPath);
        $files->copyDirectory($sourcePath, $targetPath);
        $this->info('✓ Example views published to resources/views/oneui');

        // Copy routes file
        if ($files->exists($routesSource)) {
            if ($files->exists($routesTarget) && !$this->option('force')) {
                if ($this->confirm('routes/oneui.php already exists. Overwrite?')) {
                    $files->copy($routesSource, $routesTarget);
                    $this->info('✓ Routes published to routes/oneui.php');
                }
            } else {
                $files->copy($routesSource, $routesTarget);
                $this->info('✓ Routes published to routes/oneui.php');
            }
        }

        $this->newLine();
        $this->info('To enable the routes, add to bootstrap/app.php:');
        $this->line("  ->withRouting(");
        $this->line("      web: __DIR__.'/../routes/web.php',");
        $this->line("      then: function () {");
        $this->line("          require base_path('routes/oneui.php');");
        $this->line("      }");
        $this->line("  )");
        $this->newLine();
        $this->info('Visit /oneui/buttons to see the examples.');

        return self::SUCCESS;
    }
}

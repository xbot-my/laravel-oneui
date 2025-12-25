<?php

namespace XBot\OneUI\Console\Commands;

use Exception;
use Illuminate\Console\Command;
use XBot\OneUI\OneUIServiceProvider;

class PublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'oneui:publish
    {--config : Publish the configuration.}
    {--assets : Publish the assets.}
    {--views : Publish the views.}
    {--examples : Publish the example resources.}
    {--a|all : Publish all resources.}
    {--f|force : Overwrite any existing files}';
    
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish the OneUI Resources.';
    
    /**
     * Whether to overwrite any existing files.
     *
     * @var bool
     */
    protected bool $overwrite = false;
    
    public function handle(): void
    {
        $tags = [];
        
        if ($this->option('all')) {
            $this->newLine();
            if (! $this->confirm('Confirm to publish all resources?', true)) {
                $this->output->writeln('<fg=magenta>Command has been cancelled.</>');
                exit(1);
            }
            goto publish;
        }
        
        if ($this->option('config')) {
            $tags[] = 'oneui-config';
        }
        
        if ($this->option('assets')) {
            $tags[] = 'oneui-assets';
        }
        
        if ($this->option('views')) {
            $tags[] = 'oneui-views';
        }
        
        if ($this->option('examples')) {
            $tags[] = 'oneui-examples';
        }
        
        try {
            publish:
            $this->output->writeln('<fg=bright-yellow;options>Publishing resources...</>');
            $this->overwrite();
            $this->call('vendor:publish', [
                '--provider' => OneUIServiceProvider::class,
                '--tag'      => $tags,
                '--force'    => $this->overwrite,
            ]);
        }
        catch (Exception $exception) {
            $this->output->writeln('<fg=red;>Resources publishing failed.</>');
            $this->output->writeln('<fg=red;options=bold;>Exception</> <fg=red>' . $exception->getMessage() . '</>');
            exit(1);
        }
        finally {
            $this->output->writeln('<fg=green;options=bold;>Resources published successfully.</>');
            exit(0);
        }
    }
    
    
    public function hasViews(): bool
    {
        return $this->option('views');
    }
    
    public function hasAssets(): bool
    {
        return $this->option('assets');
    }
    
    public function hasConfig(): bool
    {
        return $this->option('config');
    }
    
    public function hasExamples(): bool
    {
        return $this->option('examples');
    }
    
    private function overwrite(): void
    {
        $force   = (bool) $this->option('force');
        $message = 'Confirm to overwrite existing files?';
        
        if ($force && $this->confirm($message, true)) {
            $this->overwrite = true;
        }
    }
}

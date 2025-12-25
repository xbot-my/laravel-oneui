<?php

namespace XBot\OneUI\Console\Commands;

use Illuminate\Console\Command;
use XBot\OneUI\OneUIServiceProvider;

class InitializeDemo extends Command
{
    protected $signature = 'oneui:demo';
    
    protected $description = 'Initialize OneUI Example Demo pages.';
    
    protected $hidden = true;
    
    public function handle(): void
    {
        $this->init();
    }
    
    protected function init(): void
    {
        $this->output->title('Initializing OneUI Example Demo pages...');
        
        $this->call('vendor:publish', [
            '--provider' => OneUIServiceProvider::class,
            '--tag'      => 'oneui-examples',
            '--force'    => true,
        ]);
        
    }
}

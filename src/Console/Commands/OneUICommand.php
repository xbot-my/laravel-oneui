<?php

namespace XBot\OneUI\Console\Commands;

use XBot\OneUI\OneUI;
use Illuminate\Console\Command;

class OneUICommand extends Command
{
    protected $signature = 'oneui
              {--V|version : Print the package version.}
              {--h|help : Print this help message.}
              {--l|list : List all available options.}';
    
    protected $description = 'OneUI is a Laravel package that provides a set of UI components for your application.';
    
    public function handle(): void
    {
        if ($this->option('version')) {
            $this->output->text('OneUI version: ' . OneUI::VERSION);
            exit(1);
        }
        
        $this->output->write(OneUI::banner());
        $this->output->text('Available Commands:');
        $this->output->listing([
            'oneui:publish : Publish the package assets.',
            'oneui:demo : Publish the example views, assets, routes.',
            '',
        ]);
    }
}

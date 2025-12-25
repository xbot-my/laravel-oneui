<?php

namespace XBot\OneUI\Console\Commands;

use Illuminate\Console\Command;

class OneUICommand extends Command
{
    protected $signature = 'oneui';
    
    protected $description = 'Command description';
    
    public function handle(): void
    {
        $this->output->write(\XBot\OneUI\OneUI::banner());
    }
}

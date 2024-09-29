<?php

namespace Khufu\Viewdb\Console;

use Illuminate\Console\Command;

class InstallViewDbPackage extends Command
{
  protected $signature = 'viewdb:install';
  protected $description = 'Install the viewDbPackage';

  public function handle()
  {
    echo "runnning from my custom package";
  }
}

<?php

namespace khufu\Viewdb;

use Illuminate\Support\ServiceProvider;
use Khufu\Viewdb\Console\InstallViewDbPackage;

class ViewDbServiceProvider extends ServiceProvider
{
  public function register() {}

  public function boot()
  {
    if ($this->app->runningInConsole()) {
      $this->commands([
        InstallViewDbPackage::class
      ]);
      $this->publishes([
        __DIR__ . '/../public' => public_path('vendor/viewdb'),
      ], ['viewdb-assets', 'laravel-assets']);
    }

    $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
    $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
    $this->loadViewsFrom(__DIR__ . '/../resources/views', 'viewdb');
  }
}

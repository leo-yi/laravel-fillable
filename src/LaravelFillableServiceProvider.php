<?php

namespace Leoyi\LaravelFillable;

use Illuminate\Support\ServiceProvider;
use Leoyi\LaravelFillable\Commands\LaravelFillableCommand;

class LaravelFillableServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if($this->app->runningInConsole()){
            // publish config file
            $this->publishes([
                __DIR__ . '/../config/fillable.php' => config_path('fillable.php'),
            ], 'laravel-fillable');

            $this->commands([
                LaravelFillableCommand::class
            ]);
        }
    }
}

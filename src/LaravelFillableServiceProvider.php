<?php

namespace Leoyi\LaravelFillable;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Leoyi\LaravelFillable\Commands\LaravelFillableCommand;

class LaravelFillableServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package->name('laravel-fillable')
            ->hasConfigFile()
            ->hasCommand(LaravelFillableCommand::class);
    }
}

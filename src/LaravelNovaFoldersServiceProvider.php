<?php

namespace Creode\LaravelNovaFolders;

use Creode\LaravelNovaFolders\Nova\FolderResource;
use Laravel\Nova\Nova;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelNovaFoldersServiceProvider extends PackageServiceProvider
{
    public function boot()
    {
        parent::boot();

        Nova::resources([
            FolderResource::class,
        ]);
    }

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-nova-folders')
            ->hasConfigFile()
            ->hasViews();
    }
}

<?php

namespace Creode\LaravelNovaFolders;

use Creode\LaravelNovaFolders\Commands\LaravelNovaFoldersCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelNovaFoldersServiceProvider extends PackageServiceProvider
{
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
            ->hasViews()
            ->hasMigration('create_laravel-nova-folders_table')
            ->hasCommand(LaravelNovaFoldersCommand::class);
    }
}

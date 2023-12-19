<?php

namespace Creode\LaravelNovaFolders;

use Creode\LaravelNovaFolders\Nova\FolderResource;
use Illuminate\Support\Facades\Gate;
use Laravel\Nova\Events\ServingNova;
use Laravel\Nova\Nova;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelNovaFoldersServiceProvider extends PackageServiceProvider
{
    public function boot()
    {
        parent::boot();

        // Publishes the permissions seeder.
        $this->publishes([
            __DIR__.'/../database/seeders/FolderRoleAndPermissionSeeder.php' => database_path('seeders/FolderRoleAndPermissionSeeder.php'),
        ], 'nova-folders-seeders');

        FolderResource::$model = config('folder-taxonomy.model');
        Nova::resources([
            FolderResource::class,
        ]);

        Nova::serving(function (ServingNova $event) {
            $this->registerPolicies();
        });
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

    /**
     * Registers module policies.
     *
     * @return void
     */
    public function registerPolicies()
    {
        Gate::policy(config('folder-taxonomy.model'), config('nova-folders.policy'));
    }
}

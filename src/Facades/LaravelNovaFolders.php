<?php

namespace Creode\LaravelNovaFolders\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Creode\LaravelNovaFolders\LaravelNovaFolders
 */
class LaravelNovaFolders extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Creode\LaravelNovaFolders\LaravelNovaFolders::class;
    }
}

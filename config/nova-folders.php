<?php

// config for Creode/LaravelNovaFolders
return [
    /*
    |--------------------------------------------------------------------------
    | Default Actions
    |--------------------------------------------------------------------------
    |
    | This value contains the default actions which will be used when we managing
    | a folder resource. You can add or remove actions as you wish.
    |
    */

    'default_actions' => [],

    /*
    |--------------------------------------------------------------------------
    | Folder Model
    |--------------------------------------------------------------------------
    |
    | The model to be used when creating a folder. This can be any model that
    | extends the Folder model.
    |
    */

    'model' => Creode\LaravelFolderTaxonomy\Models\Folder::class,

    /*
    |--------------------------------------------------------------------------
    | Folder Policy
    |--------------------------------------------------------------------------
    |
    | This points to the default Policy class used when checking permissions
    | for the Folder model.
    |
    */

    'policy' => Creode\LaravelNovaFolders\Policies\FolderPolicy::class,
];

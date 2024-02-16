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
    | Folder Policy
    |--------------------------------------------------------------------------
    |
    | This points to the default Policy class used when checking permissions
    | for the Folder model.
    |
    */

    'policy' => Creode\LaravelNovaFolders\Policies\FolderPolicy::class,

    /*
    |--------------------------------------------------------------------------
    | Traffic Cop
    |--------------------------------------------------------------------------
    |
    | Indicates whether Nova should check for modifications between viewing
    | and updating a resource.
    |
    */

    'traffic_cop' => true,
];

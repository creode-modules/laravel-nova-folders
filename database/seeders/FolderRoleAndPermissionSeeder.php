<?php

namespace Database\Seeders;

use Creode\PermissionsSeeder\PermissionsSeeder;

class FolderRoleAndPermissionSeeder extends PermissionsSeeder
{
    /**
     * {@inheritdoc}
     */
    protected function getPermissionGroup(): string
    {
        return 'Folder';
    }
}

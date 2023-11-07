<?php

namespace Creode\LaravelNovaFolders\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Creode\LaravelFolderTaxonomy\Models\Folder;
use Illuminate\Foundation\Auth\User as Authenticatable;

class FolderPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Authenticatable $user): bool
    {
        return $user->hasPermissionTo('viewAnyFolder');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Authenticatable $user, Folder $folder): bool
    {
        return $user->hasPermissionTo('viewFolder');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Authenticatable $user): bool
    {
        return $user->hasPermissionTo('createFolder');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Authenticatable $user, Folder $folder): bool
    {
        return $user->hasPermissionTo('updateFolder');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Authenticatable $user, Folder $folder): bool
    {
        return $user->hasPermissionTo('deleteFolder');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Authenticatable $user, Folder $folder): bool
    {
        return $user->hasPermissionTo('updateFolder');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Folder $folder): bool
    {
        return $user->hasPermissionTo('destroyFolder');
    }
}

<?php

namespace App\Policies;

use App\Models\Chuyenxe;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ChuyenxePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chuyenxe  $chuyenxe
     * @return mixed
     */
    public function view(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.list-chuyenxe'));
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.add-chuyenxe'));
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chuyenxe  $chuyenxe
     * @return mixed
     */
    public function update(User $user)
    {
       return $user->checkPermissionAccess(config('permissions.access.edit-chuyenxe'));
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chuyenxe  $chuyenxe
     * @return mixed
     */
    public function delete(User $user)
    {
        return $user->checkPermissionAccess(config('permissions.access.delete-chuyenxe'));
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chuyenxe  $chuyenxe
     * @return mixed
     */
    public function restore(User $user, Chuyenxe $chuyenxe)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Chuyenxe  $chuyenxe
     * @return mixed
     */
    public function forceDelete(User $user, Chuyenxe $chuyenxe)
    {
        //
    }
}

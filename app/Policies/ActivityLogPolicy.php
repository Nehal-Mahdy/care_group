<?php


namespace App\Policies;

use App\Enum\Permissions;
use App\Models\ActivityLog;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class ActivityLogPolicy
{

    public function viewAny(User $user): bool
    {
        if ($user->hasPermissionTo(Permissions::ACTIVITY_LOGS_VIEW)) {
            return true;
        }

        return false;
    }

    public function view(User $user, ActivityLog $log): bool
    {
        if ($user->hasPermissionTo(Permissions::ACTIVITY_LOGS_VIEW)) {
            return true;
        }

        return false;
    }


    public function create(User $user): bool
    {
        if ($user->hasPermissionTo(Permissions::ACTIVITY_LOGS_CREATE)) {
            return true;
        }

        return false;
    }


    public function update(User $user, ActivityLog $log): bool
    {
        if ($user->hasPermissionTo(Permissions::ACTIVITY_LOGS_UPDATE)) {
            return true;
        }

        return false;
    }

   
    public function delete(User $user, ActivityLog $log): bool
    {
        if ($user->hasPermissionTo(Permissions::ACTIVITY_LOGS_DELETE)) {
            return true;
        }

        return false;
    }
}


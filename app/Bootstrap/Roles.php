<?php

namespace App\Bootstrap;

use App\Enum\RolesWithPermissions;
use Illuminate\Support\Facades\App;
use Spatie\Permission\Contracts\Permission as ContractsPermission;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class Roles
{
    public function bootstrap(): void
    {
        App::make(PermissionRegistrar::class)->forgetCachedPermissions();
        foreach (RolesWithPermissions::asArray() as $role => $permissions) {
            $role = Role::updateOrCreate(['name' => $role]);
            // remove all permissions
            $role->permissions()->detach();
            foreach ($permissions as $permission) {
                $role->givePermissionTo(
                    $this->findPermission($permission)
                );
            }
        }
    }

    protected function findPermission(string $name): ContractsPermission
    {
        /** @var Permission */
        return Permission::where('name', $name)->sole();
    }
}

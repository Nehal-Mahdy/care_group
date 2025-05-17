<?php

namespace App\Bootstrap;

use App\Enum\Permissions as PermissionsEnum;
use Illuminate\Support\Facades\App;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class Permissions
{
    public function bootstrap(): void
    {
        App::make(PermissionRegistrar::class)->forgetCachedPermissions();

        foreach (PermissionsEnum::asArray() as $permission) {
            Permission::updateOrCreate(['name' => $permission]);
        }
    }
}

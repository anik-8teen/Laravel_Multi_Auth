<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Role;

use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function createPermission()
    {
        // $role = Role::create(['name' => 'writer']);
        // $permission = Permission::create(['name' => 'edit articles']);
        // $role->givePermissionTo($permission);
        // $permission->assignRole($role);
        // $role->syncPermissions($permission);
        // $permission->syncRoles($role);
        // return $role.$permission;
        $user=User::find(1);
        return $user->getAllPermissions();
    }


}

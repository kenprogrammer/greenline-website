<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;

trait Permissions
{
    /**
    * Returns an array of available permissions
    */
    public function permissions()
    {
        $permissions = [
            ['name' => 'mng-roles', 'display_name' => 'Manage Roles', 'group' => 'Settings'],
            ['name' => 'mng-users', 'display_name' => 'Manage Users', 'group' => 'Settings'],
            // Add more permissions with groups
        ];

        return $permissions;
    }

    /**
    * Checks if permission exists before seeding
    */
    public function permissionExists($permission)
    {
        $permission_exists = DB::table('permissions')->where('name', '=', $permission)->first();

        if (!empty($permission_exists)) {
            return true;
        } else {
            return false;
        }
    }
}
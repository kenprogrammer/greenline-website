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
        $settings = ['mng-users','mng-roles'];

        $permissions=array_merge(
            $settings,
        );

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
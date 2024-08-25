<?php

namespace App\Livewire\Settings\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class AddRole extends Component
{
    public $role_name;
    public $permissions = [];

    public function render()
    {
        // Fetch all permissions to display in the form, grouped by 'group'
        $allPermissions = Permission::all()->groupBy('group');

        return view('livewire.settings.roles.add-role',[
            'groupedPermissions' => $allPermissions,
        ]);
    }

    public function store()
    {
        $this->validate([
            'role_name' => 'required|string|max:255',
            'permissions' => 'array',
        ],
        [
            'role_name.required'=>'Role Name is required!'
        ]);

        // Create the role
        $role = Role::create(['name' => $this->role_name]);

        // Assign selected permissions to the role
        $role->syncPermissions($this->permissions);

        // Redirect or show success message
        session()->flash('success', 'Role created successfully!');

        return $this->redirect('/roles', navigate: true);
    }
}

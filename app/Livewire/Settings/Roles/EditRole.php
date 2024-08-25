<?php

namespace App\Livewire\Settings\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class EditRole extends Component
{
    public $role_name;
    public $permissions = [];
    public $role;

    public function mount($id)
    {
        //Get role by ID
        $this->role = Role::find($id);
        $this->role_name = $this->role->name;

        // Load the existing permissions of the role
        $this->permissions = $this->role->permissions->pluck('name')->toArray();
    }

    public function render()
    {   
        // Fetch all permissions to display in the form, grouped by 'group'
        $allPermissions = Permission::all()->groupBy('group');

        return view('livewire.settings.roles.edit-role',[
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

        // Update role
        $this->role->update([
            "name"=>$this->role_name,
        ]);

        // Assign selected permissions to the role
        $this->role->syncPermissions($this->permissions);

        // Redirect or show success message
        session()->flash('success', 'Role updated successfully!');

        return $this->redirect('/roles', navigate: true);
    }
}

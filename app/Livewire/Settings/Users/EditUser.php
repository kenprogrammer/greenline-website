<?php

namespace App\Livewire\Settings\Users;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Traits\Users;

class EditUser extends Component
{
    use Users;

    public $id;
    public $name;
    public $email;
    public $username;
    public $role;

    public $user;
    public $roles;

    public function mount($id)
    {
        $this->id = $id;

        $this->user = User::find($this->id);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
        $this->username = $this->user->username;
        $this->role = $this->user->getRoleNames();

        $this->roles = Role::all();
    }

    public function render()
    {
        return view('livewire.settings.users.edit-user');
    }

    public function update()
    {
         $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $this->user->id,
            'username' => 'required',
            'role' => 'required',
        ],
        [
            'name.required'=>'Name is required!',
            'email.required'=>'Email is required!',
            'username.required'=>'Username is required!',
            'role.required'=>'Role is required!',
        ]);

        //Check if username exists
        if($this->usernameExists($this->username) && !$this->usernameBelongsToUser($this->username,$this->id)){

            session()->flash('error', 'The username has already been taken!');
            
            return;
        }

        $update = $this->user->update([
            "name"=>$this->name,
            "email"=>$this->email,
            "username"=>$this->username,
        ]);

        if($update){
            //Assign user the selected role
            $this->user->assignRole($this->role);

            session()->flash('success', 'User updated successfully!');
     
            return $this->redirect('/users', navigate: true);
        }else{
            session()->flash('error', 'A problem was encountered, user record was not updated. Please try again!');
        }
    }
}

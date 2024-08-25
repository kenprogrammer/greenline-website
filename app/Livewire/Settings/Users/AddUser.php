<?php

namespace App\Livewire\Settings\Users;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Traits\Users;

class AddUser extends Component
{
    use Users;

    public $name;
    public $email;
    public $username;
    public $password;
    public $confirm_password;
    public $role;

    public $roles;

    public function mount()
    {
        $this->roles = Role::all();
    }

    public function render()
    {
        return view('livewire.settings.users.add-user');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'username' => 'required',
            'password' => 'required',
            'confirm_password' => 'required',
            'role' => 'required',
        ],
        [
            'name.required'=>'Name is required!',
            'email.required'=>'Email is required!',
            'username.required'=>'Username is required!',
            'password.required'=>'Password is required!',
            'confirm_password.required'=>'Password confirmation is required!',
            'role.required'=>'Role is required!',
        ]);

        //Check if username exists
        if($this->usernameExists($this->username)){

            session()->flash('error', 'The username has already been taken!');
            
            return;
        }

        //Check if password and confirmation match
        if($this->password!=$this->confirm_password){

            session()->flash('error', 'Password and confirmation do NOT match. Please try again!');
            
            return;
        }

        $user=User::create([
            "name"=>$this->name,
            "email"=>$this->email,
            "username"=>$this->username,
            "password"=>bcrypt($this->confirm_password)
        ]);

        if($user){
            //Assign user the selected role
            $user->assignRole($this->role);

            session()->flash('success', 'User added successfully!');
     
            return $this->redirect('/users', navigate: true);
        }else{
            session()->flash('error', 'A problem was encountered, user record was not created. Please try again!');
        }
    }
}

<?php

namespace App\Livewire\Settings\Users;

use Livewire\Component;
use App\Models\User;

class ChangePassword extends Component
{
    public $user_id;
    public $new_password;
    public $confirm_password;

    public function mount($id)
    {
        $this->user_id = $id;
    }

    public function changePassword()
    {
        $this->validate([
            'new_password'=>'required',
            'confirm_password'=>'required',
        ],
        [
            'new_password.required'=>'New Password is required',
            'confirm_password.required'=>'Password Confirmation is required'
        ]);

        if($this->new_password!=$this->confirm_password){

            session()->flash('error', 'New password and confirmation do NOT match. Please try again!');
            
        }else{
            $user=User::find($this->user_id);
            $user->password=bcrypt($this->confirm_password);
            $user->save();

            session()->flash('success', 'Password for '.$user->name.' changed successfully!');
            return $this->redirect('/users', navigate: true);
        }
    }

    public function render()
    {
        return view('livewire.settings.users.change-password');
    }
}

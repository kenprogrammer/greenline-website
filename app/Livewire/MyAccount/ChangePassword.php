<?php

namespace App\Livewire\MyAccount;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ChangePassword extends Component
{
    public $current_password;
    public $new_password;
    public $confirm_password;

    public function changePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required',
        ],
        [
            'current_password.required'=>'Current password is required!',
            'new_password.required'=>'New password is required!',
            'confirm_password.required'=>'Confirm password is required!',
        ]);

        $id=Auth::user()->id;
        $user=User::where('id',$id)->first();

        if(!Hash::check($this->current_password, $user->password)) {

            session()->flash('error', 'You entered wrong Current password. Please try again!');

        }elseif($this->new_password!=$this->confirm_password){

            session()->flash('error', 'Your New password and confirmation do NOT match. Please try again!');
            
        }else{
            $user=User::find($id);
            $user->password=bcrypt($this->new_password);
            $user->save();

            session()->flash('success', 'Password changed successfully!');
            return $this->redirect('/', navigate: true);
        }    
    }

    public function render()
    {
        return view('livewire.my-account.change-password');
    }
}

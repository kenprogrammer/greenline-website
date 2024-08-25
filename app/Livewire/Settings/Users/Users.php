<?php

namespace App\Livewire\Settings\Users;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class Users extends Component
{
    use WithPagination;

    public $search='';

    public function render()
    {
        $users = $this->search 
            ? User::where('is_admin',0)
                    ->where(function ($query) {
                    $query->where('name', 'like', '%' . $this->search . '%')
                          ->orWhere('email', 'like', '%' . $this->search . '%');
              })
             ->paginate(10)
            : User::where('is_admin',0)->paginate(10);

        return view('livewire.settings.users.index', ['users' => $users]);
    }

    /**
     * Deactivate user account 
     */
    public function deactivateAccount($id)
    {
        $user=User::find($id);
        $user->is_active=0;
        $user->save();

        if($user){
            session()->flash('success', 'User account deactivated successfully!');

            return $this->redirect('/users', navigate: true);
        }else{
            session()->flash('error', 'Unable to deactivate user account. Please try again!');
        }
    }

    /**
     * Activate user account 
     */
    public function activateAccount($id)
    {
        $user=User::find($id);
        $user->is_active=1;
        $user->save();

        if($user){
            session()->flash('success', 'User account activated successfully!');

            return $this->redirect('/users', navigate: true);
        }else{
            session()->flash('error', 'Unable to activate user account. Please try again!');
        }
    }
}

<?php

namespace App\Livewire\Settings\Roles;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;

class Roles extends Component
{
    use WithPagination;

    public $search='';

    public function render()
    {
        $roles = $this->search 
                ? Role::where('name', 'like', '%' . $this->search . '%')->where('is_default',0)->paginate(10)
                : Role::where('is_default',0)->paginate(10);

        return view('livewire.settings.roles.index', ['roles' => $roles]);
    }

    public function delete($id)
    {
        $delete = Role::find($id)->delete();

        if($delete){
            session()->flash('success', 'Role deleted successfully!');

            return $this->redirect('/roles', navigate: true);
        }else{
            session()->flash('error', 'Unable to delete role. Please try again!');
        }
    }
}

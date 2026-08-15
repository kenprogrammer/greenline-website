<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\Attributes\Layout;
use DB;

class ContactUs extends Component
{
    #[Layout('components.layouts.app-frontend')]
    public function render()
    {
        $contact_info =  DB::table('contacts')->first();

        return view('livewire.frontend.contact-us',['contact'=>$contact_info]);
    }
}

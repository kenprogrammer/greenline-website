<?php

namespace App\Livewire\Content\Contacts;

use Livewire\Component;
use DB;
use Carbon\Carbon;

class UpdateContactInformation extends Component
{
    public $contactInfo;

    public $main_phone_no;
    public $phone_no_2;
    public $phone_no_3;
    public $main_email;
    public $email_2;
    public $email_3;
    public $postal_address;
    public $office_location;

    public function mount()
    {
        $this->contactInfo = DB::table('contacts')->first();

        $this->main_phone_no = $this->contactInfo->phone;
        $this->phone_no_2 = $this->contactInfo->phone_2;
        $this->phone_no_3 = $this->contactInfo->phone_3;
        $this->main_email = $this->contactInfo->email;
        $this->email_2 = $this->contactInfo->email_2;
        $this->email_3 = $this->contactInfo->email_3;
        $this->postal_address = $this->contactInfo->postal_address;
        $this->office_location = $this->contactInfo->office_location;
    }

    public function render()
    {
        return view('livewire.content.contacts.update-contact-information');
    }

    public function update()
    {
        $this->validate([
            'main_phone_no' => 'required|string|max:13',
            'main_email' => 'required|string|max:40',
            'postal_address' => 'required|string||max:40',
            'office_location' => 'required||string|max:60',
        ],
        [
            'main_phone_no.required'=>'Main phone number is required!',
            'main_email.required'=>'Main emal address is required!',
            'postal_address.required'=>'Postal address is required!',
            'office_location.required'=>'Office location is required!',
            'main_phone_no.max' => 'Invalid phone number!',
            'main_email.max' => 'The emal address is too long to be valid!',
            'postal_address.max' => 'The postal address is too long to be valid',
            'office_location.max' => 'Office location is too long!',
        ]);


        $updateContactInfo=DB::table('contacts')->update([
                'phone'=>$this->main_phone_no,
                'phone_2'=>$this->phone_no_2,
                'phone_3'=>$this->phone_no_3,
                'email'=>$this->main_email,
                'email_2'=>$this->email_2,
                'email_3'=>$this->email_3,
                'postal_address'=>$this->postal_address,
                'office_location'=>$this->office_location,
                'updated_at'=>Carbon::now()
        ]);

        if($updateContactInfo){
            session()->flash('success', 'Contact information updated successfully!');
        }else{
            session()->flash('error', 'Unable to update contact information. Please try again!');
        }
    }
}

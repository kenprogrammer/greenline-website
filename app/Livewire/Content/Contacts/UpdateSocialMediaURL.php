<?php

namespace App\Livewire\Content\Contacts;

use Livewire\Component;
use DB;
use Carbon\Carbon;

class UpdateSocialMediaURL extends Component
{
    public $editingLinkId;
    public $editUrl;
    public $editPlatform;

    public function mount($id)
    {
        $this->editingLinkId = $id;

        $links = DB::table('social_media')->where('id',$this->editingLinkId)->first();

        $this->editUrl = $links->url;
        $this->editPlatform = $links->platform;
    }

    public function render()
    {
        return view('livewire.content.contacts.update-social-media-u-r-l');
    }

    public function updateUrl()
    {
        $this->validate([
            'editUrl' => 'required|url|max:255',
        ],
        [
            'editUrl.required'=>'Url is required!',
            'editUrl.max'=>'The Url is too long'
        ]);

        $updateUrl = DB::table('social_media')->where('id',$this->editingLinkId)->update(['url'=>$this->editUrl,'updated_at'=>Carbon::now()]);

        if($updateUrl){
            session()->flash('success', ucfirst($this->editPlatform).' link updated successfully.');

            return $this->redirect('/admin/social-media', navigate: true);
        }else{
            session()->flash('error', 'Unable to update '.ucfirst($this->editPlatform).' link. Please try again!');
        }
    }
}

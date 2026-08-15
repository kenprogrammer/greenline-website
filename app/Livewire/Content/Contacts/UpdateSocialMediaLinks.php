<?php

namespace App\Livewire\Content\Contacts;

use Livewire\Component;
use DB;
use Carbon\Carbon;

class UpdateSocialMediaLinks extends Component
{
    public $links;

    public function mount()
    {
        $this->links = DB::table('social_media')->get();
    }

    public function render()
    {
        return view('livewire.content.contacts.update-social-media-links');
    }

    /**
     * Disable social media link
     * 
     * This hides the link from the website frontend.
     */
    public function disable($id)
    {
        $update = DB::table('social_media')->where('id',$id)->update(['is_enabled'=>false,'updated_at'=>Carbon::now()]);

        if($update){
            session()->flash('success', 'Link disabled successfully!');

            return $this->redirect('/admin/social-media', navigate: true);
        }else{
            session()->flash('error', 'Unable to disable link. Please try again!');
        }
    }

    /**
     * Enable social media link
     * 
     * This shows the link on the website frontend.
     */
    public function enable($id)
    {
        $update = DB::table('social_media')->where('id',$id)->update(['is_enabled'=>true,'updated_at'=>Carbon::now()]);

        if($update){
            session()->flash('success', 'Link enabled successfully!');

            return $this->redirect('/admin/social-media', navigate: true);
        }else{
            session()->flash('error', 'Unable to enable link. Please try again!');
        }
    }
}

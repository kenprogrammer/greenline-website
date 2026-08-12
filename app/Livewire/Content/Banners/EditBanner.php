<?php

namespace App\Livewire\Content\Banners;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;
use App\Models\Post;

class EditBanner extends Component
{
    use WithFileUploads;
    
    public $banner_title;
    public $banner_desc;
    public $links_to = 'none';
    public $article_slug = '';
    public $external_url = '';
    public $banner_image;

    public $banner;
    public $serviceArticles;
    public $newsEvents;

    public function mount($banner_id)
    {
        // Get banner info
        $this->banner = Banner::where('banner_id',$banner_id)->first();

        if(empty($this->banner)){

            session()->flash('error', 'Unable to fetch banner details. Please try again!');

            return $this->redirect('/admin/banners', navigate: true);
        }

        $this->banner_title = $this->banner->title;
        $this->banner_desc = $this->banner->description;
        $this->links_to = $this->banner->links_to;
        $this->article_slug = $this->banner->linked_article_slug;
        $this->external_url = $this->banner->linked_url;

        // Get service articles
        $this->serviceArticles = Post::wherePublished(true)
                                     ->where('post_type','service')
                                     ->get();

        // Get news & events articles
        $this->newsEvents = Post::wherePublished(true)
                                ->where(function ($query) {
                                    $query->where('post_type','news')
                                          ->orWhere('post_type','event');
                                })
                                ->get();
    }

    public function updatedLinksTo($value)
    {
        // Clear values when switching between link types
        if ($value !== 'article' && $value !== 'news_event') {
            $this->article_slug = '';
        }

        if ($value !== 'external_url') {
            $this->external_url = '';
        }
    }

    public function render()
    {
        return view('livewire.content.banners.edit-banner');
    }

    public function update()
    {
        $this->validate([
            'banner_title' => 'nullable|string|max:30',
            'banner_desc' => 'nullable|string|max:50',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ],
        [
            'banner_title.max'=>'Banner title should not exceed 30 characters!',
            'banner_desc.max'=>'Banner description should not exceed 50 characters!',
            'banner_image.image' => 'The selected file must be a valid image.',
            'banner_image.mimes' => 'Please upload only JPEG or PNG images.',
            'banner_image.max' => 'Image size should not exceed 5MB.',
        ]);

        if(($this->links_to === 'article' || $this->links_to === 'news_event') && empty($this->article_slug)){

            $this->addError('article_slug', 'Please select an article!');

            return;
        }

        if($this->links_to === 'external_url' && empty($this->external_url)){

            $this->addError('external_url', 'Please add external link!');

            return;
        }

        if ($this->banner_image) { // Check if image has been selected
            // Delete old image
            $imagePath = 'media/banners/' . $this->banner->assoc_image;

            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

            // Upload new image
            $filename =(string) Str::orderedUuid().time() . '.' . $this->banner_image->extension();

            $banner_image_upload_path = $this->banner_image->storeAs(
                'media/banners',
                $filename,
                'public'
            );

            if ($banner_image_upload_path && Storage::disk('public')->exists($banner_image_upload_path)) {

                // Update banner record
                $this->banner->title=$this->banner_title;
                $this->banner->description=$this->banner_desc;
                $this->banner->assoc_image = $filename;
                $this->banner->links_to = $this->links_to;
                $this->banner->linked_article_slug = $this->article_slug;
                $this->banner->linked_url = $this->external_url;

                if($this->banner->update()){
                    session()->flash('success', 'Banner updated successfully!');

                    return $this->redirect('/admin/banners', navigate: true);
                }else{
                    session()->flash('error', 'Unable to update banner. Please try again!');
                }  

            }else{
                session()->flash('error', 'Unable to update banner. Please try again!');
            }

        }else{

            // Update banner record
            $this->banner->title=$this->banner_title;
            $this->banner->description=$this->banner_desc;
            $this->banner->links_to = $this->links_to;
            $this->banner->linked_article_slug = $this->article_slug;
            $this->banner->linked_url = $this->external_url;

            if($this->banner->update()){
                session()->flash('success', 'Banner updated successfully!');

                return $this->redirect('/admin/banners', navigate: true);
            }else{
                session()->flash('error', 'Unable to update banner. Please try again!');
            }   
        }
    }
}

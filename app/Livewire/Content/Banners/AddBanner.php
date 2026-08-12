<?php

namespace App\Livewire\Content\Banners;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Banner;
use App\Models\Post;

class AddBanner extends Component
{
    use WithFileUploads;

    public $banner_title;
    public $banner_desc;
    public $links_to = 'none';
    public $article_slug = '';
    public $external_url = '';
    public $banner_image;

    public $serviceArticles;
    public $newsEvents;

    public function mount()
    {
        $this->serviceArticles = Post::wherePublished(true)
                                    ->where('post_type','service')
                                    ->get();

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
        return view('livewire.content.banners.add-banner',['serviceArticles'=>$this->serviceArticles,'newsEvents'=>$this->newsEvents]);
    }

    public function store()
    {
        $this->validate([
            'banner_title' => 'nullable|string|max:30',
            'banner_desc' => 'nullable|string|max:50',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ],
        [
            'banner_title.max'=>'Banner title should not exceed 30 characters!',
            'banner_desc.max'=>'Banner description should not exceed 50 characters!',
            'banner_image.required'=>'Upload banner image!',
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

        $banner_image_filename = (string) Str::orderedUuid().time() . '.' . $this->banner_image->extension();

        $banner_image_upload_path = $this->banner_image->storeAs('media/banners', $banner_image_filename, 'public');

        if ($banner_image_upload_path && Storage::disk('public')->exists($banner_image_upload_path)) {

            $banner_id = (string) Str::orderedUuid();

            $banner = Banner::create([
                'banner_id'=>$banner_id,
                'title'=>$this->banner_title,
                'description'=>$this->banner_desc,
                'assoc_image'=>$banner_image_filename,
                'links_to'=>$this->links_to,
                'linked_article_slug'=>$this->article_slug,
                'linked_url'=>$this->external_url
            ]);

            if($banner){
                session()->flash('success', 'Banner created successfully!');

                return $this->redirect('/admin/banners', navigate: true);
            }else{
                session()->flash('error', 'Unable to create banner details. Please try again!');

                return;
            }

        }else{
            session()->flash('error', 'Unable to upload banner image. Please try again!');

            return;
        }
    }
}

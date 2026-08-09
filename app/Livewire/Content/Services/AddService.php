<?php

namespace App\Livewire\Content\Services;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use Carbon\Carbon;

class AddService extends Component
{
    use WithFileUploads;

    public $post_title;
    public $post_content;
    public $post_image;

    public function render()
    {
        return view('livewire.content.services.add-service');
    }

    public function store()
    {
        $this->validate([
            'post_title' => 'required|string|max:100',
            'post_content' => 'required',
            'post_image' => 'required|image|mimes:jpeg,png,jpg|max:5120'
        ],
        [
            'post_title.required'=>'Service title is required!',
            'post_content.required'=>'Service content is required!',
            'post_image.required'=>'Upload an image associated with the service!'
        ]);

        $post_image_filename = (string) Str::orderedUuid().time() . '.' . $this->post_image->extension();

        $post_image_upload_path = $this->post_image->storeAs('media/posts', $post_image_filename, 'public');

        if ($post_image_upload_path && Storage::disk('public')->exists($post_image_upload_path)) {

            $slug = Str::slug($this->post_title).'_'.(string) Str::orderedUuid(); //Generate slug

            $post = Post::create([
                'slug'=>$slug,
                'title'=>$this->post_title,
                'content'=>$this->post_content,
                'assoc_image'=>$post_image_filename,
                'post_type'=>'service',
                'published'=>1,
                'published_at'=>Carbon::now()
            ]);

            if($post){
                // Redirect or show success message
                session()->flash('success', 'Service created successfully!');

                return $this->redirect('/admin/services', navigate: true);
            }

        }else{
            session()->flash('error', 'Unable to upload image. Please try again!');
        }
    }
}

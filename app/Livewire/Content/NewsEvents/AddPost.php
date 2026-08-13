<?php

namespace App\Livewire\Content\NewsEvents;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Post;
use Carbon\Carbon;

class AddPost extends Component
{
    use WithFileUploads;

    public $post_title;
    public $post_content;
    public $post_image;
    public $post_type;

    public function render()
    {
        return view('livewire.content.news-events.add-post');
    }

    public function store()
    {
        $this->validate([
            'post_title' => 'required|string|max:100',
            'post_content' => 'required',
            'post_image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'post_type' => 'required',
        ],
        [
            'post_title.required'=>'Post title is required!',
            'post_content.required'=>'Post content is required!',
            'post_image.required'=>'Upload an image associated with the post!',
            'post_type.required'=>'Please select post type!',
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
                'post_type'=>$this->post_type,
                'published'=>1,
                'published_at'=>Carbon::now()
            ]);

            if($post){
                // Redirect or show success message
                session()->flash('success', 'Post created successfully!');

                return $this->redirect('/admin/posts', navigate: true);
            }

        }else{
            session()->flash('error', 'Unable to upload image. Please try again!');
        }
    }
}

<?php

namespace App\Livewire\Content\Pages;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\AboutUs;

class AboutPage extends Component
{
    use WithFileUploads;

    public $post_title;
    public $post_content;
    public $post_image;

    public $post;

    public function mount()
    {
        $this->post = AboutUs::first();

        $this->post_title = $this->post->title;
        $this->post_content = $this->post->content;
    }

    public function render()
    {
        return view('livewire.content.pages.about-us');
    }

    public function update()
    {
        $this->validate([
            'post_title' => 'required|string|max:100',
            'post_content' => 'required',
            'post_image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ],
        [
            'post_title.required'=>'Page title is required!',
            'post_content.required'=>'Page content is required!',
            'post_image.image' => 'The selected file must be a valid image.',
            'post_image.mimes' => 'Please upload only JPEG or PNG images.',
            'post_image.max' => 'Image size should not exceed 5MB.',
        ]);

        if ($this->post_image) { // Check if image has been selected
            
            // Delete old image
            $imagePath = 'media/posts/' . $this->post->assoc_image;

            if (Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }

            // Upload new image
            $filename =(string) Str::orderedUuid().time() . '.' . $this->post_image->extension();

            $this->post_image->storeAs(
                'media/posts',
                $filename,
                'public'
            );

            //Update post record
            $this->post->title=$this->post_title;
            $this->post->content=$this->post_content;
            $this->post->assoc_image = $filename;

            if($this->post->update()){
                session()->flash('success', 'Page updated successfully!');

                return $this->redirect('/admin/about-us', navigate: true);
            }else{
                session()->flash('error', 'Unable to update about us page. Please try again!');
            }   

            session()->flash('success', 'Page updated successfully!');

            return $this->redirect('/admin/about-us', navigate: true);
        }else{
            //Update post record
            $this->post->title=$this->post_title;
            $this->post->content=$this->post_content;
            
            if($this->post->update()){
                session()->flash('success', 'Page updated successfully!');

                return $this->redirect('/admin/about-us', navigate: true);
            }else{
                session()->flash('error', 'Unable to update about us page. Please try again!');
            }   
        }
    }
}

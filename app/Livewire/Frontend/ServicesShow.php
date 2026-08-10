<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Post;

class ServicesShow extends Component
{
    public $post;
    public $posts;

    public function mount($slug)
    {
        $this->post=Post::where('slug',$slug)->first();

        $this->posts = Post::where('post_type','service')
                      ->where('published',1)
                      ->where('slug','!=',$slug)
                      ->get();
    }

    #[Layout('components.layouts.app-frontend')]
    public function render()
    {
        return view('livewire.frontend.services-show');
    }
}

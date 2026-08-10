<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use App\Models\Post;

class Home extends Component
{
    use WithPagination;

    #[Layout('components.layouts.app-frontend')]
    public function render()
    {
        $posts = Post::where('post_type','service')
                      ->where('published',1)
                      ->paginate(6)
                      ->fragment('services');   // appends #services to every generated link

        return view('livewire.frontend.home',['posts' => $posts]);
    }
}

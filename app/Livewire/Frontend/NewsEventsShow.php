<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Post;

class NewsEventsShow extends Component
{
    public string $slug;
    public $events;
    public $news;

    public function mount(string $slug): void
    {
        $this->slug = $slug;

        $this->post = Post::where('slug', $slug)->firstOrFail();

        $this->events = Post::where('post_type','event')
                              ->where('published',1)
                              ->where('slug','!=',$slug)
                              ->orderBy('updated_at','desc')
                              ->limit(5)
                              ->get();

        $this->news = Post::where('post_type','news')
                              ->where('published',1)
                              ->where('slug','!=',$slug)
                              ->orderBy('updated_at','desc')
                              ->limit(5)
                              ->get();
    }

    #[Layout('components.layouts.app-frontend')]
    public function render()
    {
        return view('livewire.frontend.news-events-show', [
            'post' => $this->post,
        ]);
    }
}
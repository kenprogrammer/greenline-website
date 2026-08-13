<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;
use App\Models\Post;

class NewsEvents extends Component
{
    use WithPagination;

    // 'all' | 'news' | 'event'
    public string $filter = 'all';

    public function setFilter(string $filter): void
    {
        $this->filter = $filter;
        $this->resetPage();
    }

    #[Layout('components.layouts.app-frontend')]
    public function render()
    {
        // Get news & events
        $posts = Post::query()
                    ->when(
                        $this->filter !== 'all',
                        fn ($q) => $q->where('post_type', $this->filter),
                        fn ($q) => $q->whereIn('post_type', ['news', 'event'])
                    )
                    ->latest('published_at')
                    ->paginate(6);

        return view('livewire.frontend.news-events', [
            'posts' => $posts,
        ]);
    }
}
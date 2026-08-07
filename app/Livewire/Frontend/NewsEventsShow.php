<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\Attributes\Layout;

class NewsEventsShow extends Component
{
    public string $slug;

    public function mount(string $slug): void
    {
        $this->slug = $slug;

        // Replace with a real lookup once you have a model, e.g.:
        // $this->post = Post::where('slug', $slug)->firstOrFail();
    }

    #[Layout('components.layouts.app-frontend')]
    public function render()
    {
        return view('livewire.frontend.news-events-show', [
            'post' => $this->currentItem(),
        ]);
    }

    private function currentItem(): array
    {
        // Placeholder single item — swap for a real model lookup keyed on $this->slug.
        return [
            'type' => 'event',
            'type_label' => 'Event',
            'title' => 'Live Webinar: Navigating New Customs Duty Changes For FY26',
            'date' => 'Jul 14, 2026',
            'time' => '4:00 PM - 5:30 PM IST',
            'location' => 'Online — Zoom',
            'author' => 'Priya Sharma',
            'read_time' => '5 min read',
            'icon' => 'fa-video',
        ];
    }
}
<?php

namespace App\Livewire\Frontend;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;

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
        // Replace this with a real Eloquent query once you have a model, e.g.:
        // $posts = Post::query()
        //     ->when($this->filter !== 'all', fn ($q) => $q->where('type', $this->filter))
        //     ->latest('published_at')
        //     ->paginate(6);

        $items = collect($this->dummyItems())
            ->when($this->filter !== 'all', fn ($c) => $c->where('type', $this->filter))
            ->values();

        // Simple manual "pagination" for the placeholder data.
        $perPage = 6;
        $page = $this->getPage();
        $posts = new \Illuminate\Pagination\LengthAwarePaginator(
            $items->forPage($page, $perPage),
            $items->count(),
            $perPage,
            $page,
            ['path' => request()->url(), 'pageName' => 'page']
        );

        return view('livewire.frontend.news-events', [
            'posts' => $posts,
        ]);
    }

    private function dummyItems(): array
    {
        return [
            ['id' => 1, 'type' => 'news', 'title' => 'Greenline Holdings Ltd Opens New Bonded Warehouse In Nhava Sheva', 'excerpt' => 'Our new 40,000 sq. ft. facility adds bonded storage capacity for clients moving high-volume import shipments through JNPT.', 'date' => 'Jun 28, 2026', 'icon' => 'fa-warehouse'],
            ['id' => 2, 'type' => 'event', 'title' => 'Live Webinar: Navigating New Customs Duty Changes For FY26', 'excerpt' => 'Join our compliance team for a walkthrough of the latest duty structure changes and what they mean for your import costs.', 'date' => 'Jul 14, 2026', 'icon' => 'fa-video'],
            ['id' => 3, 'type' => 'news', 'title' => 'Greenline Holdings Ltd Achieves AEO Tier-2 Certification', 'excerpt' => 'The certification recognises our compliance record and unlocks faster clearance timelines for our clients\' shipments.', 'date' => 'Jun 15, 2026', 'icon' => 'fa-certificate'],
            ['id' => 4, 'type' => 'event', 'title' => 'Logistics Excellence Summit 2026 — Meet Us At Booth 24', 'excerpt' => 'We\'ll be at the annual Logistics Excellence Summit in Mumbai talking freight strategy and live customs Q&A.', 'date' => 'Aug 02, 2026', 'icon' => 'fa-calendar-days'],
            ['id' => 5, 'type' => 'news', 'title' => 'Partnership Announcement: Expanded Air Freight Capacity Ex-Delhi', 'excerpt' => 'A new carrier partnership gives us additional weekly air freight capacity out of Delhi to key Gulf and European hubs.', 'date' => 'May 30, 2026', 'icon' => 'fa-plane'],
            ['id' => 6, 'type' => 'news', 'title' => 'Greenline Holdings Ltd Named Top SME Logistics Partner 2026', 'excerpt' => 'Recognised by the Mumbai Trade & Logistics Council for service quality and clearance turnaround times.', 'date' => 'May 12, 2026', 'icon' => 'fa-award'],
            ['id' => 7, 'type' => 'event', 'title' => 'Free Workshop: Export Documentation Essentials For First-Time Exporters', 'excerpt' => 'A hands-on session covering invoices, packing lists, certificates of origin, and common rejection reasons.', 'date' => 'Apr 22, 2026', 'icon' => 'fa-chalkboard'],
            ['id' => 8, 'type' => 'news', 'title' => 'Office Relocation: New Head Office In Malad West', 'excerpt' => 'We\'ve moved to a larger head office to support our growing operations and client-facing team.', 'date' => 'Apr 05, 2026', 'icon' => 'fa-building'],
        ];
    }
}
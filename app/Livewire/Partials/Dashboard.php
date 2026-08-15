<?php

namespace App\Livewire\Partials;

use App\Models\Post;
use App\Models\Banner;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        // --- Post stats ---
        $totalPosts = Post::count();
        $publishedPosts = Post::where('published', true)->count();
        $draftPosts = $totalPosts - $publishedPosts;

        $postsByType = Post::selectRaw('post_type, count(*) as total')
            ->groupBy('post_type')
            ->pluck('total', 'post_type');

        // Posts missing basic SEO fields
        $missingSeoCount = Post::where(function ($q) {
            $q->whereNull('meta_title')
              ->orWhereNull('meta_description');
        })->count();

        // --- Banner stats ---
        $totalBanners = Banner::count();
        $activeBanners = Banner::where('published', true)->count();

        // --- Recent activity ---
        $recentPosts = Post::latest()->take(5)->get();
        $recentBanners = Banner::latest()->take(5)->get();

        return view('livewire.partials.dashboard', [
            'totalPosts' => $totalPosts,
            'publishedPosts' => $publishedPosts,
            'draftPosts' => $draftPosts,
            'servicesCount' => $postsByType->get('service', 0),
            'newsCount' => $postsByType->get('news', 0),
            'eventsCount' => $postsByType->get('event', 0),
            'missingSeoCount' => $missingSeoCount,
            'totalBanners' => $totalBanners,
            'activeBanners' => $activeBanners,
            'recentPosts' => $recentPosts,
            'recentBanners' => $recentBanners,
        ]);
    }
}
<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('components.layouts.app-frontend', function ($view) {
            $contact_info =  DB::table('contacts')->first();
            $socials =  DB::table('social_media')->where('is_enabled', true)->get();
            $services = Post::where([
                            ['published', true],
                            ['post_type', 'service']
                        ])
                        ->select('slug', 'title')
                        ->limit(5)
                        ->get();

            $view->with(['contact'=>$contact_info,'socials' => $socials, 'services'=>$services]);
        });
    }
}

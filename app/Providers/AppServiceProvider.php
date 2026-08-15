<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

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

            $view->with(['contact'=>$contact_info,'socials' => $socials]);
        });
    }
}

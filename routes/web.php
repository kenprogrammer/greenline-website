<?php

use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Partials\Dashboard;
use App\Livewire\Settings\Roles\Roles;
use App\Livewire\Settings\Roles\AddRole;
use App\Livewire\Settings\Roles\EditRole;
use App\Livewire\Settings\Users\Users;
use App\Livewire\Settings\Users\AddUser;
use App\Livewire\Settings\Users\EditUser;
use App\Livewire\Settings\Users\ChangePassword;
use App\Livewire\MyAccount\ChangePassword as ChangeMyPassword;
use App\Livewire\Content\Banners\ListBanners;
use App\Livewire\Content\Banners\AddBanner;
use App\Livewire\Content\Banners\EditBanner;
use App\Livewire\Content\Services\Services;
use App\Livewire\Content\Services\AddService;
use App\Livewire\Content\Services\EditService;
use App\Livewire\Content\NewsEvents\ListPosts;
use App\Livewire\Content\NewsEvents\AddPost;
use App\Livewire\Content\NewsEvents\EditPost;
use App\Livewire\Content\Pages\AboutPage;
use App\Livewire\Content\Contacts\UpdateContactInformation;
use App\Livewire\Content\Contacts\UpdateSocialMediaLinks;
use App\Livewire\Content\Contacts\UpdateSocialMediaURL;

use App\Livewire\Frontend\Home;
use App\Livewire\Frontend\About;
use App\Livewire\Frontend\ContactUs;
use App\Livewire\Frontend\NewsEvents;
use App\Livewire\Frontend\NewsEventsShow;
use App\Livewire\Frontend\ServicesShow;

Route::get('/', Home::class);
Route::get('/about', About::class);
Route::get('/contact', ContactUs::class)->name('contact');
Route::get('/news-events', NewsEvents::class)->name('news-events.index');
Route::get('/news-events-show/{slug}', NewsEventsShow::class)->name('news-events.show');
Route::get('/services-show/{slug}', ServicesShow::class)->name('services.show');

/**
 * Manage Website Content
 */
// Services
Route::get('/admin/banners', ListBanners::class)->middleware('auth');
Route::get('/admin/banners/create', AddBanner::class)->name('admin.banners.create')->middleware('auth');
Route::get('/admin/banners/edit/{banner_id}',EditBanner::class)->name('admin.banners.edit')->middleware('auth');
Route::get('/admin/services', Services::class)->middleware('auth');
Route::get('/admin/services/create', AddService::class)->middleware('auth');
Route::get('/admin/services/edit/{id}', EditService::class)->middleware('auth');
Route::get('/admin/posts', ListPosts::class)->middleware('auth');
Route::get('/admin/posts/create', AddPost::class)->name('admin.posts.create')->middleware('auth');
Route::get('/admin/posts/edit/{id}', EditPost::class)->name('admin.posts.edit')->middleware('auth');
Route::get('/admin/about-us', AboutPage::class)->middleware('auth');
Route::get('/admin/contact-info', UpdateContactInformation::class)->middleware('auth');
Route::get('/admin/social-media', UpdateSocialMediaLinks::class)->middleware('auth');
Route::get('/admin/social-media/update-url/{id}',UpdateSocialMediaURL::class)->middleware('auth');

//Auth
Route::get('login',[LoginController::class,'showLogin']);
Route::post('login',[LoginController::class,'authenticate'])->name('login')->middleware(ProtectAgainstSpam::class);
Route::post('logout',[LogoutController::class,'logout'])->middleware('auth');

Route::get('/admin/home', Dashboard::class)->middleware('auth');
Route::get('change-my-password',ChangeMyPassword::class)->middleware('auth');

//Settings
Route::get('/roles', Roles::class)->middleware('auth');
Route::get('/roles/create',AddRole::class)->middleware('auth');
Route::get('/roles/edit/{id}', EditRole::class)->middleware('auth');
Route::get('/users', Users::class)->middleware('auth');
Route::get('/users/create', AddUser::class)->middleware('auth');
Route::get('/users/edit/{id}', EditUser::class)->middleware('auth');
Route::get('users/change-password/{id}',ChangePassword::class)->middleware('auth');

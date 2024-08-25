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
use  App\Livewire\MyAccount\ChangePassword as ChangeMyPassword;

//Auth
Route::get('login',[LoginController::class,'showLogin']);
Route::post('login',[LoginController::class,'authenticate'])->name('login')->middleware(ProtectAgainstSpam::class);
Route::post('logout',[LogoutController::class,'logout'])->middleware('auth');

Route::get('/', Dashboard::class)->middleware('auth');
Route::get('change-my-password',ChangeMyPassword::class)->middleware('auth');

//Settings
Route::get('/roles', Roles::class)->middleware('auth');
Route::get('/roles/create',AddRole::class)->middleware('auth');
Route::get('/roles/edit/{id}', EditRole::class)->middleware('auth');
Route::get('/users', Users::class)->middleware('auth');
Route::get('/users/create', AddUser::class)->middleware('auth');
Route::get('/users/edit/{id}', EditUser::class)->middleware('auth');
Route::get('users/change-password/{id}',ChangePassword::class)->middleware('auth');

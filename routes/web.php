<?php

use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Livewire\Partials\Dashboard;

//Auth
Route::get('login',[LoginController::class,'showLogin']);
Route::post('login',[LoginController::class,'authenticate'])->name('login')->middleware(ProtectAgainstSpam::class);
Route::post('logout',[LogoutController::class,'logout'])->middleware('auth');

Route::get('/', Dashboard::class)->middleware('auth');

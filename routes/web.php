<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Index;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\AboutUs;
use App\Http\Livewire\AllAds;
use App\Http\Livewire\Chats;
use App\Http\Livewire\ContactUs;
use App\Http\Livewire\CreateListing;
use App\Http\Livewire\EditProfile;
use App\Http\Livewire\SingleAd;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', Index::class);
Route::middleware('auth')->get('/dashboard', Dashboard::class);
Route::middleware('auth')->get('ad', CreateListing::class);
Route::middleware('auth')->resource('profile', ProfileController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

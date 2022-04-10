<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CategoryController;
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

Route::get('/', App\Http\Livewire\Index::class);
Route::get('/contact-us', App\Http\Livewire\ContactUs::class);
Route::get('/about-us', App\Http\Livewire\AboutUs::class);
Route::get('/', App\Http\Livewire\Index::class);
Route::middleware('auth')->get('/dashboard', App\Http\Livewire\Dashboard::class);
Route::resource('/ad', AdController::class);
Route::get('/search', [AdController::class, 'search'])->name('search');
Route::middleware('auth')->resource('/chat', ChatController::class);
Route::resource('/category', CategoryController::class);
// Route::middleware('auth')->get('/createchat/{$id}', function ($id){
//     $user = App\Models\User::find($id);
//     return view('livewire.chats')->with('chats',$chats)->with('user',$user);
// });
Route::middleware('auth')->resource('/profile', ProfileController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

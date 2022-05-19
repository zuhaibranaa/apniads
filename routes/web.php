<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\WishlistController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\JobApplicationController;
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

Route::get('/contact-us', App\Http\Livewire\ContactUs::class);
Route::get('/about-us', App\Http\Livewire\AboutUs::class);
Route::get('/', App\Http\Livewire\Index::class);
Route::middleware('auth')->get('/dashboard', App\Http\Livewire\Dashboard::class);
Route::middleware('auth')->get('/dashboard/all-ads', function () {
    if(auth()->user()->is_admin){
        $ads = App\Models\Ad::all();
        $count = 0;
        foreach ($ads as $ad) {
            if ($ad['status'] == 0) {
                $count++;
            }
        }
        return view('livewire.dashboard')
        ->with('ads',$ads)
        ->with('user', auth()->user())
        ->with('count', $count);
    }
});
Route::middleware('auth')->get('/dashboard/pending-ads', function () {
    if(auth()->user()->is_admin){
        $ads = App\Models\Ad::all()
        ->where('status','=',0);
        $count = count($ads);
        return view('livewire.dashboard-pending-ads')
        ->with('ads',$ads)
        ->with('user', auth()->user())
        ->with('count', $count);
    }
});
Route::middleware('auth')->get('/dashboard/delivered-orders', function () {
    if(auth()->user()->is_admin){
        $ads = App\Models\Order::all()->where('status',1);
        return view('livewire.dashboard-delivered-orders')
        ->with('ads',$ads);
    }
});
Route::middleware('auth')->get('/dashboard/active-orders', function () {
    if(auth()->user()->is_admin){
        $ads = App\Models\Ad::all();
        $count = 0;
        foreach ($ads as $ad) {
            if ($ad['status'] == 0) {
                $count++;
            }
        }
        return view('livewire.dashboard-active-orders')
        ->with('ads',$ads)
        ->with('user', auth()->user())
        ->with('count', $count);
    }
});
Route::middleware('auth')->resource('/wishlist', WishlistController::class);
Route::middleware('auth')->resource('/job', JobController::class);
Route::middleware('auth')->resource('/job-application', JobApplicationController::class);
Route::middleware('auth')->resource('/cart', CartController::class);
Route::middleware('auth')->resource('/order', OrderController::class);
Route::middleware('auth')->resource('/ad', AdController::class);
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

<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CatagoryController;
use Illuminate\Support\Facades\Request;
use App\Http\Livewire\Cart\QartItems;

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// These routes can be run called directly to view product detail without appling any middleware
Route::resource('/',ProductController::class);
Route::post('/product/search',[ProductController::class,'search'])->name('search');
Route::resource('/product',ProductController::class);
Route::get('/items',QartItems::class)->name('items');
Route::resource('/cart',CartController::class);

// Middleware is applied before these routes
Route::middleware('auth')->prefix('/user')->group(function(){
Route::get('/dashboard',[UserController::class,'index'])->name('user');
Route::resource('/cart',CartController::class);
Route::resource('/order',OrderController::class);
});

// Using admin functionality...
// Call to admin dashboard
Route::resource('admin',AdminController::class);
// Call to catagory
Route::resource('/admin-catagory',CatagoryController::class); 
Route::resource('/admin-product',ProductController::class);
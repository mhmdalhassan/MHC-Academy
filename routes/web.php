<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\OfferController;
use App\Models\Product;


Route::get('/', function () {
    return view('welcome');
});



Route::get('/course', [ProductController::class, 'courses'])->name('course');
Route::get('/course-description/{product}', [ProductController::class, 'description'])->name('course.description');


Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('features', FeatureController::class);
    Route::resource('offers', OfferController::class);
});

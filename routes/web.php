<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\ContactController;



Route::get('/', function () {
    return view('welcome');
});



Route::get('/course', [ProductController::class, 'courses'])->name('course');
Route::get('/course-description/{product}', [ProductController::class, 'description'])->name('course.description');



Route::get('/blog', [BlogController::class, 'clientIndex'])->name('client.blog');


Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/contact-us', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');
Route::get('/contact-us/products', [ContactController::class, 'getProducts'])->name('contact.products'); // AJAX


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

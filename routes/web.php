<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\FeatureController;
use App\Http\Controllers\ContactController;
use App\Models\Feature;
use App\Http\Controllers\RequestController;


Route::get('/', function () {
    $features = Feature::where('is_active', true)->get();
    return view('welcome', compact('features'));
});



Route::get('/course', [ProductController::class, 'courses'])->name('course');
Route::get('/course-description/{product}', [ProductController::class, 'description'])->name('course.description');



Route::get('/blog', [BlogController::class, 'clientIndex'])->name('client.blog');


Route::get('/about', function () {
    return view('about');
})->name('about');


Route::get('/contact-us', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact-us', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth'])->group(function () {
    Route::get('requests', [RequestController::class, 'index'])->name('requests.index');
    Route::post('requests/send-mail/{id}', [RequestController::class, 'sendMail'])->name('requests.sendMail');
});


// optional if you still want ajax filtering later:
Route::get('/contact-us/products', [ContactController::class, 'getProducts'])->name('contact.products');







Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('features', FeatureController::class);
});

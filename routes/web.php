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
use App\Models\HeroSection;
use App\Models\HomeStatistic;
use App\Models\CourseTrack;
use App\Models\NewTrack;
use App\Models\Service; // ✅ add this
use App\Models\Image;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\InternalCourseController;
use App\Http\Controllers\FooterController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\StudentReviewController;
use App\Http\Controllers\HeroSectionController;
use App\Http\Controllers\HomeStatisticController;
use App\Http\Controllers\CourseTrackController;
use App\Http\Controllers\NewTrackController;


use App\Http\Controllers\ImageController;


Route::get('/', function () {
    $features = Feature::where('is_active', true)->get();
    $heroSection = HeroSection::latest()->first();
    $homeStatistic = HomeStatistic::latest()->first();
    $courseTracks = CourseTrack::latest()->get();
    $newTracks = NewTrack::latest()->get();
    $serviceSection = Service::latest()->first();

    // Fetch the latest banner image
    $bannerImage = Image::latest()->first();

    return view('welcome', compact(
        'features',
        'heroSection',
        'homeStatistic',
        'courseTracks',
        'newTracks',
        'serviceSection',
        'bannerImage'
    ));
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
Route::resource('requests', RequestController::class)->only(['index', 'show', 'destroy']);


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
    Route::resource('internal-courses', InternalCourseController::class);
    Route::resource('footer', FooterController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('instructors', InstructorController::class);
    Route::resource('student-reviews', StudentReviewController::class);
    Route::resource('hero-sections', HeroSectionController::class);
    Route::resource('home-statistics', HomeStatisticController::class);
    Route::resource('course-tracks', CourseTrackController::class);
    Route::resource('new-tracks', NewTrackController::class);
    Route::resource('home-banner', ImageController::class)->parameters([
        'home-banner' => 'image'
    ]);

});


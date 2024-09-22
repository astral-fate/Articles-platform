<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TestimonialController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TestimonialsController;
use App\Http\Controllers\PublicController;

use Illuminate\Support\Facades\Auth;
Route::get('/', [PublicController::class, 'index'])->name('home');

Route::get('/testimonials', [PublicController::class, 'testimonials'])->name('testimonials');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/testimonials', [TestimonialController::class, 'index'])->name('testimonials');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', [HomeController::class, 'index'])->name('home');
/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/topics/{topic}', [TopicController::class, 'show'])->name('topics.show');
Auth::routes();

// Explicit logout route
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/', [CategoryController::class, 'index'])->name('home');
Route::get('/topics/{topic}', [TopicController::class, 'show'])->name('topics.show');
Route::get('/', [HomeController::class, 'index'])->name('home');
// Public routes
Route::get('/', function () {
    return view('public.index');
});

// Authentication routes
Auth::routes();

// Admin routes
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/', [TopicController::class, 'index'])->name('dashboard');

    // Users
    Route::resource('users', UserController::class);

    // Categories
    Route::resource('categories', CategoryController::class);
    
    // Topics
    Route::resource('topics', TopicController::class);

    // Testimonials
    Route::resource('testimonials', TestimonialController::class);
    

    // Messages
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/{message}', [MessageController::class, 'show'])->name('messages.show');
    Route::delete('/messages/{message}', [MessageController::class, 'destroy'])->name('messages.destroy');
});

// Fallback route for 404
Route::fallback(function () {
    return view('errors.404');
});
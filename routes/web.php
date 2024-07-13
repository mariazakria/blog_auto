<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Guest\ViewBlogController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
 
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

// Route to the main page
Route::get('/', function () {
    return redirect()->route('guest.index');
});

// Authentication routes
Auth::routes();

// Guest routes
Route::prefix('guest')->group(function () {
    Route::get('/', [ViewBlogController::class, 'index'])->name('guest.index');
    Route::get('/{slug}', [ViewBlogController::class, 'show'])->name('blogs.show');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Home route
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    // Admin routes
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::resource('blogs', BlogController::class);
    });

    // Additional blog routes
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::get('/admin/blogs/{slug}', [BlogController::class, 'show'])->name('admin.blogs.show');
});


Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/blogs', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/blogs', [BlogController::class, 'store'])->name('blogs.store');
    Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');
    // Route::get('/blogs/{slug}', [BlogController::class, 'show'])->name('admin.blogs.show');

});
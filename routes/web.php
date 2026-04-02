<?php


use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ShowController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/category/{category_id}', [HomeController::class, 'index'])->name('home.category');

//Details des posts
Route::get('/show/{post:slug}', [ShowController::class, 'index'])->name('show');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified', 'admin'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Posts routes - Admin only
Route::resource('posts', \App\Http\Controllers\Posts\PostController::class)->middleware(['auth', 'admin']);

//Categories routes - Admin only
Route::resource('category', \App\Http\Controllers\Category\CategoryController::class)->middleware(['auth', 'admin']);

require __DIR__.'/auth.php';

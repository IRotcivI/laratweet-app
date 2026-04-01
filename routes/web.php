<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('back.dashboard');
})->middleware(['auth', 'verified', 'admin'])->name('dashboard');

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

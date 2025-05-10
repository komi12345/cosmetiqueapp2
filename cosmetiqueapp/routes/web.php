<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route for the main dashboard, handled by DashboardController
Route::get('/dashboard', App\Http\Controllers\DashboardController::class)->middleware(['auth', 'verified'])->name('dashboard.main');

// Breeze default dashboard route (will be used for regular users)
Route::get('/user/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        // This will be the admin dashboard view
        // We'll create this view later
        return view('admin.dashboard'); 
    })->name('dashboard');
    // Add other admin CRUD routes here later (Products, Collections, Blog)
    Route::resource('products', App\Http\Controllers\Admin\ProductController::class);
    Route::resource('collections', App\Http\Controllers\Admin\CollectionController::class);
    Route::resource('blog_posts', App\Http\Controllers\Admin\BlogPostController::class)->parameters(['blog_posts' => 'blogPost:slug']); // Use slug for route model binding
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

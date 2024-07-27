<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\RegionController;


// Public routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/category/{category}', [HomeController::class, 'category'])->name('category');
Route::get('/region/{region}', [HomeController::class, 'region'])->name('region');
Route::get('/news/{id}', [HomeController::class, 'detail'])->name('news.detail');

// Authentication routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->name('login.post')->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected routes for admin
Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('news', NewsController::class);
    Route::post('/news/upload', [NewsController::class, 'uploadImage'])->name('news.upload');
    Route::resource('categories', CategoryController::class);
    Route::resource('regions', RegionController::class);
    Route::resource('users', UserController::class);
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
});

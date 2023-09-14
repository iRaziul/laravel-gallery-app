<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
require __DIR__.'/auth.php';

Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/image/create', [ImageController::class, 'create'])->name('image.create');
    Route::post('/image', [ImageController::class, 'store'])->name('image.store');
    Route::get('/image/{image:id}/edit', [ImageController::class, 'edit'])->name('image.edit');
    Route::put('/image/{image:id}', [ImageController::class, 'update'])->name('image.update');
    Route::delete('/image/{image:id}', [ImageController::class, 'destroy'])->name('image.destroy');
    Route::post('/image/{image:id}/restore', [ImageController::class, 'restore'])->name('image.restore')->withTrashed();
});

Route::get('/user/{user:id}', [UserController::class, 'show'])->name('user.show');
Route::get('/image/{image:id}', [ImageController::class, 'show'])->name('image.show');

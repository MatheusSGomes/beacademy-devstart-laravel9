<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    UserController,
    PostController
};

require __DIR__.'/auth.php';

Route::get('/', function() {
    return view('home');
});

Route::middleware(['auth'])->group(function () {
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');
    Route::put('users/{id}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
    Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create')->middleware('auth');
    Route::post('/user', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/users/{id}/posts', [PostController::class, 'show'])->name('posts.show');
});

Route::middleware(['auth', 'admin'])->group(function() {
    Route::get('/admin', [UserController::class, 'admin'])->name('admin');
});

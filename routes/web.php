<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('come');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/search', [SearchController::class, 'index']);
Route::get('/searchusers', [SearchController::class, 'show']);
Route::get('/666consignment', [PostsController::class, 'show']);
Route::get('/detailpostingan/{id}', [PostsController::class, 'detailpostingan'])->name('posts.detailpostingan');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/home', [PostsController::class, 'index'])->name('home');
    Route::get('/add', [PostsController::class, 'create'])->name('create');
    Route::delete('/delete/{id}', [PostsController::class, 'destroy']);
    Route::get('/detail/{id}', [PostsController::class, 'detail'])->name('posts.detail');

    Route::resource('/create',PostsController::class);
    Route::resource('posts', PostsController::class);
});

require __DIR__.'/auth.php';

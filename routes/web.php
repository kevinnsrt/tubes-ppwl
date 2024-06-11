<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/666consignment', function () {
    return view('users');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth','verified'])->name('dashboard');

Route::get('/search', [SearchController::class, 'index']);
Route::get('/searchusers', [SearchController::class, 'show']);
Route::get('/account', [PostsController::class, 'show']);

Route::post('/pesanan/{id}', [PesananController::class, 'store']);
Route::get('/pesanan/{id}', [PesananController::class, 'show']);
Route::get('/detailpostingan/{id}', [PostsController::class, 'detailpostingan'])->name('posts.detailpostingan');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/home', [PostsController::class, 'index'])->name('home');
    Route::get('/add', [PostsController::class, 'create'])->name('create');
    Route::get('/pesanandetail', [DashboardController::class, 'show'])->name('pesanan');
    Route::delete('/postingan/delete/{id_postingan}', [PostsController::class, 'destroy']);
    Route::get('/detail/{id}', [PostsController::class, 'detail'])->name('posts.detail');
    Route::get('edit/{id_postingan}', [PostsController::class, 'edit'])->name('posts.edit');
    Route::put('edit/{id_postingan}', [PostsController::class, 'update'])->name('posts.update');

    Route::resource('/create',PostsController::class);
    Route::resource('posts', PostsController::class);
});

require __DIR__.'/auth.php';

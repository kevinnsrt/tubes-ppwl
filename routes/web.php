<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostsController;
use  Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
})->name('welcome.index');


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/register', [RegisterController::class, 'index'])->name('register.index');
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/search', [SearchController::class, 'index']);
Route::get('/searchusers', [SearchController::class, 'show']);
Route::get('/add', [PostsController::class, 'create']);
Route::resource('posts', PostsController::class);
Route::get('/home', [PostsController::class, 'index'])->middleware('auth.basic');
Route::get('/users', [PostsController::class, 'show']);
Route::delete('/delete/{id}', [PostsController::class, 'destroy']);
Route::get('/detail/{id}', [PostsController::class, 'detail'])->name('posts.detail');
Route::get('/detailpostingan/{id}', [PostsController::class, 'detailpostingan'])->name('posts.detailpostingan');
Route::resource('/create',PostsController::class);

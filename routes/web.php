<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PostsController;


Route::get('/', function () {
    return view('welcome');
})->name('welcome.index');

Route::get('/home', function () {
    return view('home');
})->name('home.index');

Route::get(('/login'),[LoginController::class,'index']);
Route::post(('/login'),[LoginController::class,'authenticate']);

Route::get('/register', function () {
    return view('register');
})->name('register.index');

Route::post(('/register'),[RegisterController::class,'store']);
// Route::get(('/home'),[HomeController::class,'index']);
// Route::get(('/users'),[UsersController::class,'index']);
Route::post(('/logout'),[LoginController::class,'logout']);
Route::get(('/search'),[SearchController::class,'index']);
Route::get(('/add'),[PostsController::class,'create']);
Route::resource('/create',PostsController::class);
// Route::post(('/create'),[PostsController::class,'store']);
// Route::resource('/crate', PostsController::class);
Route::get('/home', [PostsController::class, 'index']);
Route::get('/users', [PostsController::class, 'show']);

Route::delete('/delete/{id}', [PostsController::class, 'destroy']);



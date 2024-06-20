<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostsController;

Route::get('/', function () {
    return view('page.home');
})->name('home');

Route::get('/authenticate', [UserController::class, 'index'])->name('auth');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('register', [UserController::class, 'register'])->name('register');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::get('/create-post', [PostController::class, 'index'])->name('create.new.post');
Route::post('/create-post/create', [PostController::class, 'create'])->name('create.post');
Route::post('/delete-post', [PostController::class, 'delete'])->name('delete.post');
Route::post('/update-post', [PostController::class, 'update'])->name('update.post');

Route::get('/posts', [PostsController::class, 'index'])->name('posts');
Route::get('/posts/{id}', [PostsController::class, 'show'])->name('post');
Route::post('/posts/{id}/rate', [PostController::class, 'rate'])->name('post.rate');

<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('page.home');
})->name('home');

Route::get('/authenticate', [UserController::class, 'index'])->name('auth');
Route::post('/login', [UserController::class, 'login'])->name('login');
Route::post('register', [UserController::class, 'register'])->name('register');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

Route::get('/create-new-post', [PostController::class, 'index'])->name('create.new.post');
Route::post('/create-post', [PostController::class, 'create'])->name('create.post');

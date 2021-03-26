<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\DahsboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts.app');
})->name('home');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest')->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/logout', [LogoutController::class, 'index'])->name('logout');
Route::post('/logout', [LogoutController::class, 'logout']);

Route::get('/dashboard', [DahsboardController::class, 'index'])->middleware('auth')->name('dashboard');

Route::get('/posts', [PostsController::class, 'index'])->middleware('auth')->name('posts');
Route::post('/posts', [PostsController::class, 'store']);
Route::delete('/posts/{post}', [PostsController::class, 'delete']);

Route::post('/posts/{post}/like', [PostsController::class, 'likePost'])->name('posts.like');
Route::post('/posts/{post}/dislike', [PostsController::class, 'dislikePost'])->name('posts.dislike');

Route::post('/posts/edit', [PostsController::class, 'EditPost']);
Route::get('/posts/userPosts', [PostsController::class, 'userPosts']);
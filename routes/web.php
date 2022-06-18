<?php

use App\Http\Controllers\MainController;
use App\Http\Controllers\Post\CreateController;
use App\Http\Controllers\Post\DeleteController;
use App\Http\Controllers\Post\EditController;
use App\Http\Controllers\Post\IndexController;
use App\Http\Controllers\Post\ShowController;
use App\Http\Controllers\Post\StoreController;
use App\Http\Controllers\Post\UpdateController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [MainController::class, 'index'])->name('home');
Route::redirect('/home', '/')->name('home.redirect');

Route::get('posts', IndexController::class)->name('post.index');
Route::get('posts/create', CreateController::class)->name('post.create');

Route::post('posts/posts', StoreController::class)->name('post.store');
Route::get('posts/{post}', ShowController::class)->name('post.show');
Route::get('posts/{post}/edit', EditController::class)->name('post.edit');
Route::put('posts/{post}', UpdateController::class)->name('post.update');
Route::delete('posts/{post}', DeleteController::class)->name('post.delete');


Route::get('/profile', ProfileController::class)->name('profile.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

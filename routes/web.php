<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\PostController;

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

// Welcome
Route::get('/', [WelcomeController::class, 'index'])
    ->middleware(['auth'])->name('dashboard');
Route::get('/articles', [WelcomeController::class, 'showArticles'])
    ->middleware(['auth'])->name('articles');

// Post
Route::post('/posts/create', [PostController::class, 'create']);
Route::post('/posts/{post}/destroy', [PostController::class, 'destroy']);
Route::post('/posts/{post}/edit', [PostController::class, 'edit']);






require __DIR__.'/auth.php';

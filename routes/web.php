<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [MainController::class, 'welcome'])->name('welcome');
Route::get('/about/', [MainController::class, 'about'])->name('about');
Route::get('/contacts/', [MainController::class, 'contacts'])->name('contacts');
Route::get('/cv/', [MainController::class, 'cv'])->name('cv');

Route::get('/posts/', [PostController::class, 'showPosts']);
Route::get('/posts/create/', [PostController::class, 'create']);
Route::get('/posts/update/', [PostController::class, 'update']);
Route::get('/posts/delete/', [PostController::class, 'delete']);
Route::get('/posts/restore/', [PostController::class, 'restore']);
Route::get('/posts/first_or_create', [PostController::class, 'firstOrCreate']);
Route::get('/posts/update_or_create', [PostController::class, 'updateOrCreate']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

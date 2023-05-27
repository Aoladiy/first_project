<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyPlaceController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about/', [MyPlaceController::class, 'cv']);
Route::get('/posts/', [PostController::class, 'showPosts']);
Route::get('/posts/create/', [PostController::class, 'create']);
Route::get('/posts/update/', [PostController::class, 'update']);
Route::get('/posts/delete/', [PostController::class, 'delete']);
Route::get('/posts/restore/', [PostController::class, 'restore']);
Route::get('/posts/first_or_create', [PostController::class, 'firstOrCreate']);
Route::get('/posts/update_or_create', [PostController::class, 'updateOrCreate']);

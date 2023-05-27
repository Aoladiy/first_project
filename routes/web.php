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
Route::get('/post/', [PostController::class, 'dump']);
Route::get('/post/create/', [PostController::class, 'create']);
Route::get('/post/update/', [PostController::class, 'update']);
Route::get('/post/delete/', [PostController::class, 'delete']);
Route::get('/post/restore/', [PostController::class, 'restore']);
Route::get('/post/first_or_create', [PostController::class, 'firstOrCreate']);
Route::get('/post/update_or_create', [PostController::class, 'updateOrCreate']);

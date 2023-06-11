<?php

use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => '\App\Http\Controllers\Post\\'], function () {
    Route::get('/posts/', 'IndexController')->name('posts');
    Route::get('/posts/{post_id}', 'ShowController')->name('postShow')->where('post_id', '^[0-9]+$');
    Route::get('/posts/{post_id}/edit/', 'EditController')->name('postEdit')->where('post_id', '^[0-9]+$');
    Route::post('/posts/', 'StoreController')->name('postStore');
    Route::patch('/posts/{post_id}', 'UpdateController')->name('postUpdate');
    Route::delete('/posts/{post_id}/delete', 'DestroyController')->name('postDelete');
    Route::get('/posts/create/', 'CreateController')->name('postCreate');
});

// How it could be realized another way
//Route::get('/posts/', [\App\Http\Controllers\Post\IndexController::class, '__invoke'])->name('posts');
//Route::get('/posts/{post_id}', [\App\Http\Controllers\Post\ShowController::class, '__invoke'])->name('postShow')->where('post_id', '^[0-9]+$');
//Route::get('/posts/{post_id}/edit/', [\App\Http\Controllers\Post\EditController::class, '__invoke'])->name('postEdit')->where('post_id', '^[0-9]+$');
//Route::post('/posts/', [\App\Http\Controllers\Post\StoreController::class, '__invoke'])->name('postStore');
//Route::patch('/posts/{post_id}', [\App\Http\Controllers\Post\UpdateController::class, '__invoke'])->name('postUpdate');
//Route::delete('/posts/{post_id}/delete', [\App\Http\Controllers\Post\DestroyController::class, '__invoke'])->name('postDelete');
//Route::get('/posts/create/', [\App\Http\Controllers\Post\CreateController::class, '__invoke'])->name('postCreate');


//Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

<?php

use Illuminate\Support\Facades\Route;


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
    return view('welcome');
});

//Route::get('hello-world', [\App\Http\Controllers\HelloWorldController::class,'index'\]);

Route::get('hello-world', '\\App\\Http\\Controllers\\HelloWorldController@index');
Route::resource('/users', \App\Http\Controllers\UserController::class);

Route::prefix('admin')->middleware('auth')->group(function(){

    Route::resource('posts', \App\Http\Controllers\Admin\PostController::class);
    Route::resource('categories', \App\Http\Controllers\Admin\CategoryController::class);
    Route::resource('profile', \App\Http\Controllers\Admin\ProfileController::class)->only(['index', 'update']);
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/home', 'HomeController@index')->name('home');

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

Route::get('/index', function () {
    return view('layouts.master');
});


Route::prefix('admin')->group(function () {
    Auth::routes();

//MAIN PAGE
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//POSTS
    Route::resource('posts', \App\Http\Controllers\web\PostController::class);

//COMMENTS
    Route::resource('comments', \App\Http\Controllers\web\CommentController::class);


});

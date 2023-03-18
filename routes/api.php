<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[\App\Http\Controllers\api\UserController::class,'login']);
Route::post('/register',[\App\Http\Controllers\api\UserController::class,'register']);
Route::post('/logout',[\App\Http\Controllers\api\UserController::class,'logout']);

Route::get('/posts',[\App\Http\Controllers\api\PostController::class,'index']);
Route::get('/posts/{id}',[\App\Http\Controllers\api\PostController::class,'show']);
Route::post('/posts/create',[\App\Http\Controllers\api\PostController::class, 'store']);
Route::post('/posts/update/{id}',[\App\Http\Controllers\api\PostController::class, 'update']);
Route::post('/posts/delete/{id}',[\App\Http\Controllers\api\PostController::class, 'destroy']);


Route::get('/comments',[\App\Http\Controllers\api\CommentController::class,'index']);
Route::get('/comments/{id}',[\App\Http\Controllers\api\CommentController::class,'show']);
Route::post('/comments/create',[\App\Http\Controllers\api\CommentController::class, 'store']);
Route::post('/comments/update/{id}',[\App\Http\Controllers\api\CommentController::class, 'update']);
Route::post('/comments/delete/{id}',[\App\Http\Controllers\api\CommentController::class, 'destroy']);


Route::get('/likes',[\App\Http\Controllers\api\LikeController::class,'index']);
Route::get('/likes/{id}',[\App\Http\Controllers\api\LikeController::class,'show']);
Route::post('/likes/create',[\App\Http\Controllers\api\LikeController::class, 'store']);
Route::post('/likes/delete/{id}',[\App\Http\Controllers\api\LikeController::class, 'destroy']);

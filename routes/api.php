<?php

use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/users', function () {
    return \App\Models\User::all();
});

Route::get('/users/{id}', function ($id) {
    return \App\Models\User::find($id);
});

Route::get('/posts', [PostController::class,'index']);
Route::get('/posts/{post}', [PostController::class,'show']);
Route::post('/posts', [PostController::class,'store'])->middleware('auth:sanctum');
Route::put('/posts/{post}', [PostController::class,'update'])->middleware('auth:sanctum');
Route::delete('/posts/{post}', [PostController::class,'destroy'])->middleware('auth:sanctum');

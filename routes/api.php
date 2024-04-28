<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuthController;

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

Route::post('login', [ApiAuthController::class,'login']);
Route::post('register', [ApiAuthController::class,'register']);
Route::post('logout', [ApiAuthController::class,'logout'])->middleware('auth:sanctum');


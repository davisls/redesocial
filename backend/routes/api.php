<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;

Route::get('/users', [UserController::class, 'index'])->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::post('/post/store', [PostController::class, 'store'])->middleware('auth:sanctum');
Route::get('/post/like/{id}', [PostController::class, 'like'])->middleware('auth:sanctum');
Route::get('/post/unlike/{id}', [PostController::class, 'unlike'])->middleware('auth:sanctum');
Route::get('/post/{id}', [PostController::class, 'search']);

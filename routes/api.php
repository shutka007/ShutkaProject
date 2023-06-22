<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Models\Product;
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

Route::post('categories', [CategoryController::class, 'store']);
Route::post('categories/(id)/restore', [CategoryController::class, 'restore']);
Route::patch('categries/{id}/update', [CategoryController::class, 'update']);
Route::delete('categories', [CategoryController::class, 'index']);
Route::get('categories', [CategoryController::class, 'index']);
Route::get('categories/{id}', [CategoryController::class, 'show']);

Route::post('products', [ProductController::class, 'store']);
Route::post('products/(id)/restore', [ProductController::class, 'restore']);
Route::patch('products/{id}/update', [ProductController::class, 'update']);
Route::delete('products', [ProductController::class, 'index']);
Route::get('products', [ProductController::class, 'index']);
Route::get('products/{id}', [ProductController::class, 'show']);

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('user', [AuthController::class, 'user']);
    Route::post('logout', [AuthController::class, 'logout']);
});
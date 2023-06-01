<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
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


/// ----- LOGIN ----- \\\
Route::post('auth/login', [LoginController::class, 'login']);
Route::post('auth/register', [LoginController::class, 'register']);


Route::group([ 'middleware' => 'auth:sanctum' ], function($router) {
    
    $router->get('books', [BookController::class, 'index']);
    $router->post('books/create', [BookController::class, 'create']);
    $router->post('books/update-readability', [BookController::class, 'updateReadability']);
});


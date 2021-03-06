<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookTypeController;
use App\Http\Controllers\StoreController;
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

Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::get('/login', function () {
    echo "LOGIN PAGE";
})->name('login');

Route::post('/bookTypes', [BookTypeController::class, 'store']);


// AuthController
Route::controller(AuthController::class)->group(function () {
    Route::get('/logout', 'logout')->middleware('auth:api');;
    Route::post('/register', 'register');
    Route::post('/login', 'login');
});


Route::middleware('auth:api')->group(function () {
    Route::apiResource('stores', StoreController::class);

    Route::apiResource('books', BookController::class);
});

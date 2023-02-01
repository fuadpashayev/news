<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FilterItemsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\UserController;
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

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::group(['prefix' => 'auth'], function (){
        Route::get('/me', [UserController::class, 'index']);
        Route::post('/me', [UserController::class, 'update']);
        Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    });

    Route::group(['prefix' => 'user', 'controller' => SettingsController::class], function (){
        Route::get('/settings', 'index');
        Route::post('/settings', 'update');
    });

    Route::get('/news', [NewsController::class, 'index']);
});

Route::group(['prefix' => 'auth'], function () {
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::get('/filter-items', [FilterItemsController::class, 'index']);

Route::get('/news', [NewsController::class, 'index']);

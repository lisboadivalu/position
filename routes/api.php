<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\UserController;
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

Route::group(['prefix' => 'auth'], function (){
    Route::post('login', [AuthController::class, 'login']);
    Route::get('me', [AuthController::class, 'me']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
});

Route::group(['middleware' => 'auth:api'], function(){
    Route::group([ 'prefix' => 'email'], function(){
        Route::post('create', [EmailController::class, 'store'])->withoutMiddleware('auth:api');
        Route::post('send', [EmailController::class, 'sendEmail']);
        Route::group(['prefix' => 'get'], function (){
            Route::get('all', [EmailController::class, 'getAll']);
        });
    });

    Route::group(['prefix' => 'user'], function() {
        Route::post('create', [UserController::class, 'store']);
    });
});




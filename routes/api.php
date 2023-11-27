<?php

use App\Http\Controllers\API\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/login', function(){
    return response()->json([
        'message'   => 'Unauthenticate',
    ]);
})->name('login');

Route::prefix('v1')->group(function(){
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);

    Route::middleware('auth:api')->group(function(){
        Route::get('/logout', [AuthController::class, 'logout']);
    });
});



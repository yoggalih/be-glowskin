<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\MachineLearningController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::middleware('auth:api')->group(function () {
    Route::post('/feedback', [FeedbackController::class, 'store']);
    Route::post('/predict', [MachineLearningController::class, 'predict']);
});
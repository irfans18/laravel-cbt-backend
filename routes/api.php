<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ExamController;
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


Route::post('/register', [AuthController::class, 'register']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::post('/create-exam', [ExamController::class, 'createExam'])->middleware('auth:sanctum');

Route::get('/get-exam-question', [ExamController::class, 'getExamQuestListByCategory'])->middleware('auth:sanctum');

Route::post('/answer', [ExamController::class, 'getAnswer'])->middleware('auth:sanctum');

// Route::apiResource('/contents', \App\Http\Controllers\Api\ContentController::class)->middleware('auth:sanctum');

// api for learning material
// Route::apiResource('/courseware', \App\Http\Controllers\Api\ContentController::class)->middleware('auth:sanctum');

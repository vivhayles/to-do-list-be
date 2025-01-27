<?php

use App\Http\Controllers\CategoryAPIController;
use App\Http\Controllers\TaskAPIController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/tasks', [TaskAPIController::class, 'index']);
Route::post('/tasks', [TaskAPIController::class, 'create']);
Route::get('/tasks/{id}', [TaskAPIController::class, 'find']);
Route::delete('/tasks/{id}', [TaskAPIController::class, 'delete']);
Route::put('/tasks/{id}', [TaskAPIController::class, 'update']);

Route::post('/categories', [CategoryAPIController::class, 'create']);

<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SyncJob;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware("auth:sanctum")->group(function () {
    Route::post('/sync', [SyncJob::class, "store"]);    
});

Route::get('/sync/{id}', [SyncJob::class, "index"]);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class,'login']);
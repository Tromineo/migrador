<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('/', [App\Http\Controllers\SyncJob::class, 'index']);
Route::post('/sync', [App\Http\Controllers\SyncJob::class, 'store']);
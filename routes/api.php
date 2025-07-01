<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TenderController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'user']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/tenders', [TenderController::class, 'store']);
});

Route::get('/tenders/{id}', [TenderController::class, 'show']);
Route::get('/tenders', [TenderController::class, 'index']);

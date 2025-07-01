<?php

use App\Http\Controllers\TenderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/tenders', [TenderController::class, 'store']);
Route::get('/tenders/{id}', [TenderController::class, 'show']);
Route::get('/tenders', [TenderController::class, 'index']);

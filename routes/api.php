<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TravelHistoryController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/travelhistory',[TravelHistoryController::class, 'index']);

Route::get('/travelhistory',[TravelHistoryController::class, 'index']);
Route::post('/travelhistory',[TravelHistoryController::class, 'store']);
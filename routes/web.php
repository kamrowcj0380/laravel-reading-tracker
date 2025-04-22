<?php

use App\Http\Controllers\ReadingDataController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\ReadingData;

//AAAAATODO - move this function
Route::get('/', [ReadingDataController::class, 'loadDashboard']);

Route::get("/registration", function() {
    return view('/registration');
});

Route::get("/upload-book-page", function() {
    return view("/upload-book-page");
});

//User auth routes
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout']);

//Book routes
Route::post('/add-reading', [ReadingDataController::class, 'addReading']);
Route::get('/update-reading/{readingData}', [ReadingDataController::class, 'showUpdateScreen']);
Route::put('/update-reading/{readingData}', [ReadingDataController::class, 'updateReading']);
Route::delete('/delete-reading/{readingData}', [ReadingDataController::class, 'deleteReading']);



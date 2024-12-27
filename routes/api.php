<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PengunjungController;

// Rute untuk operasi CRUD pada data pengunjung
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/pengunjung', [PengunjungController::class, 'index']);
    Route::post('/pengunjung', [PengunjungController::class, 'store']);
    Route::get('/pengunjung/{pengunjung}', [PengunjungController::class, 'show']);
    Route::put('/pengunjung/{pengunjung}', [PengunjungController::class, 'update']);
    Route::delete('/pengunjung/{pengunjung}', [PengunjungController::class, 'destroy']);
});
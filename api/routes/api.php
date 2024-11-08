<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; 


// Rota de exemplo para login
Route::post('/login', [AuthController::class, 'login']);

// Rotas protegidas (exemplo) - exigem autenticação via Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

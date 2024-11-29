<?php

use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\ProvidersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/providers', ProvidersController::class);
Route::post('/payment', PaymentsController::class)->middleware("auth:sanctum");
Route::get('/payments', [PaymentsController::class, 'fetchPaymentHistory'])->middleware("auth:sanctum");

require __DIR__.'/auth.php';

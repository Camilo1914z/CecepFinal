<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CarreraApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware(['auth'])->group(function () {
    
});

Route::middleware(['auth'])->group(function () {
});
Route::get('/carreras', [CarreraApiController::class, 'index'])->name('carreras.index');
Route::post('/carreras', [CarreraApiController::class, 'store'])->name('carreras.store');
Route::delete('/carreras/{carrera}', [CarreraApiController::class, 'destroy'])->name('carreras.destroy');
Route::put('/carreras/{carrera}', [CarreraApiController::class, 'update'])->name('carreras.update');





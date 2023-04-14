<?php

use App\Http\Controllers\Api\KampusController;
use App\Http\Controllers\Api\MahasiswaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('mahasiswa')->group(function(){
    Route::get('/', [MahasiswaController::class, 'index']);
    Route::get('/{id}', [MahasiswaController::class, 'show']);
    Route::post('/', [MahasiswaController::class, 'store']);
    Route::put('/{id}', [MahasiswaController::class, 'update']);
    Route::delete('/{id}', [MahasiswaController::class, 'destroy']);
});
Route::prefix('kampus')->group(function(){
    Route::get('/', [KampusController::class, 'index']);
    Route::get('/{id}', [KampusController::class, 'show']);
    Route::post('/', [KampusController::class, 'store']);
    Route::put('/{id}', [KampusController::class, 'update']);
    Route::delete('/{id}', [KampusController::class, 'destroy']);
});
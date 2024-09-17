<?php

use App\Http\Controllers\AccidentController;
use App\Http\Controllers\FineController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\VehicleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::get('fines', [FineController::class, 'index'])->name('api.v1.fine.index');

Route::get('people', [PersonController::class, 'index'])->name('api.v1.people.index');

Route::get('accident', [AccidentController::class, 'index'])->name('api.v1.people.index');

Route::get('vehicle', [VehicleController::class, 'index'])->name('api.v1.people.index');


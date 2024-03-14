<?php

use App\Http\Controllers\DateController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ShiftController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employee', [EmployeeController::class, 'index']);
Route::get('/date', [DateController::class, 'index']);
Route::get('/shift', [ShiftController::class, 'index']);
Route::post('/generate-normal', [DateController::class, 'generateNormal']);
Route::post('/generate-custom', [DateController::class, 'generateCustom']);

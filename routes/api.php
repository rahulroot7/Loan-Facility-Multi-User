<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiConteoller;

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

Route::controller(ApiConteoller::class)->group(function() {
    Route::post('/login', 'login');
});

// Protected routes of product and logout
Route::middleware('auth:sanctum')->group( function () {
    Route::get('search-vehicle', [ApiConteoller::class, 'searchVehicle']);
    Route::get('/view-vehicle/{vehicle}', [ApiConteoller::class, 'viewVehicle']);
    Route::post('/logout', [ApiConteoller::class, 'logout']);
});

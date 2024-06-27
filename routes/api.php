<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BuildingsController as APIBuildingsController;

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


Route::get('/buildings', [APIBuildingsController::class, 'index']);
Route::get('/buildings/{building}', [APIBuildingsController::class, 'show']);
Route::post('/transactions', [APIBuildingsController::class, 'storeTrans']);
Route::get('/transactions/{id}', [APIBuildingsController::class, 'showTrans']);
Route::post('/invoices', [APIBuildingsController::class, 'storeInvoice']);
Route::get('/invoices/{id}', [APIBuildingsController::class, 'showInvoice']);
Route::post('/buildingsFront', [APIBuildingsController::class, 'storeBuildingFront']);
Route::get('/building-categories', [APIBuildingsController::class, 'getCategories']);

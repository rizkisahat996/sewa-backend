<?php

use App\Http\Controllers\BuildingsController;
use App\Http\Controllers\InvoicesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutingController;
use App\Http\Controllers\TransactionsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

require __DIR__ . '/auth.php';

// Route::group(['prefix' => '/', 'middleware'=>'auth'], function () {
//     Route::get('', [RoutingController::class, 'index'])->name('root');
//     Route::get('/home', fn()=>view('index'))->name('home');
//     Route::get('{first}/{second}/{third}', [RoutingController::class, 'thirdLevel'])->name('third');
//     Route::get('{first}/{second}', [RoutingController::class, 'secondLevel'])->name('second');
//     Route::get('{any}', [RoutingController::class, 'root'])->name('any');
// });

Route::get('/', fn()=>view('index'))->name('home');
Route::resource('buildings', BuildingsController::class);
Route::resource('transactions', TransactionsController::class);
Route::resource('invoices', InvoicesController::class);
// Route::resource('buildings', 'BuildingsController');
// Route::resource('transactions', 'TransactionsController');
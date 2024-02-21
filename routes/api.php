<?php

use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Api\ProjectController;
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

Route::name('api.')->group(function(){
    Route::get('/portfolios', [ProjectController::class, 'index'])->name('portfolios.index');
    Route::get('/portfolios/search', [ProjectController::class, 'search'])->name('portfolios.search');
    Route::get('/portfolios/{portfolio}', [ProjectController::class, 'show'])->name('portfolios.show');
});
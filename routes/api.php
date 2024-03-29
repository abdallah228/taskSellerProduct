<?php

use App\Http\Controllers\importController;
use App\Http\Controllers\SellerProductsController;
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

Route::post('importSeller', [importController::class,'importSeller'])->name('import.seller');
Route::post('importProduct', [importController::class,'importProduct'])->name('import.product');




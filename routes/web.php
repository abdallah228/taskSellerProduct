<?php

use App\Http\Controllers\SellerProductsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['prefix'=>'sellerProducts'],function(){
    route::get('/all',[SellerProductsController::class,'index'])->name('sellerProduct.index');
    route::get('/create',[SellerProductsController::class,'create'])->name('sellerProduct.create');
    route::post('/store',[SellerProductsController::class,'store'])->name('sellerProduct.store');
    route::post('/delete',[SellerProductsController::class,'destroy'])->name('sellerProduct.delete');


});



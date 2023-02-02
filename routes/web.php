<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ProductController,CartController};
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



Route::get('products/{ProductType}/{CategoryId}',[ProductController::class,'Productfilter'])->where(['ProductType'=>'/\b(women|men)\b/','CategortId'=> '[0-9]+'])->name('filterproducts');
Route::resource('Products',ProductController::class);

//CART ROUTES
//Recieves an ajax request
Route::post('AddToCart',[CartController::class,'addToCart'])->name('AddToCart');
Route::get('ViewCart',[CartController::class,'viewCart'])->name('ViewCart');
Route::get('MakeOrder',[CartController::class,'makeOrder'])->name('MakeOrder');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{ProductController,CartController,CategoryController};
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
    return redirect(route('product.index'));
});
Route::get('/about',[ProductController::class,'about'])->name('about');
Route::get('/contact',[ProductController::class,'contact'])->name('contact');
Route::get('/blog',[ProductController::class,'blog'])->name('blog');
Route::get('/allproducts',[ProductController::class,'allproducts'])->name('all');
Route::post('/searchedproducts',[ProductController::class,'pricefilter'])->name('search');
Route::post('/placeorder',[ProductController::class,'placeorder'])->middleware('auth')->name('placeorder');
Route::post('/storereview',[ProductController::class,'storereview'])->middleware('auth')->name('storereview');


Route::get('/products/{type}', [ProductController::class,'typefilter'])->name('typefilter');
Route::get('/products/{category_id}/{type}', [ProductController::class,'filter'])->name('filter');

Route::resource('/product',ProductController::class);

Route::resource('/category', CategoryController::class);
Route::get('/cart',[ProductController::class,'cart'])->name('cart');
 Route::get('/category/{category_id}',[ProductController::class,'categoryfilter'])->name('categoryfilter');
//CART ROUTES
//Recieves an ajax request
Route::get('/addtocart/{id}',[ProductController::class,'addToCart'])->name('addtocart');

Route::post('MakeOrder',[CartController::class,'makeOrder'])->name('MakeOrder');

Route::delete('/cart/{id}', [App\Http\Controllers\ProductController::class, 'remove'])->name('removeitem');


Route::get('/checkout',[App\Http\Controllers\ProductController::class,'checkout'])->name('checkout');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [App\Http\Controllers\HomeController::class,'handleAdmin'])->name('admin.route')->middleware('admin');
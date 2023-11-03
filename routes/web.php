<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Product;
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

Route::controller(Home::class)->group(function(){
    Route::get('/','index');
});

Route::get('product/{id}',[Product::class,'product_single'])->name('product.single');

Route::get('add_to_cart',[Product::class,'add_to_cart'])->name('product.add_to_cart');
Route::get('cart',[Product::class,'cart_page'])->name('user.cart');

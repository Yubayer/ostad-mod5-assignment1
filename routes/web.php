<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Shopify\ProductController;
use App\Http\Controllers\Shopify\CollectionController;
use App\Http\Controllers\Shopify\ShopController;



Route::get('/', function () {
    return view('welcome');
})->middleware(['verify.shopify'])->name('home');

Route::prefix('shop')->controller(ShopController::class)->name('shop.')->middleware(['verify.shopify'])->group(function(){
    Route::get('index', 'index')->name('index');
});

Route::prefix('collection')->controller(CollectionController::class)->name('collection.')->middleware(['verify.shopify'])->group(function(){
    Route::get('index', 'index')->name('index');
    Route::get('create', 'create')->name('create');
    Route::post('store', 'store')->name('store');
});

Route::prefix('product')->controller(ProductController::class)->name('product.')->middleware(['verify.shopify'])->group(function(){
    Route::get('index', 'index')->name('index');
    Route::get('create', 'create')->name('create');
});

Route::get('proxy', [AppProxyController::class, 'index'])->middleware(['auth.proxy', 'verify.shopify']);

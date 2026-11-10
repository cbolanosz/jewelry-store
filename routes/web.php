<?php

/* Author: Cristian Bolaños */

use Illuminate\Support\Facades\Route;

// Public routes
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');
Route::get('/allied-products', 'App\Http\Controllers\AlliedProductController@index')->name('allied.index');
Route::get('/language/{locale}', 'App\Http\Controllers\LanguageController@switch')->name('language.switch');

// Cart routes
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');
Route::put('/cart/update/{id}', 'App\Http\Controllers\CartController@update')->name('cart.update');
Route::delete('/cart/remove/{id}', 'App\Http\Controllers\CartController@remove')->name('cart.remove');
Route::delete('/cart/clear', 'App\Http\Controllers\CartController@clear')->name('cart.clear');

// Authenticated user routes
Route::middleware('auth')->group(function () {
    // Checkout
    Route::get('/cart/checkout', 'App\Http\Controllers\CartController@checkout')->name('cart.checkout');
    Route::post('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name('cart.purchase');
    // Orders
    Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('order.index');
    Route::get('/orders/{id}', 'App\Http\Controllers\OrderController@show')->name('order.show');
    Route::put('/orders/{id}/cancel', 'App\Http\Controllers\OrderController@cancel')->name('order.cancel');
    Route::get('/orders/{id}/invoice', 'App\Http\Controllers\OrderController@invoice')->name('order.invoice');
});

// Admin routes
Route::middleware('admin')->group(function () {
    Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index');
    // Admin reports
    Route::get('/admin/reports/sales/{format}', 'App\Http\Controllers\Admin\AdminSalesReportController@download')
        ->whereIn('format', ['pdf', 'excel'])
        ->name('admin.report.sales');
    // Admin categories
    Route::get('/admin/categories', 'App\Http\Controllers\Admin\AdminCategoryController@index')->name('admin.category.index');
    Route::get('/admin/categories/create', 'App\Http\Controllers\Admin\AdminCategoryController@create')->name('admin.category.create');
    Route::post('/admin/categories/store', 'App\Http\Controllers\Admin\AdminCategoryController@store')->name('admin.category.store');
    Route::get('/admin/categories/{id}/edit', 'App\Http\Controllers\Admin\AdminCategoryController@edit')->name('admin.category.edit');
    Route::put('/admin/categories/{id}/update', 'App\Http\Controllers\Admin\AdminCategoryController@update')->name('admin.category.update');
    Route::put('/admin/categories/{id}/activate', 'App\Http\Controllers\Admin\AdminCategoryController@activate')->name('admin.category.activate');
    Route::put('/admin/categories/{id}/deactivate', 'App\Http\Controllers\Admin\AdminCategoryController@deactivate')->name('admin.category.deactivate');
    Route::delete('/admin/categories/{id}/delete', 'App\Http\Controllers\Admin\AdminCategoryController@delete')->name('admin.category.delete');
    // Admin products
    Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name('admin.product.index');
    Route::get('/admin/products/create', 'App\Http\Controllers\Admin\AdminProductController@create')->name('admin.product.create');
    Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name('admin.product.store');
    Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name('admin.product.edit');
    Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name('admin.product.update');
    Route::put('/admin/products/{id}/activate', 'App\Http\Controllers\Admin\AdminProductController@activate')->name('admin.product.activate');
    Route::put('/admin/products/{id}/deactivate', 'App\Http\Controllers\Admin\AdminProductController@deactivate')->name('admin.product.deactivate');
    Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name('admin.product.delete');
});

// Authentication routes
Auth::routes(['reset' => false]);

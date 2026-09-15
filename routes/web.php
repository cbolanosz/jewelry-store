<?php

/* Author: Cristian Bolaños */

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/products', 'App\Http\Controllers\ProductController@index')->name('product.index');
Route::get('/products/{id}', 'App\Http\Controllers\ProductController@show')->name('product.show');
Route::get('/cart', 'App\Http\Controllers\CartController@index')->name('cart.index');
Route::post('/cart/add/{id}', 'App\Http\Controllers\CartController@add')->name('cart.add');
Route::put('/cart/update/{id}', 'App\Http\Controllers\CartController@update')->name('cart.update');
Route::delete('/cart/remove/{id}', 'App\Http\Controllers\CartController@remove')->name('cart.remove');
Route::delete('/cart/clear', 'App\Http\Controllers\CartController@clear')->name('cart.clear');
Route::get('/cart/checkout', 'App\Http\Controllers\CartController@checkout')->name('cart.checkout')->middleware('auth');
Route::post('/cart/purchase', 'App\Http\Controllers\CartController@purchase')->name('cart.purchase')->middleware('auth');
Route::get('/orders', 'App\Http\Controllers\OrderController@index')->name('order.index')->middleware('auth');
Route::get('/orders/{id}', 'App\Http\Controllers\OrderController@show')->name('order.show')->middleware('auth');
Route::put('/orders/{id}/cancel', 'App\Http\Controllers\OrderController@cancel')->name('order.cancel')->middleware('auth');
Route::get('/orders/{id}/invoice', 'App\Http\Controllers\OrderController@invoice')->name('order.invoice')->middleware('auth');
Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index')->middleware('admin');
Route::get('/admin/categories', 'App\Http\Controllers\Admin\AdminCategoryController@index')->name('admin.category.index')->middleware('admin');
Route::get('/admin/categories/create', 'App\Http\Controllers\Admin\AdminCategoryController@create')->name('admin.category.create')->middleware('admin');
Route::post('/admin/categories/store', 'App\Http\Controllers\Admin\AdminCategoryController@store')->name('admin.category.store')->middleware('admin');
Route::get('/admin/categories/{id}/edit', 'App\Http\Controllers\Admin\AdminCategoryController@edit')->name('admin.category.edit')->middleware('admin');
Route::put('/admin/categories/{id}/update', 'App\Http\Controllers\Admin\AdminCategoryController@update')->name('admin.category.update')->middleware('admin');
Route::put('/admin/categories/{id}/activate', 'App\Http\Controllers\Admin\AdminCategoryController@activate')->name('admin.category.activate')->middleware('admin');
Route::put('/admin/categories/{id}/deactivate', 'App\Http\Controllers\Admin\AdminCategoryController@deactivate')->name('admin.category.deactivate')->middleware('admin');
Route::delete('/admin/categories/{id}/delete', 'App\Http\Controllers\Admin\AdminCategoryController@delete')->name('admin.category.delete')->middleware('admin');
Route::get('/admin/products', 'App\Http\Controllers\Admin\AdminProductController@index')->name('admin.product.index')->middleware('admin');
Route::get('/admin/products/create', 'App\Http\Controllers\Admin\AdminProductController@create')->name('admin.product.create')->middleware('admin');
Route::post('/admin/products/store', 'App\Http\Controllers\Admin\AdminProductController@store')->name('admin.product.store')->middleware('admin');
Route::get('/admin/products/{id}/edit', 'App\Http\Controllers\Admin\AdminProductController@edit')->name('admin.product.edit')->middleware('admin');
Route::put('/admin/products/{id}/update', 'App\Http\Controllers\Admin\AdminProductController@update')->name('admin.product.update')->middleware('admin');
Route::put('/admin/products/{id}/activate', 'App\Http\Controllers\Admin\AdminProductController@activate')->name('admin.product.activate')->middleware('admin');
Route::put('/admin/products/{id}/deactivate', 'App\Http\Controllers\Admin\AdminProductController@deactivate')->name('admin.product.deactivate')->middleware('admin');
Route::delete('/admin/products/{id}/delete', 'App\Http\Controllers\Admin\AdminProductController@delete')->name('admin.product.delete')->middleware('admin');
Auth::routes(['reset' => false]);

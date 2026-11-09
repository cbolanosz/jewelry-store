<?php

/* Author: Cristian Bolaños */

use Illuminate\Support\Facades\Route;

// Product routes
Route::get('/products', 'App\Http\Controllers\Api\ProductApiController@index')->name('api.product.index');

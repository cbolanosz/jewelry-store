<?php

/* Author: Cristian Bolaños */

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home.index');
Route::get('/admin', 'App\Http\Controllers\Admin\AdminHomeController@index')->name('admin.home.index')->middleware('admin');
Route::get('/admin/categories', 'App\Http\Controllers\Admin\AdminCategoryController@index')->name('admin.category.index')->middleware('admin');
Route::get('/admin/categories/create', 'App\Http\Controllers\Admin\AdminCategoryController@create')->name('admin.category.create')->middleware('admin');
Route::post('/admin/categories/store', 'App\Http\Controllers\Admin\AdminCategoryController@store')->name('admin.category.store')->middleware('admin');
Route::get('/admin/categories/{id}/edit', 'App\Http\Controllers\Admin\AdminCategoryController@edit')->name('admin.category.edit')->middleware('admin');
Route::put('/admin/categories/{id}/update', 'App\Http\Controllers\Admin\AdminCategoryController@update')->name('admin.category.update')->middleware('admin');
Route::put('/admin/categories/{id}/activate', 'App\Http\Controllers\Admin\AdminCategoryController@activate')->name('admin.category.activate')->middleware('admin');
Route::put('/admin/categories/{id}/deactivate', 'App\Http\Controllers\Admin\AdminCategoryController@deactivate')->name('admin.category.deactivate')->middleware('admin');
Route::delete('/admin/categories/{id}/delete', 'App\Http\Controllers\Admin\AdminCategoryController@delete')->name('admin.category.delete')->middleware('admin');
Auth::routes(['reset' => false]);

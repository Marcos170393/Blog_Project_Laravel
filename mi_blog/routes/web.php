<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post', [App\Http\Controllers\HomeController::class, 'post'])->name('post');
Route::get('/home',function(){
    return view('home');
})->middleware('auth');

Route::get('/admin/categories','App\Http\Controllers\Admin\CategoriesController@index')->name('admin.categories')->middleware('auth');
Route::post('/admin/categories/store','App\Http\Controllers\Admin\CategoriesController@store')->name('admin.categories.store')->middleware('auth');

Auth::routes();


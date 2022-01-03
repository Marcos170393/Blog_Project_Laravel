<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post', [App\Http\Controllers\HomeController::class, 'post'])->name('post');
Route::get('/home',function(){
    return view('home');
})->middleware('auth');

// CRUD CATERGORIES //
Route::get('/admin/categories','App\Http\Controllers\Admin\CategoriesController@index')->name('admin.categories')->middleware('auth');
Route::post('/admin/categories/store','App\Http\Controllers\Admin\CategoriesController@store')->name('admin.categories.store')->middleware('auth');
Route::post('/admin/categories/{categoryid}/update','App\Http\Controllers\Admin\CategoriesController@update')->name('admin.categories.update')->middleware('auth');
Route::delete('/admin/categories/{categoryid}/delete','App\Http\Controllers\Admin\CategoriesController@delete')->name('admin.categories.delete')->middleware('auth');

// CRUD POSTS //
Route::get('/admin/posts','App\Http\Controllers\Admin\PostsController@index')->name('admin.posts')->middleware('auth');
Route::post('/admin/posts/store','App\Http\Controllers\Admin\PostsController@store')->name('admin.posts.store')->middleware('auth');
Route::post('/admin/posts/{postid}/update','App\Http\Controllers\Admin\PostsController@update')->name('admin.posts.update')->middleware('auth');
Route::delete('/admin/posts/{postid}/delete','App\Http\Controllers\Admin\PostsController@delete')->name('admin.posts.delete')->middleware('auth');

Auth::routes();


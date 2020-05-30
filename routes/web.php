<?php

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

Auth::routes();
//Route::get('/', 'ProductController@index');
Route::get('logout', 'Auth\LoginController@logout');
Route::get('/products/search', 'ProductController@search');
Route::get('/products/{id}/edit', 'ProductController@edit');
Route::patch('/products/{id}', 'ProductController@update');
Route::post('/products/create', 'ProductController@store');
Route::get('/products/category/{id}', 'ProductController@categories');
Route::resource('products', 'ProductController');

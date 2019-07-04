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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', "\App\Http\Controllers\HomeController@index");

Route::prefix('admin')->group(function() {
	Route::get("home", "\App\Http\Controllers\Admin\HomeController@index");

	Route::prefix("product")->group(function() {
		Route::get('/', '\App\Http\Controllers\Admin\ProductController@index')->name('product.index');

		Route::get("/create", '\App\Http\Controllers\Admin\ProductController@create')->name('product.create');
		Route::post('', '\App\Http\Controllers\Admin\ProductController@store')->name('product.store');

		Route::get('/{product}/edit', '\App\Http\Controllers\Admin\ProductController@edit')->name('product.edit');

		Route::put('/{product}', '\App\Http\Controllers\Admin\ProductController@update')->name('product.update');

		Route::delete('/{product}', '\App\Http\Controllers\Admin\ProductController@destroy')->name('product.delete');
	});
});
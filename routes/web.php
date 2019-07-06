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

	Route::prefix("producer")->group(function() {
		Route::get('/', '\App\Http\Controllers\Admin\ProducerController@index')->name('producer.index');

		Route::get("/create", '\App\Http\Controllers\Admin\ProducerController@create')->name('producer.create');
		Route::post('', '\App\Http\Controllers\Admin\ProducerController@store')->name('producer.store');

		Route::get('/{producer}/edit', '\App\Http\Controllers\Admin\ProducerController@edit')->name('producer.edit');

		Route::put('/{producer}', '\App\Http\Controllers\Admin\ProducerController@update')->name('producer.update');

		Route::delete('/{producer}', '\App\Http\Controllers\Admin\ProducerController@destroy')->name('producer.delete');
	});

	Route::prefix("producttype")->group(function() {
		Route::get('/', '\App\Http\Controllers\Admin\ProductTypeController@index')->name('producttype.index');

		Route::get("/create", '\App\Http\Controllers\Admin\ProductTypeController@create')->name('producttype.create');
		Route::post('', '\App\Http\Controllers\Admin\ProductTypeController@store')->name('producttype.store');

		Route::get('/{producttype}/edit', '\App\Http\Controllers\Admin\ProductTypeController@edit')->name('producttype.edit');

		Route::put('/{producttype}', '\App\Http\Controllers\Admin\ProductTypeController@update')->name('producttype.update');

		Route::delete('/{producttype}', '\App\Http\Controllers\Admin\ProductTypeController@destroy')->name('producttype.delete');
	});
});
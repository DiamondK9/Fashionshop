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

//qui định chuỗi sau detail là slug. Khi vào trang web detail, dựa theo vị trí đường link mình vừa nhấn, tên của nó sẽ là slug và khi chuyển sang trang detail, detail của slug đó sẽ được gọi ra.
Route::get('/detail/{slug}',"\App\Http\Controllers\HomeController@detail")->name('home.detail');

Route::get("add_order", "\App\Http\Controllers\HomeController@add_order")->name('add_order');

//Khu vực Cart cho SP
	Route::get('/cart/list', "\App\Http\Controllers\CartController@list_cart")->name('cart.list');//edit 22/07/19
	Route::post("cart/add", "\App\Http\Controllers\CartController@add_cart");
	Route::post('cart/update', "\App\Http\Controllers\CartController@update_cart");
	Route::post('cart/remove', "\App\Http\Controllers\CartController@remove_cart");
//Hết khu vực Cart cho SP





// Trang Quản Trị
Route::prefix('admin')->group(function() {
	Route::middleware(['admin.guest'])->group(function() {
		// Login Routing
		Route::get('login', '\App\Http\Controllers\Admin\Auth\LoginController@showLoginForm');	
		Route::post('login', '\App\Http\Controllers\Admin\Auth\LoginController@login');
		//End of Login Routing
	});

	Route::middleware(['admin', 'auth:admin'])->group(function() 
	{

		Route::get("home", "\App\Http\Controllers\Admin\HomeController@index")->name('home.index');

//Danh mục Sản Phẩm
		Route::prefix("product")->group(function() {	
			Route::get('/', '\App\Http\Controllers\Admin\ProductController@index')->name('product.index');
			Route::get("/create", '\App\Http\Controllers\Admin\ProductController@create')->name('product.create');
			Route::post('', '\App\Http\Controllers\Admin\ProductController@store')->name('product.store');

			Route::get('/{product}/edit', '\App\Http\Controllers\Admin\ProductController@edit')->name('product.edit');

			Route::put('/{product}', '\App\Http\Controllers\Admin\ProductController@update')->name('product.update');

			Route::delete('/{product}', '\App\Http\Controllers\Admin\ProductController@destroy')->name('product.delete');
		});
//Danh mục thương hiệu
		Route::prefix("producer")->group(function() {
			Route::get('/', '\App\Http\Controllers\Admin\ProducerController@index')->name('producer.index');

			Route::get("/create", '\App\Http\Controllers\Admin\ProducerController@create')->name('producer.create');
			Route::post('', '\App\Http\Controllers\Admin\ProducerController@store')->name('producer.store');

			Route::get('/{producer}/edit', '\App\Http\Controllers\Admin\ProducerController@edit')->name('producer.edit');

			Route::put('/{producer}', '\App\Http\Controllers\Admin\ProducerController@update')->name('producer.update');

			Route::delete('/{producer}', '\App\Http\Controllers\Admin\ProducerController@destroy')->name('producer.delete');
		});
//Danh mục Loại Sản phẩm
		Route::prefix("product_type")->group(function() {
			Route::get('/', '\App\Http\Controllers\Admin\ProductTypeController@index')->name('product_type.index');

			Route::get("/create", '\App\Http\Controllers\Admin\ProductTypeController@create')->name('product_type.create');
			Route::post('', '\App\Http\Controllers\Admin\ProductTypeController@store')->name('product_type.store');

			Route::get('/{product_type}/edit', '\App\Http\Controllers\Admin\ProductTypeController@edit')->name('product_type.edit');

			Route::put('/{product_type}', '\App\Http\Controllers\Admin\ProductTypeController@update')->name('product_type.update');

			Route::delete('/{product_type}', '\App\Http\Controllers\Admin\ProductTypeController@destroy')->name('product_type.delete');
		});
//Danh mục Đơn hàng
		Route::prefix('order')->group(function(){
            Route::get('/', "\App\Http\Controllers\Admin\OrderController@index")->name('order.index');
            Route::get('/{orders}/edit', "\App\Http\Controllers\Admin\OrderController@edit")->name('order.edit');
            Route::put('/{orders}', "\App\Http\Controllers\Admin\OrderController@update")->name('order.update');
            Route::delete('/{orders}', "\App\Http\Controllers\Admin\OrderController@destroy")->name('order.delete');
        });
	});
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

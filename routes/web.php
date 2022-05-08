<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes(['verify' => true]);

Route::get('/', 'App\Http\Controllers\HomePageController@index')->middleware(['auth','verified']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/boutique' , 'App\Http\Controllers\HomePageController');

Route::resource('admin' , 'App\Http\Controllers\PanelControlController')->middleware('auth');

Route::resource('products' , 'App\Http\Controllers\ProductsController');

Route::resource('categories' , 'App\Http\Controllers\CategoriesController');

Route::get('products_delete/{id}','App\Http\Controllers\ProductsController@destroy')->name('products_delete');

Route::get('/products_edit/{id}','App\Http\Controllers\ProductsController@edit')->name('products_edit');

Route::post('products_update','App\Http\Controllers\ProductsController@update')->name('products_update');

Route::get('categories_delete/{id}','App\Http\Controllers\CategoriesController@destroy')->name('categories_delete');

Route::get('/categories_edit/{id}','App\Http\Controllers\CategoriesController@edit')->name('categories_edit');

Route::post('categories_update','App\Http\Controllers\CategoriesController@update')->name('categories_update');

Route::get('boutique_cats/{id}','App\Http\Controllers\HomePageController@show')->name('boutique_cats');

Route::get('/product_details/{id}','App\Http\Controllers\HomePageController@show_details')->name('product_details');

Route::get('show_cart','App\Http\Controllers\ProductsController@show_cart')->name('add.show');

Route::get('addToCart/{products}','App\Http\Controllers\ProductsController@addToCart')->name('add.cart');

Route::put('updateCart/{products}','App\Http\Controllers\ProductsController@update_cart')->name('product.update');

Route::delete('deletecartproduct/{products}','App\Http\Controllers\ProductsController@cartproduct_delete')->name('cartproduct.remove');

Route::get('checkout/{amount}','App\Http\Controllers\ProductsController@checkout')->name('checkout.cart')->middleware('auth');

Route::post('charge','App\Http\Controllers\ProductsController@charge')->name('cart.charge');

//comments
Route::post('/comments/{id}', 'App\Http\Controllers\CommentsController@store')->name('comments.store');

Route::get('shop','App\Http\Controllers\ProductsController@shop')->name('shop');

Route::post('like','App\Http\Controllers\HomePageController@like')->name('like');

Route::post('dislike','App\Http\Controllers\HomePageController@dislike')->name('dislike');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles','App\Http\Controllers\RoleController');
    Route::resource('users','App\Http\Controllers\UserController');
    // Route::resource('products','ProductController');
    });

Route::get('sold_products' ,'App\Http\Controllers\ProductsController@sold_products');

Route::get('not_sold_products' ,'App\Http\Controllers\ProductsController@not_sold_products');

Route::post('status_edit', 'App\Http\Controllers\ProductsController@status_edit')->name('products.status');

Route::get('MarkAsRead_all','App\Http\Controllers\ProductsController@MarkAsRead_all')->name('MarkAsRead_all');

Route::get('contactus','App\Http\Controllers\HomePageController@contactus')->name('contactus');

Route::post('docontact','App\Http\Controllers\HomePageController@dosend')->name('docontact');

Route::post('products_discount/{id}' , 'App\Http\Controllers\ProductsController@discounts')->name('products.discount');

Route::get('/{page}', 'App\Http\Controllers\AdminController@index');

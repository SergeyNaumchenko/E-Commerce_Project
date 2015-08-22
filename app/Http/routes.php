<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

function method($url) {
    if($url == Request::url()) return 'active';
}

Route::resource('store/cart/checkout', 'CheckOutController@index');

Route::get('/', 'StoreController@index');
Route::get('store/category/{id}', 'StoreController@getCategory');
Route::get('store/search', 'StoreController@search');
Route::get('store/cart/clearCart', 'CartController@clearCart');
Route::get('admin/create_product', 'ProductsController@getCreateView');
Route::get('store/cart/saved_carts/destroy_item/{id}', 'SavedCartsController@destroy_item');
Route::get('store/cart/saved_carts/addAllToCart/{id}', 'SavedCartsController@addAllToCart');

Route::resource('store/cart/saved_carts', 'SavedCartsController');
Route::resource('store/cart', 'CartController');
Route::resource('admin/categories', 'CategoriesController');
Route::resource('admin', 'ProductsController');
Route::resource('store', 'StoreController');
Route::resource('admin/profile', 'UsersController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);




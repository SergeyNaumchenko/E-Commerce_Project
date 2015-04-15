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

Route::get('/', 'WelcomeController@index');
Route::get('home', 'HomeController@index');
Route::get('store/category/{id}', 'StoreController@getCategory');
Route::get('store/search', 'StoreController@search');

Route::resource('store/cart', 'CartController');
Route::resource('admin/categories', 'CategoriesController');
Route::resource('admin/products', 'ProductsController');
Route::resource('store', 'StoreController');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


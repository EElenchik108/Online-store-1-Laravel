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

Route::get('/', 'MainController@index');
Route::get('contacts', 'MainController@contacts');
Route::get('/category/{slug}', 'MainController@category');
Route::get('/product/{slug}', 'MainController@product');
Route::post('/product/{slug}', 'MainController@getReview');

Route::post('/cart/add', 'CartController@add');
Route::post('/cart/remove', 'CartController@remove');
Route::post('/cart/clear', 'CartController@clear');
Route::get('/checkout', 'CartController@checkout');
Route::get('/end-checkout', 'CartController@endCheckout');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group([
	'prefix' 		=> '/admin',
	'namespace' 	=> 'Admin',
	'middleware' 	=> ['auth', 'admin']
], function(){
		Route::get('/', 'AdminController@index');
		Route::resource('/category', 'CategoryController');
		Route::resource('/product', 'ProductController');
	});
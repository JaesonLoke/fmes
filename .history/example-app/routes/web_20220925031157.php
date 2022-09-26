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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();

Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home');



Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::put('profile/password', ['as' => 'profile.password', 
									'uses' => 'App\Http\Controllers\ProfileController@password']);
	Route::get('edit', function () {return view('users\index');})->name('user.index');

	Route::get('production', function () {return view('pages.production.production');})->name('production'); 
	Route::get('table-list', function () {return view('pages.tables');})->name('table');


	Route::get('inventory', function () {return view('pages.inventory');})->name('inventory');
	Route::get('reporting', function () {return view('pages.reporting');})->name('reporting');
	
	//product
	Route::get('product', 'App\Http\Controllers\ProductRecController@index')->name('product');
	Route::get('createproduct', 'App\Http\Controllers\ProductRecController@create')->name('product.create');
	Route::get('viewproduct/{product}', 'App\Http\Controllers\ProductRecController@show')->name('product.show');
	Route::get('editproduct/{product}', 'App\Http\Controllers\ProductRecController@edit')->name('product.edit');
	Route::put('editproduct/{product}', 'App\Http\Controllers\ProductRecController@update')->name('product.update');
	Route::delete('deleteproduct/{product}', 'App\Http\Controllers\ProductRecController@destroy')->name('product.destroy');
	Route::post('storeproduct', 'App\Http\Controllers\ProductRecController@store')->name('product.store');

	//production
	Route::get('production', 'App\Http\Controllers\WorkRecController@index')->name('production');
	Route::get('creatework', 'App\Http\Controllers\WorkRecController@create')->name('production.create');
	Route::get('viewwork/{production}', 'App\Http\Controllers\WorkRecController@show')->name('production.show');
	Route::get('editwork/{production}', 'App\Http\Controllers\WorkRecController@edit')->name('production.edit');
	Route::put('editwork/{production}', 'App\Http\Controllers\WorkRecController@update')->name('production.update');
	Route::delete('/{production}', 'App\Http\Controllers\WorkRecController@destroy')->name('production.destroy');
	Route::post('storework', 'App\Http\Controllers\WorkRecController@store')->name('production.store');

	//production
	Route::get('production', 'App\Http\Controllers\WorkRecController@index')->name('production');
	Route::get('creatework', 'App\Http\Controllers\WorkRecController@create')->name('production.create');
	Route::get('viewwork/{production}', 'App\Http\Controllers\WorkRecController@show')->name('production.show');
	Route::get('editwork/{production}', 'App\Http\Controllers\WorkRecController@edit')->name('production.edit');
	Route::put('editwork/{production}', 'App\Http\Controllers\WorkRecController@update')->name('production.update');
	Route::delete('/{production}', 'App\Http\Controllers\WorkRecController@destroy')->name('production.destroy');
	Route::post('storework', 'App\Http\Controllers\WorkRecController@store')->name('production.store');

	Route::get('operator.index', function () {return view('operatorwelcome');})->name('operator.index');
	Route::get('operator.production', function () {return view('pages.operator.operatorp');})->name('operator.production');
	Route::get('operator.production', function () {return view('pages.operator.operatorw');})->name('operator.production');
	Route::get('operator.product', function () {return view('pages.operator.operatorpr');})->name('operator.product');

});


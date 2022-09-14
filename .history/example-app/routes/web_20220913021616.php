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
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade'); 
	Route::get('map', function () {return view('pages.maps');})->name('map');
	Route::get('icons', function () {return view('pages.icons');})->name('icons'); 
	Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::get('workorder', function () {return view('pages.workorder');})->name('workorder');
	Route::get('product', 'App\Http\Controllers\ProductRecController@index')->name('product');
	Route::get('createproduct', 'App\Http\Controllers\ProductRecController@create')->name('product.create');
	Route::get('viewproduct/{product}', 'App\Http\Controllers\ProductRecController@show')->name('product.show');
	Route::get('editproduct', 'App\Http\Controllers\ProductRecController@edit')->name('product.edit');
	Route::get('deleteproduct', 'App\Http\Controllers\ProductRecController@destroy')->name('product.destroy');
	Route::post('storeproduct', 'App\Http\Controllers\ProductRecController@store')->name('product.store');
	Route::put('profile/password', ['as' => 'profile.password', 
									'uses' => 'App\Http\Controllers\ProfileController@password']);
	


});


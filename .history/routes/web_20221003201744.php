<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChartJSController;


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

	Route::get('inventory', 'App\Http\Controllers\InventoryController@index')->name('inventory');
	Route::get('createinventory', 'App\Http\Controllers\InventoryController@create')->name('inventory.create');
	Route::post('storeinventory', 'App\Http\Controllers\InventoryController@store')->name('inventory.store');
	Route::get('fetch/{id}', 'App\Http\Controllers\InventoryController@fetch_image')->name('inventory.fetch');
	Route::get('editinventory/{inventory}', 'App\Http\Controllers\InventoryController@edit')->name('inventory.edit');
	Route::put('editproduct/{product}', 'App\Http\Controllers\ProductRecController@update')->name('product.update');



	Route::get('reporting', 'App\Http\Controllers\ReportController@index')->name('reporting');
	Route::get('viewreporting/{report}', 'App\Http\Controllers\ReportController@show')->name('view.report');
	
	//product
	Route::get('product', 'App\Http\Controllers\ProductRecController@index')->name('product');
	Route::get('createproduct', 'App\Http\Controllers\ProductRecController@create')->name('product.create');
	Route::get('viewproduct/{product}', 'App\Http\Controllers\ProductRecController@show')->name('product.show');
	Route::get('editproduct/{product}', 'App\Http\Controllers\ProductRecController@edit')->name('product.edit');
	Route::put('editproduct/{product}', 'App\Http\Controllers\ProductRecController@update')->name('product.update');
	Route::delete('deleteproduct/{product}', 'App\Http\Controllers\ProductRecController@destroy')->name('product.destroy');
	Route::post('storeproduct', 'App\Http\Controllers\ProductRecController@store')->name('product.store');

	//workorder
	Route::get('workorder', 'App\Http\Controllers\WorkRecController@index')->name('workorder');
	Route::get('creatework', 'App\Http\Controllers\WorkRecController@create')->name('work.create');
	Route::get('viewwork/{work}', 'App\Http\Controllers\WorkRecController@show')->name('work.show');
	Route::get('editwork/{work}', 'App\Http\Controllers\WorkRecController@edit')->name('work.edit');
	Route::put('editwork/{work}', 'App\Http\Controllers\WorkRecController@update')->name('work.update');
	Route::delete('/{work}', 'App\Http\Controllers\WorkRecController@destroy')->name('work.destroy');
	Route::post('storework', 'App\Http\Controllers\WorkRecController@store')->name('work.store');

	//production
	Route::get('production', 'App\Http\Controllers\ProductionRecController@index')->name('production');
	Route::get('createproduction', 'App\Http\Controllers\ProductionRecController@create')->name('production.create');
	Route::get('viewproduction/{production}', 'App\Http\Controllers\ProductionRecController@show')->name('production.show');
	Route::get('editproduction/{production}', 'App\Http\Controllers\ProductionRecController@edit')->name('production.edit');
	Route::put('editproduction/{production}', 'App\Http\Controllers\ProductionRecController@update')->name('production.update');
	Route::delete('destroyproduction/{production}', 'App\Http\Controllers\ProductionRecController@destroy')->name('production.destroy');
	Route::post('storeproduction', 'App\Http\Controllers\ProductionRecController@store')->name('production.store');

	//operator view
	Route::get('operator.index', function () {return view('operatorwelcome');})->name('operator.index');
	
	//operator production
	Route::get('operator.production', 'App\Http\Controllers\OProductionRecController@index')->name('operator.production');
	
	//operator workorder
	Route::get('operator.workorder', 'App\Http\Controllers\OWorkRecController@index')->name('operator.workorder');
	Route::delete('operator.stopwork/{work}', 'App\Http\Controllers\OWorkRecController@stop')->name('operator.stopwork');
	Route::get('operator.startwork/{work}', 'App\Http\Controllers\OWorkRecController@start')->name('operator.startwork');

	//operator product
	Route::get('operator.product', 'App\Http\Controllers\OProductRecController@index')->name('operator.product');
	Route::get('operator.startproduct/{product}', 'App\Http\Controllers\OProductRecController@start')->name('operator.startproduct');
	Route::delete('operator.stopproduct/{product}', 'App\Http\Controllers\OProductRecController@stop')->name('operator.stopproduct');
	Route::post('operator.endproduct/{product}', 'App\Http\Controllers\OProductRecController@end')->name('operator.endproduct');


});


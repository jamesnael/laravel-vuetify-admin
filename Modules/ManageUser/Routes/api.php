<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('backend')->group(function() {
	Route::prefix('master-data')->namespace('Api')->group(function() {
	    Route::get('user/table', 'UserController@table')->name('user.table');
		Route::get('user/{user}/data', 'UserController@data')->name('user.data');
		Route::get('user/{user}/logout', 'UserController@logoutUser')->name('user.approve');
		Route::apiResource('user', 'UserController')->only([
		    'store', 'update', 'destroy'
		]);

		Route::get('jabatan/table', 'JabatanController@table')->name('jabatan.table');
		Route::get('jabatan/{jabatan}/data', 'JabatanController@data')->name('jabatan.data');
		Route::apiResource('jabatan', 'JabatanController')->only([
		    'store', 'update', 'destroy'
		]);

	});

	Route::get('riwayat/table', 'Api\RiwayatController@table')->name('riwayat.table');
	Route::get('riwayat/{riwayat}/data', 'Api\RiwayatController@data')->name('riwayat.data');

	Route::prefix('change-password')->namespace('Api')->group(function() {
		Route::put('update/{user}', 'UserController@changePassword')->name('change-password.update');
	});
});
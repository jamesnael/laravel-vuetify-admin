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

Route::middleware('auth')->group(function() {
	require __DIR__.'/api.php';
});

Route::get('/backend', 'DashboardController@index')->name('dashboard.index');
Route::get('/backend/dashboard/data', 'DashboardController@dashboardData')->name('dashboard.data');

Route::group(['namespace' => 'Province', 'prefix' => 'provinces', 'as' => 'provinces.'], function() {
	Route::get('/', 'ProvinceController@provinceList')->name('index');
});
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

Route::prefix('backend')->group(function() {
	Route::prefix('master-data')->namespace('View')->group(function() {
	    Route::resource('user', 'UserController')->only([
		    'index', 'create', 'edit'
		]);

		Route::resource('jabatan', 'JabatanController')->only([
		    'index', 'create', 'edit'
		]);
	
		Route::get('user/{user}/view', 'UserController@view')->name('user.view');
	});

	Route::resource('riwayat', 'View\RiwayatController')->only([
	    'index', 'edit'
	]);
	Route::get('riwayat/{riwayat}/detail', 'View\RiwayatController@detail')->name('riwayat.detail');

	Route::prefix('change-password')->namespace('View')->group(function() {
		Route::get('form', 'UserController@changePasswordForm')->name('change-password.form');
	});
});

Route::get('', 'Auth\Backend\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\Backend\LoginController@login')->name('post-login');
Route::prefix('auth')->namespace('Auth')->group(function() {
	Route::namespace('Backend')->group(function() {
		Route::match(['GET', 'POST'], 'logout', 'LoginController@logout')->name('logout');
		
		Route::prefix('password')->group(function() {
			Route::get('request', 'ForgotPasswordController@showForgotPasswordForm')->name('password.request');
			Route::post('email', 'ForgotPasswordController@forgotPassword')->name('password.email');
			
			Route::post('reset', 'ResetPasswordController@resetPassword')->name('password.update');
			Route::get('reset/{token}', 'ResetPasswordController@showResetPasswordForm')->name('password.reset');
		});
	});
});
	
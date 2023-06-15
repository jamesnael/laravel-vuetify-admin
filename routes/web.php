<?php

use Illuminate\Support\Facades\Route;
use Carbon\Carbon as Carbon;

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

Route::get('logout/{email}', function($email) {
    \Modules\ManageUser\Entities\User::where('email', $email)->orWhere('username', $email)
    ->update([
      'api_token' => null,
      'token_lifetime' => null
    ]);

    echo "DONE";
});
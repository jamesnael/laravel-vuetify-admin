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

/*use Modules\MasterData\Entities\Proyek;
use Modules\ManageUser\Entities\User;
use Modules\MasterData\Entities\Unit;
use Modules\JamKerja\Http\Controllers\Helper\UpahHelper;
Route::get('pdf', function(\Illuminate\Http\Request $request) {
  $proyek = Proyek::where('slug', 'podomoro-park-bandung')->firstOrFail();
  $proyek->jumlah_operator = User::with('latest_operator_proyek.proyek', 'jabatan')
  ->whereHas('jabatan', function($query){
      $query->where('nama_jabatan', 'Operator');
  })->whereHas('latest_operator_proyek.proyek', function($query) use ($proyek){
      $query->where('id', $proyek->id);
  })->count();
  $proyek->jumlah_driver = User::with('latest_operator_proyek.proyek', 'jabatan')
  ->whereHas('jabatan', function($query){
      $query->where('nama_jabatan', 'Driver');
  })->whereHas('latest_operator_proyek.proyek', function($query) use ($proyek){
      $query->where('id', $proyek->id);
  })->count();
  $proyek->jumlah_unit = Unit::with('latest_operator_proyek.proyek')
  ->whereHas('latest_operator_proyek.proyek', function($query) use ($proyek){
      $query->where('id', $proyek->id);
  })->count();
  $proyek->unit_operator = Unit::with('latest_operator_proyek.proyek', 'latest_operator_proyek.operator.jabatan')
  ->whereHas('latest_operator_proyek.operator.jabatan', function($query){
      $query->where('nama_jabatan', 'Operator');
  })->whereHas('latest_operator_proyek.proyek', function($query) use ($proyek){
      $query->where('id', $proyek->id);
  })->count();
  $proyek->unit_driver = Unit::with('latest_operator_proyek.proyek', 'latest_operator_proyek.operator.jabatan')
  ->whereHas('latest_operator_proyek.operator.jabatan', function($query){
      $query->where('nama_jabatan', 'Driver');
  })->whereHas('latest_operator_proyek.proyek', function($query) use ($proyek){
      $query->where('id', $proyek->id);
  })->count();
  $proyek->unit_backup = Unit::with('latest_operator_proyek.proyek', 'latest_operator_proyek.operator.jabatan')
  ->whereDoesntHave('latest_operator_proyek.operator')->whereHas('latest_operator_proyek.proyek', function($query) use ($proyek){
      $query->where('id', $proyek->id);
  })->count();

  $request->merge([
    'start_date' => '2021-08-01',
    'end_date' => '2021-08-31',
  ]);
  
  $start_date = $request->input('start_date');
  $end_date = $request->input('end_date');
  $output = [];
  $range = collect(date_range($request->input('start_date'), $request->input('end_date')))->chunk(7);

  foreach ($range as $dateRange) {
    $request->merge([
      'start_date' => collect($dateRange)->first(),
      'end_date' => collect($dateRange)->last(),
    ]);
    $upah = new UpahHelper;
    $output[] = [
      'date' => $dateRange,
      'data' => collect($upah->table($proyek, true, '>', '0', '1', $request)->items())->chunk(5)
    ];
  }

  return \PDF::loadView('jamkerja::docs.pembayaran_upah.print', ['proyek' => $proyek->load('perusahaan'), 'start_date' => $start_date, 'end_date' => $end_date, 'data' => $output])->setPaper('a4', 'landscape')->setWarnings(false)->stream();
});*/

Route::get('logout/{email}', function($email) {
    \Modules\ManageUser\Entities\User::where('email', $email)->orWhere('username', $email)
    ->update([
      'api_token' => null,
      'token_lifetime' => null
    ]);

    echo "DONE";
});
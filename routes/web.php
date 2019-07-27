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

Route::get('/', function () {
    return view('auth/login');
});
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Route::get('check',function(){
//   switch (Auth::user()->roles_id) {
//     case '1':
//       return redirect('schedule?login=true');
//       break;
//     case '2':
//       return redirect('');
//       break;
//     case '3':
//       return redirect('');
//       break;
//     case '4':
//       return redirect('');
//       break;

//     default:
//       # code...
//       break;
//   }
// });


// Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::group(['middleware'=>'role:1'],function(){
  // Route::get('/homeuser','User\HomeUserController@index')->name('homeuser');
Route::group(['middleware'=>'auth'],function(){   
  Route::resources([
    "schedule"=>"Owner\ScheduleController",
    "asal_tujuan"=>"Owner\AsalTujuanController",
    "order_shuttle"=>"Owner\OrderShuttleController",
    "user"=>"Owner\UserController",
    "jurusan"=>"Owner\JurusanController",
    "kota"=>"Owner\KotaController",
    "orderbus"=>"Owner\OrderBusController",
    "ordertour"=>"Owner\OrderTourController",
    "laporan_shuttle"=>"Owner\LaporanShuttleController",

    ]);
    Route::get('/ordertour/cetak/{id}','Owner\OrderTourController@cetak')->name('ordertour.cetak');
    Route::get('/orderbus/cetak/{id}','Owner\OrderBusController@cetak')->name('orderbus.cetak');
    Route::get('/order_shuttle/cetak/{id}','Owner\OrderShuttleController@cetak')->name('order_shuttle.cetak');
    Route::post('laporan_shuttle/show','Owner\LaporanShuttleController@show')->name('laporan_shuttle.show');
    // Route::get('/laporan_shuttle/cetak_pdf', 'Owner\LaporanShuttleController@cetak_pdf')->name('laporan_shuttle.cetak_pdf');
    Route::get('orderbus/pembayaran','Owner\OrderBusController@pembayaran')->name('orderbus.pembayaran');
    Route::get('laporan-pdf','Owner\LaporanShuttleController@pdf')->name('laporan_shuttle.pdf');
    Route::get('orderbus_pdf','Owner\OrderBusController@pdf')->name('orderbus.pdf');
    Route::get('ordertour_pdf','Owner\OrderTourController@pdf')->name('ordertour.pdf');

    
  });

// Route::group(['middleware'=>'role:3'],function(){
//   // Route::get('/homeuser','User\HomeUserController@index')->name('homeuser');
//   Route::resources([
//     "schedule_shuttle"=>"Shuttle\ScheduleController",

//     ]);
//   });

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
Route::get('/', 'LoginController@getLogin');
Route::get('/login', 'LoginController@getLogin');
Route::post('/login', 'LoginController@postLogin');
// Route::get('/request', 'LoginController@forgot');
// Route::get('/email', 'Auth.ForgotPasswordController');

Route::get('/home','DasboardCotroller@index');

Route::get('/pegawai', 'PegawaiController@index');
Route::post('/pegawai', 'PegawaiController@create');

Route::get('/jabatan', 'JabatanController@jabatan');
Route::post('/jabatan', 'JabatanController@jabatan_input');
Route::post('/jabatan/edit', 'JabatanController@jabatan_edit');
Route::get('/jabatan/hapus/{id}', 'JabatanController@jabatan_hapus');

Route::get('/id_card', 'Id_cardController@index');
Route::get('/cetak/id_card/{id}', 'Id_cardController@show');

Route::get('/absen/masuk', 'MasukController@index');
Route::post('/absen/masuk', 'MasukController@create');

Route::get('/absen/keluar', 'KeluarController@index');
Route::post('/absen/keluar', 'KeluarController@create');

Route::get('/presensi', 'PresensiController@index');
Route::post('/presensi', 'PresensiController@store');

Route::get('/logout', function () {
    Auth::logout();
    return view('Login.login');
});